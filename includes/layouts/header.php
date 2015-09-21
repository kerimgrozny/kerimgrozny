<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Poiret+One&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/typography.css">
  <link rel="stylesheet" href="css/slideshow.css">
  <link rel="stylesheet" href="css/simple-sidebar.css"> 
</head>
<body>

<nav class="navbar-default navbar-inverse" id="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php" id="logoText">KerimGrozny</a>
    </div>
    <div class="collapse navbar-collapse" style="text-align: center" id="myNavbar">
      <ul class="nav navbar-nav" style="display: inline-block; float: none; vertical-align: top;">
        <li><a href="index.php">Главная</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Услуги<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="zakazat_sayt.php">Профессиональный сайт</a></li>
            <li><a href="videomontazh.php">Видеомонтаж</a></li>
            <li><a href="logo.php">Логотип</a></li>
            <li><a href="osupdate.php">Прошивка Android И PC</a></li><br>
            <li><a href="zakazat.php">Заказать услугу</a></li>
          </ul>
        </li>
        <li><a href="downloads.php">Загрузки</a></li>
        <li><a href="contact.php">Контакты</a></li>
        <li><a href="forum.php">Форум</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right" id="userTab">
      <?php
	  	if(!isset($_SESSION["User"])) { ?>
        	<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Логин</a></li>
        	<li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> Регистрация</a></li>
      <?php 
		  }else{ ?>
        	<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Профиль</a></li>
        	<li><a href="logout.php"><span class="glyphicon glyphicon-log-out onclick="confirm("Вы уверены?")"></span> Выйти</a></li>
      <?php } ?>				
        
      </ul>
    </div>
  </div>
</nav>





