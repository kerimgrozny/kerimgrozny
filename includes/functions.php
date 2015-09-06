<?php
    function find_all_subjects() {
        global $connection;

        $query  = "SELECT * ";
        $query .= "FROM blog_subject ";
        $subject_set = mysqli_query($connection, $query);
        return $subject_set;
    }

    function find_pages_for_subject($SubjectID){
        global $connection;

        $SubjectID = $_GET["subject"];
        $query = "SELECT * FROM blog_page WHERE SubjectID = $SubjectID";
        $page_set = mysqli_query($connection, $query);
        return $page_set;
    }
?>