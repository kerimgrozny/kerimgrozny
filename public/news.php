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
                <li><a href="forum.php">Назад</a></li>
            </ul>
        </div><!-- /#sidebar-wrapper -->
        <div id="page-content-wrapper"><!-- Page Content -->
            <nav class="navbar navbar-default" id="forum_upper_nav">
              <div class="container-fluid">
                <div>
                  <ul class="nav navbar-nav">
                    <li><a href="news.php">Новости</a></li>
                    <li><a href="#">Вакансии</a></li>
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
                    </div>
                </div>
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

