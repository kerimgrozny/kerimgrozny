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
                    <h1 class="center">Вакансии в Грозном</h1>
                    <div class="col-xs-12 col-lg-12" class="">
                        <p>Мы ещем программистов для реализации онлайн проекта в Грозном, важен каждое мнение. 
                        нам потребуются разработчики, контент дизайнеры.
                        От вас потребуются определенные знании в разных веб технологиях.
                        Поэтому внимательно заполните каждую строку ниже, и как только количество сотрудником
                        наберется нужное количество, мы приступим к созданию проекта.
                        Желаю удачи.
                        </p>  
                        <hr>
                        <?php succMsg(); failMsg(); ?>
                        <form action="vacancy.php" method="POST" class="postForm">
                          <div class="form-group">
                            <label>ФИО</label>
                            <input type="name" name="name" required class="form-control" placeholder="Ведите полное имя">
                          </div>
                          <div class="form-group">
                            <label>Ваш резюме</label>
                            <input type="file">
                          </div>
                            <p class="help-block">Выберите языки которыми вы владете.</p>
                          <!-- checkbox HTML CSS JavaScript -->
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="technology[]" value="HTML">HTML 
                            </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="technology[]" value="CSS">CSS 
                            </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="technology[]" value="JavaScript">JavaScript 
                            </label>
                          </div>
                          <!-- checkbox PHP SQL ASP -->
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="technology[]" value="PHP">PHP 
                            </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="technology[]" value="SQL">SQL 
                            </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="technology[]" value="Ruby">Ruby 
                            </label>
                          </div>
                            <p class="help-block">Выберите вашу позицию.</p>
                            <div class="radio">
                              <label>
                                <input type="radio" required name="job" value="Developer">
                                Веб Разработчик
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" required name="job" value="Designer">
                                Веб Дизайнер
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" required name="job" value="DBAdministrator">
                                Администратор Базы Данных
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" required name="job" value="SEO">
                                SEO Оптимизатор
                              </label>
                            </div>
                          <!-- More info -->
                          <div class="form-group">
                            <label>Подробно</label>
                            <textarea name="details" class="form-control"></textarea>
                          </div>
                          <button type="submit" name="submit" class="btn btn-default">Потвердить</button><hr>
                        </form>                        
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

