<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<title>Чеченские Програмисты</title>
<meta name="description" content="KerimGrozny - Форум чеченских программистов - здесь вы найдете программистов и всю информацию о програмирование">
<div class="container"><!--start: 1 container-->
    <div class="row">
        <h1 class="center"><a href="forum.php">Форум</a></h1>
        <h5 class="center">Добро пожаловать на официальный форум чеченских хаккеров программистов и начинающих.<br/> 
        Тут вы найдете интересующую для вас информацию, о программистов, разработчиков и дизайнеров.<br/> А также поделиться новой информации, которым вам бы хотелось с другими.
        </h5>
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
                echo userNavigation($user_set);
            ?>
        </div>
        <div class="col-xs-12 col-lg-10">
            <hr>
            <h4 class="center">Содержание</h4>
            <table id="blogTable">
			<?php
                // Fetches pages for selected subject
                if(isset($_GET["subject"])){
                    $page_set = findPagesForSubject($_GET["subject"]);
                    while($page = mysqli_fetch_assoc($page_set)){
                        $output  = "<tr><td>Номер поста: </td><td>";
                        $output .= $page["ID"];
                        $output .= "</td></tr>";
                        $output .= "<tr><td>Пост: </td><td>";
                        $output .= $page["Content"];
                        $output .= "</td></tr>";
                        $output .= "<tr><td>Дата: </td><td>";
                        $output .= $page["CreatedDate"];
                        $output .= "</td></tr>";
                        $output .= "<tr><td>Пользователь: </td><td>";
                        $output .= $page["CreatedBy"];
                        $output .= "</td></tr>";
                        $output .= "<tr><td><a href=\"edit_delete.php?id=".urlencode($page["ID"])."&user=".urlencode($page["CreatedBy"])."\">Изменить</a></td>";
                        $output .= "<td><a href=\"delete_post.php?id=".urlencode($page["ID"])."&user=".urlencode($page["CreatedBy"])."\">Удалить</a></td></tr>";
                        echo $output;
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
                } 
            ?>
            </table>
            <hr>
            <div class="col-xs-12 col-lg-10">
                <?php
                    message();
                ?>
                <form class="form-inline" action="blog_form_process.php" role="form" method="POST">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea cols="80" rows="10" class="form-control" name="content" placeholder="Ваш пост.." required></textarea>
                        </div>
                    </div>
                    <div class="form-inline">
                        <label class="control-label col-sm-2">Тема</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="subject" required>
                                <option value=""></option>
                                <?php $selectSubject = findAllSubjects(); 
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