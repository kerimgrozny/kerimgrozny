<?php
    // Finds all subjects for blog page

function find_blog_pages_for_subject($subject_id){
    global $connection;

    $query  = "SELECT * FROM blog_page";
    $query .= "WHERE subject_id = {subject_id}";
    $result = mysqli_query($connection, $query);
    return $result;
}

?>