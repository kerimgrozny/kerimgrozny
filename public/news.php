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
                    <p><cite>От</cite> Администраторов.</p>
                    <h3 class="center">Сублайм Текст 3</h3>
                    <p>Пользовался уже почти со всеми IDE и текстовыми редакторами но Sublime Text на мой взляд самый
                    лучший и простой но, использование редактора как Sublime Text требует определенные знании
                    в программирование и понимание синтаксиса.  
                    </p><img src="images/news/sublime.png" class="img-responsive"><br/>
                    <a href="http://www.sublimetext.com/">Скачайте</a><span> бесплатно с официального сайта</span>
                    </div><br/>
                <div class="row">
                    <div class="col-lg-8">                      
                        <?php succMsg(); failMsg(); ?>                
                        <?php
                            succMsg();
                        ?>                     
                    </div><!--/ public forum page -->
                </div>
            </div>
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

