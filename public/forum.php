<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<title>Чеченские Програмисты</title>
<meta name="description" content="KerimGrozny - Форум чеченских программистов - здесь вы найдете программистов и всю информацию о програмирование">
<div id="wrapper"><!--start: 1 container-->
        <!-- Sidebar -->
        <div id="sidebar-wrapper" style="background-color: #19867A">
            <h4 class="center">Темы</h4>
            <?php
                // displays list of all subjects on sidebar
                $subject_set = fetchAllSubjects();
                echo subjectNavigation($subject_set);
            ?>
            <hr>
            <h4 class="center">Пользователи</h4>
            <?php 
                // displays list of all users on sidebar
                $user_set = fetchAllUsers();           
                echo userNavigation($user_set);
            ?>            
        </div>
        <!-- /#sidebar-wrapper -->

    <!-- Page Content -->    
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="center"><a href="forum.php">Форум</a></h1>
                    <a href="#menu-toggle" class="btn btn-default " id="menu-toggle">Меню</a>
                    <h5 class="center"><i>Добро пожаловать на официальный форум чеченских хаккеров программистов и начинающих.<br/> 
                    Тут вы найдете интересующую для вас информацию, о программистов, разработчиков и дизайнеров.<br/> 
                    А также поделиться новой информации, которым вам бы хотелось с другими.</i>
                    </h5>
                    <hr>
                    <?php succMsg(); failMsg(); ?>                
                    <?php
                        // display pages that belong to selected subject.
                        if(isset($_GET["subject"])){
                            $page_set = fetchPagesForSubject($_GET["subject"]);
                            echo pagesForSelectedSubject($page_set);
                        }
                        // display info for selected user.                
                        elseif(isset($_GET["user"])){
                            echo selectedUserInfo($_GET["user"]);
                        }else{
                            echo "<p>Выберите из меню</p>";
                        } 
                    ?>
                    <?php
                        succMsg();
                    ?>
                    <form class="form-inline" action="create_post.php" role="form" method="POST">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea cols="80" rows="10" class="form-control" name="content" placeholder="Ваш пост.." required></textarea>
                            </div>
                        </div>
                        <div class="form-inline">
                            <label class="control-label col-sm-2">Тема</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="subject" required>
                                    <option value="">Тема..</option>
                                    <?php $selectSubject = fetchAllSubjects(); 
                                        while($subject = mysqli_fetch_assoc($selectSubject)){
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
                                <button type="submit" name="submit" class="btn btn-default">Добавит</button>
                            </div>
                        </div>
                    </form><hr>
                </div>
            </div>
                <a href="#menu-toggle" class="btn btn-default " id="menu-toggle">Меню</a>            
        </div>
    </div>
</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    <!-- /#page-content-wrapper -->
</div>
<?php include("../includes/layouts/footer.php"); ?>