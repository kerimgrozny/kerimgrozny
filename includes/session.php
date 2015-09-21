<?php

    session_start();
	
	function redirect_to($new_page){
		header("Location:" . $new_page);
		exit;		
	}
	
    function message(){
    	if(isset($_SESSION["message"])) {
    		$output  = "<h5 class=\"center\" style=\"color:#FF6666\">";
			$output .= $_SESSION["message"];
    		$output .= "</h5>";
    		echo $output;
			$_SESSION["message"] = null;
		}
    }  

?>