<?php	
	
    session_start();
	
    function loginNeeded() {
        if(!isset($_SESSION["User"])){
            header('Location:login.php');
        }
    }
	
    function showMsg(){
		echo $_SESSION["Msg"];
		$_SESSION["Msg"] = null;
    }
	
	function redirect_to($new_page){
		header("Location:" . $new_page);	
	}
?>