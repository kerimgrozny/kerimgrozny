<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
    if (!isset($_SESSION["User"])) {
        $_SESSION["failMsg"] = "Вы еще не в системе.";
    }
    if (isset($_POST["submit"])){
        if (!isset($_SESSION["User"])) {
            redirect_to("login.php");    
        }        
        $name    = mysql_prep($_POST["name"]);
        $content = mysql_prep($_POST["content"]);
        $user    = $_SESSION["User"];
        $subject = $_POST["subject"];
        $visible = (int) $_POST["visible"];

        $query  = "INSERT INTO blog_page ";
        $query .= "(Name, Content, CreatedBy, Subject, Visible) ";      
        $query .= "VALUES ('{$name}', '{$content}', '{$user}', '{$subject}', {$visible}) ";
        $result = mysqli_query($connection, $query);
        //confirm_query($result);

        if($result && mysqli_affected_rows($connection) == 1){
            $_SESSION["succMsg"] = "Добавлен успешно.";
            redirect_to("forum.php?subject=".$subject);         
        }else{
            $_SESSION["failMsg"] = "Ошибка.";
            redirect_to("forum.php?subject=".$subject);         
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
         <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Меню</a>
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
            <div class="container-fluid">
                <div class="row">
                    <h1 class="center">Форум</h1>
                    <div class="col-xs-12 col-lg-8" class="">
                        <p>Добро пожаловать на официальный форум чеченских хаккеров программистов и начинающих.
                        Тут вы найдете интересующую для вас информацию, о программистов, разработчиков и дизайнеров.
                        А также поделиться новой информации, которым вам бы хотелось с другими.</p>  
                        <hr>
                    </div> 
                    <div class="col-xs-12 col-lg-4">
                        <p>Если у вас будут вопросы касающиеся веб програмированию, свяжитесь со мной прямо через email:</p>  
                        <p>If you have any questions related to web programming, send me an email.</p>
                        <code>kerimgrozny@gmail.com</code>
                        <hr>
                    </div>                   
                    <div class="col-xs-12 col-lg-6">
                    <!-- Div for some content -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">                      
                        <?php succMsg(); failMsg(); ?>
                        <?php
                            $visible = 0;
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
                        <form action="forum.php" role="form" method="POST" class="postForm">
                            <div class="form-group">
                                <label>Название</label>
                                <input required type="text" name="name" class="form-control" placeholder="Название">
                            </div>
                            <div class="form-group">
                                <label>Пост</label>
                                <textarea required class="form-control" name="content" placeholder="Ваш пост"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Тема</label>
                                <select required name="subject" class="form-control">
                                        <!-- displays all subjects in form list to choose from -->
                                        <option value=""></option>
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
                            <label>Видимость</label>
                            <div class="radio">
                              <label>
                                <input required type="radio" name="visible" value="0">
                                Приватный
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input required type="radio" name="visible" value="1" checked>
                                Публичный
                              </label>
                            </div><hr>
                            <button type="submit" name="submit" class="btn btn-default">Добавить</button>
                            <hr>                        
                        </form>                      
                    </div><!--/ public forum page -->
                    <div class="col-lg-4" id="forumNewsPage"><!--/ public forum page -->
                        <h3 class="center">Новости</h3>
                    </div>
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

