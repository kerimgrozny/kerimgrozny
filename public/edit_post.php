<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
    // Redirect if SESSION User is not set
    if (!isset($_SESSION["User"])) {
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

    // Update post if submits
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
    <div id="wrapper">
        <div id="sidebar-wrapper"><!-- Sidebar -->
            <ul class="sidebar-nav">
            <h3 class="center">Темы</h3>
                <?php
                    // displays list of all subjects on sidebar
                    $subject_set = fetch_all_subjects();
                    echo display_all_subjects($subject_set);
                ?>
                <hr>
                <h3 class="center">Пользователи</h3>
                <?php 
                    // displays list of all users on sidebar
                    $user_set = find_all_users();           
                    echo display_all_users($user_set);
                ?>   
            </ul>
        </div><!-- /#sidebar-wrapper -->

        <div id="page-content-wrapper"><!-- Page Content -->
         <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Меню</a>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="center">Форум</h1>
                        <p>Добро пожаловать на официальный форум чеченских хаккеров программистов и начинающих.
                        Тут вы найдете интересующую для вас информацию, о программистов, разработчиков и дизайнеров.
                        А также поделиться новой информации, которым вам бы хотелось с другими.</p>  
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">                      
                        <?php succMsg(); failMsg(); ?>                
                        <?php
                            $visible = "public";
                            // display pages that belong to selected subject.
                            if (isset($_GET["subject"])) {
                                $page_set = fetch_pages_for_subject($_GET["subject"], $visible);
                                echo display_pages_for_subject($page_set);
                            }
                            // display info for selected user .                
                            elseif (isset($_GET["user"])) {
                                echo diplay_user_info($_GET["user"]);
                            } else {
                                echo "<p>Выберите из меню</p>";
                            } 
                        ?>
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
                                        <?php 
                                            $selected_subject = fetch_all_subjects(); 
                                            while ($subject = mysqli_fetch_assoc($selected_subject)) {
                                                $output  = "<option value=\"";
                                                $output .= $subject["Name"];                                        
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
            </div><hr>
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Меню</a>
        </div><!-- /#page-content-wrapper -->
    </div><!-- /#wrapper -->              
    <script src="js/jquery.js"></script><!-- jQuery -->     
    <script src="js/bootstrap.min.js"></script><!-- Bootstrap Core JavaScript -->
    
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
<?php include("../includes/layouts/footer.php"); ?>

