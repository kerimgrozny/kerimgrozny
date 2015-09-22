<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
    // if not logged in
	if(!isset($_SESSION["User"])){
        $_SESSION["failMsg"] = "Вы еще не в системе";
		redirect_to("forum.php");
    // if tries to edit other's comment 
    }elseif($_GET["User"] != $_SESSION["User"]) {
        $_SESSION["failMsg"] = "Вы не можете изменить чужие посты.";
        redirect_to("forum.php");
    // perform query
	}elseif(isset($_POST["submit"])) {   
		$Content = mysql_prep($_POST["Content"]);
		$Subject = $_POST["Subject"];

		$query  = "INSERT INTO blog_page ";
		$query .= "(Content, CreatedBy, Subject) ";
		$query .= "VALUES ('{$Content}', '{$User}', '{$Subject}')";
		$query .= "WHERE ID = {$_GET["ID"]}";

		$result = mysqli_query($connection, $query);
		if(mysqli_affected_rows($connection) == 1){
			redirect_to("forum.php");
		}
	}
?>
<?php include("../includes/layouts/header.php"); ?>
<title>Изменить пост</title>
<meta name="description" content="KerimGrozny - Форум чеченских программистов - здесь вы найдете программистов и всю информацию о програмирование">
<div class="container" id="forum"><!--start: 1 container-->
    <div class="row">
        <h1 class="center"><a href="forum.php">Форум</a></h1>
        <h5 class="center"><i>Добро пожаловать на официальный форум чеченских хаккеров программистов и начинающих.<br/> 
        Тут вы найдете интересующую для вас информацию, о программистов, разработчиков и дизайнеров.<br/> 
        А также поделиться новой информации, которым вам бы хотелось с другими.</i>
        </h5>
        <div class="col-xs-12 col-lg-2" id="blogSideBar">
            <hr>
            <h4>Темы</h4>
            <?php
                // displays list of all subjects on sidebar
                $subject_set = fetchAllSubjects();
                echo subjectNavigation($subject_set);
            ?>
            <hr>
            <h4>Пользователи</h4>
            <?php 
                // displays list of all users on sidebar
                $user_set = fetchAllUsers();           
                echo userNavigation($user_set);
            ?>
        </div>
        <div class="col-xs-12 col-lg-10">
            <hr>
            <h4 class="center">Изменение поста</h4>
            <div class="col-xs-12 col-lg-10">
                <?php
                    succMsg();
                ?>
                <form class="form-inline" action="edit_post.php" role="form" method="POST">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea cols="80" rows="10" class="form-control" name="Content" placeholder="" required><?php echo $_GET["Content"] ?></textarea>
                        </div>
                    </div>
                    <div class="form-inline">
                        <label class="control-label col-sm-2">Тема</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="Subject" required>
                                <option value="<?php echo $_GET["Subject"] ?>" selected><?php echo $_GET["Subject"] ?></option>
                                <?php $selectSubject = fetchAllSubjects(); 
                                    while($subject = mysqli_fetch_assoc($selectSubject)){
                                        $output  = "<option value=\"";
                                        $output .= $subject["Name"];                                                                                
                                        //$output .= $subject["Name"];                                        
                                        $output .= "\">";
                                        $output .= $subject["Name"];
                                        $output .= "</option>";
                                        echo $output;
                                    }
                                ?>
                            </select>                            
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <button type="submit" name="submit" class="btn btn-default">Потвердить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>
</div>
<?php include("../includes/layouts/footer.php"); ?>