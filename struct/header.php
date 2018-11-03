<!DOCTYPE html>
<html>
<head>
	<meta http-equiv=Content-Type content="text/html;charset=UTF-8">
	  <link href="css/style.css?=1273" type="text/css" rel="stylesheet" />
	  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<title>График отпусков</title>
</head>
<body>
	<header>
		<div id="login">
		<?php
			if (!isset($_SESSION['user'])){
				echo '<a id="button" class="button-main-page" href="login.php"><span>Авторизация';
			}else{
				echo '<a id="button" class="button-main-page" href="index.php?logout=1"><span>Выход';
			}
		?>
		</span>
		</a></div>
		<div class="title">
			<h1>График отпусков на 2019 год</h1>
		</div>
	</header>