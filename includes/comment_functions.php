<?php
	function commentsDisplay() { ?> <hr><div class="row" style="background:#fff;color:#000">
		<div class="col-xs-12 col-lg-12">
			<p class="center">Коментарии</hp>
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
					echo "<h5 class=\"center\">Комментарий еще никто не сделал, будь первым.</h5>";
				}
			?>
			</table>
		</div></div>
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