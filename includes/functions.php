<?php

    function findAllSubjects(){
        global $connection;

        $query  = "SELECT * ";
        $query .= "FROM blog_subject";
        $subject_set = mysqli_query($connection, $query);
        confirm_query($subject_set);       
        return $subject_set;
        //mysqli_free_result($subject_set);
    }

    function findPagesForSubject($subject){
        global $connection;

        $query = "SELECT * FROM blog_page WHERE Subject = '{$subject}'";
        $page_set = mysqli_query($connection, $query);
        //confirm_query($page_set);
        return $page_set;
        mysqli_free_result($page_set);        
    }
	
	function confirm_query($result_set){
		if (!$result_set) {
			die("Запрос к базе данных не удалось.");
		}		
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

	function mysql_prep($string) {
		global $connection;
		
		$escaped_string = mysqli_real_escape_string($connection, $string);
		return $escaped_string;
	}

?>