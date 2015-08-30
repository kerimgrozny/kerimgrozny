<?php require("../includes/db_connection.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<div class="row"><!--content row start-->
	<h1>Создание сайта</h1>
	<div class="col-xs-12 col-md-6">
		<p>Ваши мечты становятся реальностью! Всего за несколько дней Вы можете стать обладателем собственного сайта в сети Интернет. Создание недорогих и качественных сайтов, а также их последующее обслуживание и продвижение - основной вид нашей деятельности.
			Наше предложение для тех, кто осознает всю важность своего присутствия в глобальной сети Интернет, но еще не готов инвестировать в это направление серьезные деньги.
		</p>
	</div>
	<div class="col-xs-12 col-md-6">
		<img class="img-responsive" src="images/serviceImages/webdesign2.jpg" alt="Веб Дизайн">
		</p>
	</div>
</div><!--content row end--><hr>

<div class="row"><!--content row start-->
	<h1>Профессиональный фотомонтаж</h1>
	<div class="col-sm-12 col-md-6">
		<img class="img-responsive" src="images/serviceImages/makeup.jpg" alt="Фотомонтаж">
	</div>
	<div class="col-xs-12 col-md-6">
		<p>Опытные дизайнеры студии в нашей студии изготовят на основе Вашей фотографии и изображения фотоколлаж на заданную тему, если вам эта идея нравится больше чем шарж или портрет. Соответствующим образом обработанная фотография персонажа помещается в выбранное вами изображение среди шаблонов для фотомонтажа с последующим нанесением на холст. Монтаж выполняется на основе присланной Вами фотографии персонажа и изображения. Его можете предоставить Вы или выбрать из нашей коллекции. Для этого Вам надо указать тематику изображения.
		</p>
	</div>
</div><!--content row end--><hr>

<div class="row"><!--content row start-->
	<h1>Видеомонтаж</h1>
	<div class="col-sm-12 col-md-12">


		<table align="center" border="0" cellspacing="0" cellpadding="0" style="width: 960px; height: 60px;">
			<tr>
				<td style="text-align: center; font-size: 26px;">
					Tool - Caption Transition Viewer
				</td>
			</tr>
		</table>
		<table cellpadding="0" cellspacing="0" border="0" align="center">
			<tr>
				<td width="850" height="20"></td>
			</tr>
		</table>

		<!-- Caption Transition Controller Form Begine -->
		<table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000;">
			<tr>
				<td width="10">
				</td>
				<td width="110">
					<b>&nbsp; Select Transition</b>
				</td>
				<td width="320" height="40">
					<select name="ssTransition" id="ssTransition" style="width: 300px">
						<option value="">
					</select>
				</td>
				<td width="490">
					<input type="button" value="Play" id="sButtonPlay" style="width: 110px" name="sButtonPlay" disabled="disabled">
				</td>
				<td width="30">
				</td>
			</tr>
		</table>
		<table cellpadding="0" cellspacing="0" border="0" bgcolor="#EEEEEE" align="center" style="color:#000; background-color:silver;">
			<tr>
				<td width="10" height="40">
				</td>
				<td width="110">
					<b>&nbsp; Transition Code</b>
				</td>
				<td width="840" valign=center>
					<input id="stTransition" style="width: 833px; height: 25px;" type="text" name="stTransition">
				</td>
			</tr>
		</table>
		<!-- Caption Transition Controller Form End -->

		<table cellpadding="0" cellspacing="0" border="0" align="center">
			<tr>
				<td width="850" height="50">
				</td>
			</tr>
		</table>

		<table border="0" cellpadding="0" cellspacing="0" width="600" height="300" align="center" bgcolor="#EEEEEE">
			<tr>
				<td>
					<!-- Jssor Slider Begin -->
					<!-- To move inline styles to css file/block, please specify a class name for each element. -->
					<div style="position: relative; width: 960px; height: 380px; overflow: hidden;" id="slider1_container">
						<!-- Loading Screen -->
						<div u="loading" style="position: absolute; top: 0px; left: 0px;">
							<div style="filter: inherit; position: absolute; display: block;
                            background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
							</div>
							<div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                            top: 0px; left: 0px;width: 100%;height:100%;">
							</div>
						</div>

						<div u="slides" style="cursor: move; position: absolute; width: 960px; height: 380px;left:0px;top:0px; overflow: hidden;">
							<!-- Slide -->
							<div>
								<img u="image" src="../img/home/01.jpg">
								<img u="caption" t="0" style="position:absolute;left:200px;top:60px;width:80px;height:80px;" src="../img/icon-slider-12-jquery.png">
								<div u=caption t="0" d=-200 class="captionOrange"  style="position:absolute; left:350px; top: 85px; width:500px; height:30px;">
									Jssor responsive touch swipe javascript image slider
								</div>
								<div u=caption t="0" d=-200 class="captionOrange"  style="position:absolute; left:110px; top: 265px; width:500px; height:30px;">
									Best Performance Slider, Most Scalable Slider
								</div>
								<img u="caption" t="0" d=-200 style="position:absolute;left:680px;top:240px;width:80px;height:80px;" src="../img/icon-slider-12-jquery.png">
							</div>
							<!-- Slide -->
							<div>
								<img u="image" src="../img/home/02.jpg">
								<img u="caption" t="0" style="position:absolute;left:200px;top:60px;width:80px;height:80px;" src="../img/icon-slider-12-jquery.png">
								<div u=caption t="0" d=-200 class="captionOrange"  style="position:absolute; left:350px; top: 85px; width:500px; height:30px;">
									Jssor responsive touch swipe javascript image slider
								</div>
								<div u=caption t="0" d=-200 class="captionOrange"  style="position:absolute; left:110px; top: 265px; width:500px; height:30px;">
									Best Performance Slider, Most Scalable Slider
								</div>
								<img u="caption" t="0" d=-200 style="position:absolute;left:680px;top:240px;width:80px;height:80px;" src="../img/icon-slider-12-jquery.png">
							</div>
						</div>
					</div>
					<!-- Jssor Slider End -->
				</td>
			</tr>
		</table>
		<script>
			caption_transition_controller_starter("slider1_container");
		</script>

		<table align="center" border="0" cellspacing="0" cellpadding="0" style="width: 960px; height: 50px;">
			<tr>
				<td>
				</td>
			</tr>
		</table>

		<div class="backGreen" style="position: relative; margin: 0 auto; padding: 5px; width: 960px;">
			<div style="height:25px;"></div>
			<div class="description backBlue" style="height:190px;">
				<div class="descriptiont">
					The form above is to preview caption transition. You can select any caption transition from 390+ predefined caption transitions to play.<br>
					A caption transition can be any or combination of 'Fly (Hor)', 'Fly (Ver)', 'Clip', 'Zoom' and 'Rotate'.<br>
					Select transition to preview effect, once you get a transition that you prefer, you can copy the transition code from the transition code text box.<br />
					You can change value of '$Duration' to adjust speed of transition. e.g. '$Duration:1200' -> '$Duration: 2000'.
				</div>                    </div>
		</div>

		<table align="center" border=0 cellSpacing=0 cellPadding=0 style="width: 800px; height: 50px;">
			<tr>
				<td>
				</td>
			</tr>
		</table>
		<table align="center" border=0 cellSpacing=0 cellPadding=0 style="width: 960px; height: 30px;">
			<tr>
				<td valign="top" style="padding:0px;">
					<div style="position: absolute; width: 960px; height: 30px; overflow:hidden;">
						<div style="position: absolute; width: 100%; height: 100%; background-color: #27a9e3;
                        filter: alpha(opacity=30); opacity: .3;">
						</div>
						<div style="position: absolute; width: 100%; height: 100%; font-size:13px; color:#fff; line-height:30px;">
							<span>&nbsp;&nbsp;Copy right 2009-2013</span><span style="float:right;">Powered by Jssor&nbsp;&nbsp;</span>
						</div>
					</div>






	</div>
</div><!--content row end-->


<?php include("../includes/layouts/footer.php"); ?>
