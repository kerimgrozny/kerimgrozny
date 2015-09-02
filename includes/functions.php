<?php
    // Finds all subjects for blog page
function find_blog_subjects(){
    global $connection;

    $query  = "SELECT * FROM blog_subject ";
    $query .= "WHERE Visible = 1";
    $result = mysqli_query($connection, $query);
    return $result;
}
function find_blog_pages_for_subject($subject_id){
    global $connection;

    $query  = "SELECT * FROM blog_page";
    $query .= "WHERE subject_id = {subject_id}";
    $result = mysqli_query($connection, $query);
    return $result;
}

?>