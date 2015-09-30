<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<title>Чеченские Програмисты</title>
<meta name="description" content="KerimGrozny - Форум чеченских программистов - здесь вы найдете программистов и всю информацию о програмирование">
    <div id="wrapper">
        <div id="sidebar-wrapper"><!-- Sidebar -->
            <ul class="sidebar-nav">
            <h3 class="center">Темы</h3>
                <?php
                    // displays list of all subjects on sidebar
                    $subject_set = fetchAllSubjects();
                    echo subjectNavigation($subject_set);
                ?>
                <hr>
                <h3 class="center">Пользователи</h3>
                <?php 
                    // displays list of all users on sidebar
                    $user_set = fetchAllUsers();           
                    echo userNavigation($user_set);
                ?>  
            </ul>
        </div><!-- /#sidebar-wrapper -->
        
        <div id="page-content-wrapper"><!-- Page Content -->
            <nav class="navbar navbar-default" id="forum_upper_nav">
              <div class="container-fluid">
                <div>
                  <ul class="nav navbar-nav">
                    <li><a href="news.php">Новости</a></li>
                    <li><a href="vacancy.php">Вакансии</a></li>
                    <li><a href="resume.php">Доступные резюме</a></li>
                    <li><a href="#"></a></li>
                  </ul>
                </div>
              </div>
            </nav> 
         <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Меню</a>
            <div class="container-fluid">
                <div class="row">
                    <h1 class="center">Форум</h1>
                    <div class="col-xs-12 col-lg-12" class="">
                        <p>Добро пожаловать на официальный форум чеченских хаккеров программистов и начинающих.
                        Тут вы найдете интересующую для вас информацию, о программистов, разработчиков и дизайнеров.
                        А также поделиться новой информации, которым вам бы хотелось с другими.</p>  
                        <hr>
                        <?php
                            $resume_set = fetchResumes();
                            echo resumeNavigation($resume_set);
                        ?>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">                      
                        <?php succMsg(); failMsg(); ?>                
                        <?php
                            $visible = "public";
                            // display pages that belong to selected subject.
                            if(isset($_GET["subject"])){
                                $page_set = fetchPagesForSubject($_GET["subject"], $visible);
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
                    </div><!--/ public forum page -->
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

