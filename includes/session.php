<?php

    session_start();

    function succMsg(){
        if(isset($_SESSION["succMsg"])) {
            $output  = "<h5 class=\"center\" style=\"color:#009933\">";
            $output .= $_SESSION["succMsg"];
            $output .= "</h5>";
            echo $output;
            $_SESSION["succMsg"] = null;
        }
    }

    function failMsg(){
        if(isset($_SESSION["failMsg"])) {
            $output  = "<h5 class=\"center\" style=\"color:#FF6666\">";
            $output .= $_SESSION["failMsg"];
            $output .= "</h5>";
            echo $output;
            $_SESSION["failMsg"] = null;
        }
    }
    
?>