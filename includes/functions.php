<?php
    function find_all_subjects() {
        global $connection;

        $query  = "SELECT * ";
        $query .= "FROM blog_subject ";
        $subject_set = mysqli_query($connection, $query);
        return $subject_set;   
    }

    function blogNavigation($find_all_subjects) {
        $output = "<ul>";
            $subject_set = $find_all_subjects;
            while($subject = mysqli_fetch_assoc($subject_set)) {
                $output .= "<li><a href=\"blog.php?subject=";
                $output .=  $subject["ID"];
                $output .= "\">";
                $output .=  $subject["Name"];
                $output .= "</a></li>";
            }
        mysqli_free_result($subject_set);
        $output .= "</ul>";
        return $output;
    }

    function find_pages_for_subject($SubjectID){
        global $connection;

        $SubjectID = $_GET["subject"];
        $query = "SELECT * FROM blog_page WHERE SubjectID = $SubjectID";
        $page_set = mysqli_query($connection, $query);
        return $page_set;
    }

    function prep_string($escaped_string){
        global $connection;

        $escaped_string = mysqli_real_escape_string($connection, $escaped_string);
        return $escaped_string;
    }
	
	function commentsDisplay() { ?>

        <div class="row"><!--content row start-->
            <h4><i>Комментарии</i></h4>		
            <div class="col-xs-12 col-lg-12" style="background-color: #FFE3C1">
                <table class="commonTable">
                <?php
					global $connection;
					
                    $query = "SELECT * FROM comment";
                    $result = mysqli_query($connection, $query);
                    
                    while($comment = mysqli_fetch_assoc($result)){
                        echo "<tr><td><i> ИД </i></td><td>" . $comment["ID"] . "</td></tr>";
                        echo "<tr><td><i> Тема </i></td><td>" . $comment["Name"] . "</td></tr>";
                        echo "<tr><td><i> Коментария</i> </td><td>" . $comment["Comment"] . "</td></tr>";
                        echo "<tr><td><i> Сделал(а)</i> </td><td>" . $comment["User"] . "</td></tr>";
                        echo "<tr><td><i> Дата </i></td><td>" . $comment["Date"] . "<hr></td></tr><br>";
                    }
					if(mysqli_num_rows($result) == 0){
						echo "<h3>Никто не сделал комментарий, будь первым.</h3>";	
					}
                ?>
                </table>
            </div>
        </div>
		
	<?php } 
	
	function commentBlock() { ?>
    	
        <div class="row">
            <div class="col-xs-12 col-lg-12" style="background-color:#9FC5FF">
                <h4><i>Оставить комментарию</i></h4>
					<?php if(!isset($_SESSION["User"])){
                        echo "<h5><i>Вы еще не в системе, <a href=\"login.php\">войдите</a> чтобы сделать комментарии </i></h5>";
                    }
				?>
                <form class="form-group" action="comment.php" method="POST" role="form">
                    <div class="form-inline">
                        <label class="control-label col-sm-3">Тема:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="Name" required>
                        </div>
                    </div>
                    <div class="form-inline">
                        <label class="control-label col-sm-3">Комментария:</label>
                        <div class="col-sm-9">
                            <textarea cols="50" rows="5" class="form-control" name="Comment" placeholder="Ваше комментария" required></textarea>
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="col-sm-12">
                            <input type="submit" class="form-control" name="submit" value="Добавит"><hr>
                        </div>
                    </div>
                </form> 
            </div>		
        </div><!--content row end-->        
    
    <?php }
?>