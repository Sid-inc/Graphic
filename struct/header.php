<!DOCTYPE html>
<html>
<head>
	<meta http-equiv=Content-Type content="text/html;charset=UTF-8">
	  <link href="/css/style.css?=1273" type="text/css" rel="stylesheet" />
	<title>График отпусков</title>
</head>
<body>
	<header>
		<div id="login">
		<?php
			if (!isset($_SESSION['user'])){
				echo '<a href="login.php"><p>Авторизация';
			}else{
				echo '<a href="index.php?logout=1"><p>Выход';
			}
		?>
		</p></a></div>
		<h1>График отпусков на 2019 год</h1>
	</header>