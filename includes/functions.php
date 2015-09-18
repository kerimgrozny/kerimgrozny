<?php
	
	function confirm_query($result_set){
		if (!$result_set) {
			die("Запрос к базе данных не удалось.");
		}		
	}

    function find_all_subjects(){
        global $connection;

        $query  = "SELECT * ";
        $query .= "FROM blog_subject";
        $subject_set = mysqli_query($connection, $query);
        confirm_query($subject_set);
        
        return $subject_set;
        mysqli_free_result($subject_set);
    }

    function subjectNavigation($find_all_subjects) {
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
        confirm_query($page_set);
        return $page_set;
        mysqli_free_result($page_set);        
    }

    function find_all_users(){
    	global $connection;

    	$query = "SELECT * FROM user";
    	$user_set = mysqli_query($connection, $query);
    	confirm_query($user_set);
    	return $user_set;
    	mysqli_free_result($user_set);
    }

    function escape_string($string){
        global $connection;

        $string = mysqli_real_escape_string($connection, $string);
        return $string;
    }
	
	function commentsDisplay() { ?> <div class="row" style="background:#6C91B5;color:#fff">
		<div class="col-xs-12 col-lg-12">
			<h4 class="center">Коментарии</h4>
			<table class="commonTable">
			<?php
				global $connection;
				
				$query = "SELECT * FROM comment";
				$result = mysqli_query($connection, $query);
				
				while($comment = mysqli_fetch_assoc($result)){
					echo "<tr><td><i> ИД </i></td><td>" . $comment["ID"] . "</td></tr>";
					echo "<tr><td><i> Тема </i></td><td>" . $comment["Name"] . "</td></tr>";
					echo "<tr><td><i> Комментария </i> </td><td>" . $comment["Comment"] . "</td></tr>";
					echo "<tr><td><i> Пользователь </i> </td><td>" . $comment["User"] . "</td></tr>";
					echo "<tr><td><i> Дата </i><hr></td><td>" . $comment["Date"] . "<hr></td></tr>";
				}
				if(mysqli_num_rows($result) == 0){
					echo "<h5>Комментарий еще никто не сделал, будь первым.</h5>";
				}
			?>
			</table>
		</div></div><?php } 
	

	function commentBlock() { ?> 
		<div class="row">
			<div class="col-xs-12 col-lg-12" style="background-color:#336699;color:#fff">
					<?php if(!isset($_SESSION["User"])){
						echo "<h5 class=\"center\"><i>Вы еще не в системе, <a href=\"login.php\">войдите</a> чтобы сделать комментарии</i></h5>";
					}
					?>
				<form class="form-group" action="comment.php" method="POST" role="form">
						<h4 class="center">Оставить комментарию</h4>   	     	

					<div class="form-inline">
						<label class="control-label col-sm-3">Тема:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="Name" required>
						</div>
					</div>
					<div class="form-inline">
						<label class="control-label col-sm-3">Комментария:</label>
						<div class="col-sm-9">
							<textarea cols="50" rows="5" class="form-control" name="Comment" required></textarea>
						</div>
					</div>
					<div class="form-inline">
						<div class="col-sm-12">
							<input type="submit" class="form-control" name="submit" value="Добавит"><hr>
						</div>
					</div>
				</form> 
			</div>					
	    </div> 
	    <?php }        
    

?>