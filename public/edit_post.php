<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
    // If SESSION User is not set redirect
    if(!isset($_SESSION["User"])){
        $_SESSION["failMsg"] = "Вы еще не в системе, войдите чтобы редактировать.";
        redirect_to("forum.php?subject"); 
    // Redirect if SESSION AND GET User don't match
    }elseif($_SESSION["User"] != $_GET["User"]) {
        $_SESSION["failMsg"] = "Вы не можете редактировать чужие посты.";
        redirect_to("forum.php");
    } 
    // Assemble query if all values are valid
    elseif(isset($_GET["ID"], $_GET["User"]) AND $_SESSION["User"] == $_GET["User"]){
        $query = "SELECT * from blog_page WHERE ID = {$_GET['ID']} AND CreatedBy = '{$_GET["User"]}'";
        $result = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($result)) {
            $oldContent = $row["Content"];
            $oldSubject = $row["Subject"];
        }
    }else{
        $_SESSION["failMsg"] = "Ошибка.";
        redirect_to("forum.php");        
    }   
?>
<?php
    // Assemble query if POST submit is
    if(isset($_POST["submit"])) {
        $query = "UPDATE blog_page SET Content = '{$_POST["Content"]}', Subject = '{$_POST["Subject"]}' WHERE ID = {$_GET["ID"]}";
        $updateResult = mysqli_query($connection, $query);
        if($updateResult){
            $_SESSION["failMsg"] = "Успешно обновлен.";
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
                            <textarea cols="80" rows="10" class="form-control" name="Content" placeholder="" required><?php echo $oldContent ?></textarea>
                        </div>
                    </div>
                    <div class="form-inline">
                        <label class="control-label col-sm-2">Тема</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="Subject" required>
                                <option value="<?php echo $oldSubject ?>" selected><?php echo $oldSubject ?></option>
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