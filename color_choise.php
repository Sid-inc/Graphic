<?php

	session_start();
	if(!isset($_SESSION['user'])){
		header("Location:index.php");
	}
	require_once '/lib/dbconnect.php';
		if (isset($_POST['submit'])){
			if(isset($_POST['color'])){
				$link = db_connect(); //Подключение к БД
				$chek_color =  $link->query('SELECT color FROM graphic_users WHERE login = "'.$_SESSION['user'].'"');
				$chek_color = $chek_color->fetch_assoc();		
				if ($chek_color['color'] == ''){		
					$link->query('UPDATE graphic_users SET color = "'.$_POST['color'].'" WHERE login = "'.$_SESSION['user'].'"');				
					echo "<script>window.location.href='index.php'</script>";
					}else{
						$error_change_color = 'Цвет уже выбран, изменение невозможно';
					}
			}else{
				$error_change_color = 'Не выбран цвет';
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
			<form name="color_choise" action="color_choise.php" method="post">
				<p>Выбери цвет</p>
				<p><input name="color" type="radio" value="#19ff19">
					<svg width="30" height="15">
					<rect x="0" y="0" width="30" height="15" stroke="black" fill="#19ff19"/>
					</svg>	
				</p>
				<p><input name="color" type="radio" value="#6666ff">
					<svg width="30" height="15">
					<rect x="0" y="0" width="30" height="15" stroke="black" fill="#6666ff"/>
					</svg>	
				</p>
				<p><input name="color" type="radio" value="#ff4e33">
					<svg width="30" height="15">
					<rect x="0" y="0" width="30" height="15" stroke="black" fill="#ff4e33"/>
					</svg>	
				</p>
				<p><input name="color" type="radio" value="#f7f21a">
					<svg width="30" height="15">
					<rect x="0" y="0" width="30" height="15" stroke="black" fill="#f7f21a"/>
					</svg>	
				</p>
				<p><input name="color" type="radio" value="#cc6600">
					<svg width="30" height="15">
					<rect x="0" y="0" width="30" height="15" stroke="black" fill="#cc6600"/>
					</svg>	
				</p>
				<p><input name="color" type="radio" value="#f06580">
					<svg width="30" height="15">
					<rect x="0" y="0" width="30" height="15" stroke="black" fill="#f06580"/>
					</svg>	
				</p>
				<p><input name="color" type="radio" value="#00bfff">
					<svg width="30" height="15">
					<rect x="0" y="0" width="30" height="15" stroke="black" fill="#00bfff"/>
					</svg>	
				</p>												
				<input id="button" name="submit" type="submit" value="Выбрать"></input>
			</form>
			<span><?=$error_change_color?></span>
		</div>
	</div>
</body>
</html>