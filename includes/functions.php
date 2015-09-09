<?php
    function find_all_subjects() {
        global $connection;

        $query  = "SELECT * ";
        $query .= "FROM blog_subject ";
        $subject_set = mysqli_query($connection, $query);
        return $subject_set;   
    }

    function blogNavigation($find_all_subjects) {
        $output = "<ul>";
            $subject_set = $find_all_subjects;
            while($subject = mysqli_fetch_assoc($subject_set)) {
                $output .= "<li><a href=\"blog.php?subject=";
                $output .=  $subject["ID"];
                $output .= "\">";
                $output .=  $subject["Name"];
                $output .= "</a></li>";
            }
        mysqli_free_result($subject_set);
        $output .= "</ul>";
        return $output;
    }

    function find_pages_for_subject($SubjectID){
        global $connection;

        $SubjectID = $_GET["subject"];
        $query = "SELECT * FROM blog_page WHERE SubjectID = $SubjectID";
        $page_set = mysqli_query($connection, $query);
        return $page_set;
    }

?>