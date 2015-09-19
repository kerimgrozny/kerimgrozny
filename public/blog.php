<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<title>Чеченские Програмисты</title>
<meta name="description" content="KerimGrozny - Форум чеченских программистов - здесь вы найдете программистов и всю информацию о програмирование">
<div class="container"><!--start: 1 container-->
    <div class="row">
        <h1 class="center">Блог</h1>
        <div class="col-xs-12 col-lg-2" id="blogSideBar">
            <hr>
            <h4>Темы</h4>
            <?php
                // Shows all subjects on sidebar
                $subject_set = findAllSubjects();
                echo subjectNavigation($subject_set);
            ?>
            <hr>
            <h4>Пользователи</h4>
            <?php 
                // Shows all users on sidebar
                $user_set = findAllUsers();           
                userNavigation($user_set);
            ?>
        </div>
        <div class="col-xs-12 col-lg-10">
            <hr>
            <h4 class="center">Содержание</h4>            
            <table id="blogTable">
			<?php
                // Fetches pages for selected subject
                if(isset($_GET["subject"])){
                    $page_set = find_pages_for_subject($_GET["subject"]);
                    while($page = mysqli_fetch_assoc($page_set)) {
                        echo "<tr><td>Пользователь: </td><td>" . $page["CreatedBy"]."</td></tr>";                       
                        echo "<tr><td>Номер поста: </td><td>" . $page["ID"]."</td></tr>";
                        echo "<tr><td>Пост: </td><td>" . $page["Content"]."</td></tr>";
                        echo "<tr><td>Дата: </td><td>" . $page["CreatedDate"]."</td></tr>";
                    }	
                }elseif(isset($_GET["user"])){
                    $query = "SELECT * FROM user WHERE Login = '{$_GET["user"]}'";
                    $userinfo = mysqli_query($connection, $query);

                    while($user = mysqli_fetch_assoc($userinfo)) {;                 
                        $output = "<tr><td> ID: </td><td>" . $user["ID"] . "</td></tr>";
                        $output.= "<tr><td> Логин: </td><td>" . $user["Login"] . "</td></tr>";                        
                        $output.= "<tr><td> Фамилия: </td><td>" . $user["LastName"] . "</td></tr>";
                        $output.= "<tr><td> Имя: </td><td>" . $user["FirstName"] . "</td></tr>";
                        $output.= "<tr><td> Дата рождение: </td><td>" . $user["DOB"] . "</td></tr>";
                        $output.= "<tr><td> Пол: </td><td>" . $user["Gender"] . "</td></tr>";
                        $output.= "<tr><td> Дата: регистрация </td><td>" . $user["RegDate"] . "</td></tr>";
                        echo $output;
                    }
				}else{
                    echo "<p>Выберите из меню</p>";
                    echo "<a style=\"float:right\" href=\"add_subject.php\"><button>Добавить запись</button></a>";
                } 
            ?>
            </table><hr>
            <div class="col-xs-12 col-lg-10">
                <?php
                    if(!isset($_SESSION["User"])) {
                        $_SESSION["message"] = "<h5 class=\"center\">Чтобы создать или написать пост вы должны быть в системе. ";
                        $_SESSION["message"] .= "<a href=\"login.php\">Войти</a></h5>";
                        message();
                    }
                ?>
                <form class="form-inline" action="blog_form_process.php?id=<?php urlencode($_GET['subject']); ?>" role="form" id="blogAddForm" method="POST">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea cols="100" rows="10" class="form-control" name="Message" placeholder="Ваш пост.." required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <button type="submit" name="submit" class="btn btn-primary">Добавит</button>
                        </div>
                    </div>
                </form>
                <?php
                    if(isset($_GET["submit"])){
                        $Message = $_GET["Message"];
                        $CreatedBy = $_SESSION["User"];
                        $SubjectID = $_GET["subject"];

                        echo $GLOBALS["SubjectID"];
                    }
                ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="row" id="blogCommentRow">

    </div>
    <hr>
</div>
<?php include("../includes/layouts/footer.php"); ?>