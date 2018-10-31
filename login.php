<?php

	session_start();
	if(isset($_SESSION['user'])){
		header("Location:index.php");
	}
	require_once '/lib/dbconnect.php';
			
	if (isset($_POST['submit'])){
		$link = db_connect(); //Подключение к БД				
		$input_login = htmlspecialchars($_POST['login']);
		$input_password = htmlspecialchars($_POST['password']);
		$chek_user =  $link->query('SELECT login, password, second_start FROM graphic_users WHERE login = "'.$input_login.'"');
		$chek_user = $chek_user->fetch_assoc();
		if ($chek_user['login'] == ''){
			$error_login = 'Неверный логин';
		}else if($chek_user['password']<>$input_password){
			$error_login = 'Неверный пароль';
		}else{
			if(($chek_user['second_start'] == '0') || $input_login == 'Sid'){
				$_SESSION['user'] = $input_login;
				echo "<script>window.location.href='index.php'</script>";
			}else{
				$error_login = 'Сорян, бро, отпуска уже заданы, логинится незачем';
			}
		}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv=Content-Type content="text/html;charset=UTF-8">
	  <link href="/css/style.css?=123" type="text/css" rel="stylesheet" />
	<title>График отпусков</title>
</head>
<body>
	<div id="full">
		<div id="autorization">
			<form name="login" action="login.php" method="post">
				<p id="topinterval">Логин</p>
				<input class="txtfield" type="text" name="login"></input><br />
				<p>Пароль<p>
				<input class="txtfield" type="password" name="password"></input><br />
				<input id="button" name="submit" type="submit" value="Войти"></input>
			</form>
			<span><?=$error_login?></span>
		</div>
	</div>
</body>
</html>
