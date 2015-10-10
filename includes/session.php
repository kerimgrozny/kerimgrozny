<?php

    session_start();

    function succMsg(){
        if(isset($_SESSION["succMsg"])) {
            $output  = "<h4 class=\"center\" style=\"color:#009933\">";
            $output .= $_SESSION["succMsg"];
            $output .= "</h4>";
            echo $output;
            $_SESSION["succMsg"] = null;
        }
    }

    function warnMsg(){
        if(isset($_SESSION["warnMsg"])) {
            $output  = "<h4 class=\"center\" style=\"color:#FF9933\">";
            $output .= $_SESSION["warnMsg"];
            $output .= "</h4>";
            echo $output;
            $_SESSION["warnMsg"] = null;
        }
    }

    function failMsg(){
        if(isset($_SESSION["failMsg"])) {
            $output  = "<h4 class=\"center\" style=\"color:#FF6666\">";
            $output .= $_SESSION["failMsg"];
            $output .= "</h4>";
            echo $output;
            $_SESSION["failMsg"] = null;
        }
    }
    
?>