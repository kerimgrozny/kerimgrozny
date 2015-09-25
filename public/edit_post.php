<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
    // Redirect if SESSION User is not set
    if(!isset($_SESSION["User"])){
        $_SESSION["failMsg"] = "Вы еще не в системе, войдите чтобы редактировать.";
        redirect_to("forum.php?subject=".$_GET["Subject"]);
    // Redirect if GET ID User and Subject is not set
    }elseif(!isset($_GET["ID"], $_GET["User"], $_GET["Subject"])) {
        $_SESSION["failMsg"] = "Неверное действие.";
        redirect_to("forum.php?subject=".$_GET["Subject"]);
    // Redirect if SESSION AND GET User don't match
    }elseif($_SESSION["User"] != $_GET["User"]) {
        $_SESSION["failMsg"] = "Вы не можете редактировать чужие посты.";
        redirect_to("forum.php?subject=".$_GET["Subject"]);        
    }else{
        $query = "SELECT Content FROM blog_page WHERE ID = {$_GET['ID']}";
        $result = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($result)){
            $Content = $row["Content"];
        }
    }
?>
<?php
    // Assemble query if POST submit isset
    if(isset($_POST["submit"])) {
        $Content = mysql_prep($_POST["Content"]);
        $query  = "UPDATE blog_page SET ";
        $query .= "Content = '{$Content}', ";
        $query .= "Subject = '{$_POST["Subject"]}' ";
        $query .= "WHERE ID = {$_GET["ID"]}";

        $result = mysqli_query($connection, $query);
        if($result && mysqli_affected_rows($connection) == 1) {
            $_SESSION["succMsg"] = "Успешно обновлен.";
            redirect_to("forum.php?subject=".$_GET["Subject"].$_GET["ID"]);
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
                <form class="form-inline" action="edit_post.php?ID=<?php echo $_GET["ID"]; ?>&User=<?php echo $_GET["User"]; ?>&Subject=<?php echo $_GET["Subject"]; ?>" role="form" method="POST">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea cols="80" rows="10" class="form-control" name="Content" placeholder="" required><?php echo $Content ?></textarea>
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
                            <input type="submit" name="submit" class="btn btn-default" value="Потвердить">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>
</div>
<?php include("../includes/layouts/footer.php"); ?>