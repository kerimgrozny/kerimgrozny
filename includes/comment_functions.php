<?php
	function commentsDisplay() { ?>
	<div class="row"><hr>
		<div class="col-xs-12 col-lg-12">
			<p class="center">Коментарии</p>
			<?php
				global $connection;
				
				$query = "SELECT * FROM comment";
				$result = mysqli_query($connection, $query);			
				while($comment = mysqli_fetch_assoc($result)){
					$output  = "<p> {$comment["Name"]} </p>";
					$output .= "<p><i> {$comment["ID"]} </i>&nbsp; {$comment["Comment"]} </p>"; 
					$output .= "<p><i>от:</i> <a href=\"forum.php?user={$comment["User"]}\">{$comment["User"]} </a>";
					$output .= "<i>в:</i> {$comment["Date"]}</i></p><hr>";
					echo $output;
				}

				if(mysqli_num_rows($result) == 0){
					echo "<h5 class=\"center\">Комментарий еще никто не сделал, будь первым.</h5>";
				}
			?>
		</div>
	</div>
	<?php } 
	function commentBlock() { ?> 
		<div class="row">
			<div class="col-xs-12 col-lg-12" style="background-color:#fff;color:#000">
					<?php if(!isset($_SESSION["User"])){
						echo "<h5 class=\"center\"><i>Вы еще не в системе, <a href=\"login.php\">войдите</a> чтобы сделать комментарие</i></h5>";
					}
					?>
				<form class="form-group" action="comment.php" method="POST" role="form">
						<p class="center">Оставить комментарию</p>   	     	

					<div class="form-inline">
						<label class="control-label col-sm-2">Тема:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="Name" required>
						</div>
					</div>
					<div class="form-inline">
						<label class="control-label col-sm-2">Комментария:</label>
						<div class="col-sm-10">
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
<?php } ?>        