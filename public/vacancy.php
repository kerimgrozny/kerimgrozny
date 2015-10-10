<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
    if (!isset($_SESSION["User"])) { 
        $_SESSION["warnMsg"] = "Вы еще не в системе, <a href=\"login.php\">войдите</a>"; 
    }
    if (isset($_POST["submit"])) {       
        if (!isset($_SESSION["User"])) { 
            redirect_to("login.php");
        }
        $fullname = mysql_prep($_POST["fullname"]);
        // Append selected choices to $technologies
            if (isset($_POST["HTML"])) {
              $technologies = $_POST["HTML"]; 
            }
            if (isset($_POST["CSS"])) {
              $technologies .= $_POST["CSS"]; 
            }
            if (isset($_POST["JavaScript"])) {
              $technologies .= $_POST["JavaScript"]; 
            }           
            if (isset($_POST["PHP"])) {
              $technologies .= $_POST["PHP"]; 
            }
            if (isset($_POST["SQL"])) {
              $technologies .= $_POST["SQL"]; 
            }
            if (isset($_POST["Ruby"])) {
              $technologies .= $_POST["Ruby"]; 
            }
        // $technologies = $_POST["HTML"] .= $_POST["CSS"] .= $_POST["JavaScript"] .= $_POST["PHP"] .= $_POST["SQL"] .= $_POST["Ruby "] ;
        $job          = $_POST["job"];
        $details      = mysql_prep($_POST["details"]);
        $user         = $_SESSION["User"];

        $query  = "INSERT INTO vacancy (FullName, Technology, Job, Details, User) "; 
        $query .= "VALUES ('{$fullname}', '{$technologies}', '{$job}', '{$details}', '{$user}')";      
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_affected_rows($connection) == 1) {
            $_SESSION["succMsg"] = "Спасибо {$_SESSION["User"]}. Ваши данные успешно были отправлены.";
            redirect_to("forum.php");
        } else {
            $_SESSION["failMsg"] = "Ошибка при отправке.";
            
        }
        
    }
?>
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
                        <?php succMsg(); warnMsg(); failMsg() ?>
                        <form action="vacancy.php" method="POST" class="postForm">
                          <div class="form-group">
                            <label>ФИО</label>
                            <input type="text" name="fullname" required class="form-control" placeholder="Ведите полное имя">
                          </div>

                          <div class="form-group">
                            <label>Ваш резюме</label>
                            <input type="file">
                          </div>
                          
                          <label class="control-label">Выберите языки которыми вы владеете:</label>
                          <!-- HTML CSS JavaScript -->
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="HTML" value="HTML " >
                              HTML
                            </label>
                          </div> 
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="CSS" value="CSS " >
                              CSS
                            </label>
                          </div> 
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="JavaScript" value="JavaScript " >
                              JavaScript
                            </label>
                          </div>
                          <!-- PHP SQL Ruby -->
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="PHP" value="PHP " >
                              PHP
                            </label>
                          </div> 
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="SQL" value="SQL " >
                              SQL
                            </label>
                          </div> 
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="Ruby" value="Ruby " >
                              Ruby
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

