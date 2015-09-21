<?php

    function fetchAllSubjects(){
        global $connection;

        $query  = "SELECT * ";
        $query .= "FROM blog_subject";
        $subject_set = mysqli_query($connection, $query);
        confirm_query($subject_set);       
        return $subject_set;
        mysqli_free_result($subject_set);
    }

    function subjectNavigation($find_all_subjects) {
        $output = "<ul>";
            $subject_set = $find_all_subjects;
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

    function findAllUsers(){
    	global $connection;

    	$query = "SELECT * FROM user";
    	$user_set = mysqli_query($connection, $query);
    	confirm_query($user_set);
    	return $user_set;
    	mysqli_free_result($user_set);
    }

    function userNavigation($findAllUsers){
    	$output = "<ul>";
    	$user_set = $findAllUsers;
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
        $output .= "</ul>";
	    return $output;  	
        mysqli_free_result($user_set);
    }

    function fetchPagesForSubject($subject){
        global $connection;

        $query = "SELECT * FROM blog_page WHERE Subject = '{$subject}'";
        $page_set = mysqli_query($connection, $query);
        confirm_query($page_set);
        return $page_set;      
    }

    function pagesForSelectedSubject($subject){                	
        while($page = mysqli_fetch_assoc($page_set)){
            $output  = "<tr><td>Номер поста: </td><td>";
            $output .= $page["ID"];
            $output .= "</td></tr>";
            $output .= "<tr><td>Пост: </td><td>";
            $output .= $page["Content"];
            $output .= "</td></tr>";
            $output .= "<tr><td>Дата: </td><td>";
            $output .= $page["CreatedDate"];
            $output .= "</td></tr>";
            $output .= "<tr><td>Пользователь: </td><td>";
            $output .= $page["CreatedBy"];
            $output .= "</td></tr>";
            $output .= "<td><a href=\"edit_post.php?id=".urlencode($page["ID"])."&user=".urlencode($page["CreatedBy"])."\">Изменить</a></td>";
            $output .= "<td><a href=\"delete_post.php?id=".urlencode($page["ID"])."&user=".urlencode($page["CreatedBy"])."\">Удалить</a></td></tr>";
            $output .= "<tr><td><hr></td><td><hr></td></tr>";
            return $output;
       	 	mysqli_free_result($page_set);        
        }			 	
    }

    function selectedUserInfo($selected_user){
    	global $connection;

        $query = "SELECT * FROM user WHERE Login = '{$selected_user}'";
        $user_set = mysqli_query($connection, $query);
        while($user = mysqli_fetch_assoc($user_set)) {;                 
            $output = "<tr><td> ID: </td><td>" . $user["ID"] . "</td></tr>";
            $output.= "<tr><td> Логин: </td><td>" . $user["Login"] . "</td></tr>";                        
            $output.= "<tr><td> Фамилия: </td><td>" . $user["LastName"] . "</td></tr>";
            $output.= "<tr><td> Имя: </td><td>" . $user["FirstName"] . "</td></tr>";
            $output.= "<tr><td> Дата рождение: </td><td>" . $user["DOB"] . "</td></tr>";
            $output.= "<tr><td> Пол: </td><td>" . $user["Gender"] . "</td></tr>";
            $output.= "<tr><td> Дата: регистрация </td><td>" . $user["RegDate"] . "</td></tr>";
            return $output;
        }    	
    }
	
	function confirm_query($result_set){
		if (!$result_set) {
			die("Запрос к базе данных не удалось.");
		}		
	}

	function mysql_prep($string) {
		global $connection;
		
		$escaped_string = mysqli_real_escape_string($connection, $string);
		return $escaped_string;
	}

?>