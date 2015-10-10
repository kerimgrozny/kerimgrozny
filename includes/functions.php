<?php

function redirect_to($new_page){
    header("Location:" . $new_page);
    exit;       
}

function mysql_prep($string) {
    // escapes string and returns it
    global $connection;
    
    $escaped_string = mysqli_real_escape_string($connection, $string);
    return $escaped_string;
}

function confirm_query($result_set){
    if (!$result_set) {
        die("Запрос к базе данных не удалось.");
    }       
}

function fetch_all_subjects(){
    global $connection;

    $query  = "SELECT * ";
    $query .= "FROM blog_subject";
    $subject_set = mysqli_query($connection, $query);
    confirm_query($subject_set);       
    return $subject_set;
    mysqli_free_result($subject_set);
}

function fetch_pages_for_subject($subject, $visible){
    global $connection;
    
    $query  = "SELECT * FROM blog_page ";    
    $query .= "WHERE Subject = '{$subject}' ";
    if ($visible == 0) {
        $query .= "AND Visible = 1";   
    }   
    $page_set = mysqli_query($connection, $query);
    confirm_query($page_set);
    return $page_set;
    mysqli_free_result($page_set);    
}

function fetch_all_pages($visible){
    global $connection;
    
    $query  = "SELECT * FROM blog_page ";    
    if ($visible == 0) {
        $query .= "AND Visible = 1";   
    }   
    $page_set = mysqli_query($connection, $query);
    confirm_query($page_set);
    return $page_set;
    mysqli_free_result($page_set);    
}

function find_all_users(){
    global $connection;

    $query = "SELECT * FROM user";
    $user_set = mysqli_query($connection, $query);
    confirm_query($user_set);
    return $user_set;
    mysqli_free_result($user_set);
}

function display_all_subjects($fetch_all_subjects) {
        $subject_set = $fetch_all_subjects;
        $output = "<ul>";
        while($subject = mysqli_fetch_assoc($subject_set)) {
            $output .= "<li><a href=\"forum.php?subject=";
            $output .=  $subject["Name"];
            $output .= "\">";
            $output .=  $subject["Name"];
            $output .= "</a></li>";
        }
        $output .= "</ul>";
        return $output;
        mysqli_free_result($subject_set);
}

function display_all_users($find_all_users){
	// display list of users if logged
    $user_set = $find_all_users;
    $output  = "<ul>";
    while($user = mysqli_fetch_assoc($user_set)){
        $output .= "<li>";
        $output .= "<a href=\"forum.php?user=";
        $output .= $user["Login"];
        $output .= "\"";
        $output .= ">";
        $output .= $user["Login"];
        $output .= "</a>";
        $output .= "<li>";
    }	
	if (!isset($_SESSION["User"])) {
		$output = null;           
		$output = "<p class=\"small\">Войдите чтобы увидеть другие пользователи.</p>";
		return $output;
		mysqli_free_result($user_set);
	} else {
		$output .= "</ul>";
		return $output;     
		mysqli_free_result($user_set);
	}	
}
	
function display_pages_for_subject($pages){
    $output = "<p id=\"forumPost\">";                 
    $page_set = $pages;
    while($page = mysqli_fetch_assoc($page_set)){
        $output .= "<span class=\"postName\"> {$page["Name"]} </span><br/>";
        $output .= "{$page["Content"]} <br/>"; 
        $output .= "от {$page["CreatedBy"]} в {$page["CreatedDate"]} <i>ид {$page["ID"]}</i><br/>";     
        $output .= "<a href=\"edit_post.php?ID=".urlencode($page["ID"])."&User=".urlencode($page["CreatedBy"])."&Subject=".urlencode($page["Subject"])."\">Изменить </a>";
        $output .= "<a href=\"delete_post.php?ID=".urlencode($page["ID"])."&User=".urlencode($page["CreatedBy"])."&Subject=".urlencode($page["Subject"])."\">Удалить </a>";
    }
    $output .= "</p>";
    if (isset($output)) {
        return $output;
    }
    mysqli_free_result($page_set);        
}

function diplay_user_info($selected_user){
    global $connection;

    $query = "SELECT * FROM user WHERE Login = '{$selected_user}'";
    $output = "<table class=\"table\">";
    $user_set = mysqli_query($connection, $query);
    confirm_query($user_set);
    while($user = mysqli_fetch_assoc($user_set)) {;                 
        $output .= "<tr><td> ID: </td><td>" . $user["ID"] . "</td></tr>";
        $output .= "<tr><td> Логин: </td><td>" . $user["Login"] . "</td></tr>";                        
        $output .= "<tr><td> Фамилия: </td><td>" . $user["LastName"] . "</td></tr>";
        $output .= "<tr><td> Имя: </td><td>" . $user["FirstName"] . "</td></tr>";
        $output .= "<tr><td> Дата рождение: </td><td>" . $user["DOB"] . "</td></tr>";
        $output .= "<tr><td> Пол: </td><td>" . $user["Gender"] . "</td></tr>";
        $output .= "<tr><td> Дата: регистрация </td><td>" . $user["RegDate"] . "</td></tr>";
    }
    $output .= "</table><hr>";             
    return $output;     
}

function fetchResumes(){
    global $connection;

    $query = "SELECT * FROM vacancy ";
    $resume_set = mysqli_query($connection, $query);
    return $resume_set;
}

function resumeNavigation($resume_set){
    global $connection;

    $output = "<table class=\"table\"><thead></thead><tbody>";
    $resume_set = $resume_set;
    while($resume = mysqli_fetch_assoc($resume_set)){
        $output .= "<tr><th>Номер резюме</th><td>";
        $output .= $resume["ID"]."</td></tr>";
        $output .= "<tr><th>Юзер</th><td>";
        $output .= "<a href=\"forum.php?user=" .$resume["User"] . "\">" . $resume["User"]."</td></tr>";
        $output .= "<tr><th>Имя</th><td>";
        $output .= $resume["FullName"]."</td></tr>";
        $output .= "<tr><th>Веб Технологии</th><td>";
        $output .= $resume["Technology"]."</td></tr>";
        $output .= "<tr><th>Позиция</th><td>";
        $output .= $resume["Job"]."</td></tr>";
        $output .= "<tr><th>Подробнее</th><td>";
        $output .= $resume["Details"]."</td></tr>";
		// linebreak after each record
        $output .= "<tr><th><hr></th><td>";
        $output .= "<hr></td></tr>";
    }
    $output .= "</tbody></table>";
    return $output;
}

function password_encrypt($password) {
	$hash_format = "2y$10$";
	
	$salt_lenght = 22;
	
	$salt = generate_salt($salt_lenght);
	$format_and_salt = $hash_format . $salt;
	$hash = crypt($password, $format_and_salt);
	return $hash;
}

function generate_salt($length) {
  // Not 100% unique, not 100% random, but good enough for a salt
  // MD5 returns 32 characters
  $unique_random_string = md5(uniqid(mt_rand(), true));
  
	// Valid characters for a salt are [a-zA-Z0-9./]
  $base64_string = base64_encode($unique_random_string);
  
	// But not '+' which is valid in base64 encoding
  $modified_base64_string = str_replace('+', '.', $base64_string);
  
	// Truncate string to the correct length
  $salt = substr($modified_base64_string, 0, $length);
  
	return $salt;
}

function password_check($password, $existing_hash) {
	// existing hash contains format and salt at start
  $hash = crypt($password, $existing_hash);
  if ($hash === $existing_hash) {
	return true;
  } else {
	return false;
  }
}

?>