<?php

    session_start();
	
    function message(){
		echo $_SESSION["message"];
		$_SESSION["message"] = null;
    }
	
	function redirect_to($new_page){
		header("Location:" . $new_page);
		exit;	
	}

?>