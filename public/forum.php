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
                        <form action="create_post.php" role="form" method="POST" class="postForm">
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
                                        <option value="">Тема</option>
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
                            <button type="submit" name="submit" class="btn btn-default">Добавит</button>
                            <hr>                        
                        </form>                      
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

