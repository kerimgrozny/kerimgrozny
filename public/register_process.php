<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php require("../includes/functions.php"); ?>
<?php
    if(isset($_POST['submit'])){
        $Login     = mysql_prep($_POST['Login']);
        $Password  = mysql_prep($_POST['Password']);
        $Email     = mysql_prep($_POST['Email']);
        $FirstName = mysql_prep($_POST['FirstName']);
        $LastName  = mysql_prep($_POST['LastName']); 
        $DOB       = $_POST['DOB'];       
        $Gender    = $_POST['Gender'];
        $Telephone = $_POST['Telephone'];

        $query  = "INSERT INTO user (Login, Password, Email, FirstName, LastName, DOB, Gender, Telephone) ";
        $query .= "VALUES ('{$Login}', '{$Password}', '{$Email}', '{$FirstName}', '{$LastName}', '{$DOB}', '{$Gender}', '{$Telephone}')";
        $result = mysqli_query($connection, $query);
        // checks if login is availble
        $loginCheck = "SELECT * FROM user WHERE Login = '{$Login}'";

        if($result){
            $_SESSION["succMsg"] = "Регистрация прошла успешно, войдите ипользуя логин и пароль веденные вами.";
            redirect_to("login.php");
        }elseif($loginCheck){
            $_SESSION["failMsg"] = "Такой логин уже зарегистрирован, выберите другой.";
            redirect_to("registration.php");
        }else{
            $_SESSION["failMsg"] = "Ошибка регистрации, ведите снова или повторите позже.";
        }
    }else{
    	redirect_to("registration.php");
    }
?>