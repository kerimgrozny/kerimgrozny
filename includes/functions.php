<?php
    function escape_str($text){
        global $connection;
        mysqli_real_escape_string($connection, $text);
        return $text;
    }
?>