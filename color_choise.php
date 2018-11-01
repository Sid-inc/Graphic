<?php

	session_start();
	if(!isset($_SESSION['user'])){
		header("Location:index.php");
	}
	require_once 'lib/dbconnect.php';
		if (isset($_POST['submit'])){
			if(isset($_POST['color'])){
				$link = db_connect(); //Подключение к БД
				$chek_color =  $link->query('SELECT color FROM graphic_users WHERE login = "'.$_SESSION['user'].'"');
				$chek_color = $chek_color->fetch_assoc();		
				if ($chek_color['color'] == ''){		
					$link->query('UPDATE graphic_users SET color = "'.$_POST['color'].'" WHERE login = "'.$_SESSION['user'].'"');		
					$link->query('UPDATE colors SET reserved = "1" WHERE code_color = "'.$_POST['color'].'"');			
					echo "<script>window.location.href='index.php'</script>";
					}else{
						$error_change_color = 'Цвет уже выбран, изменение невозможно';
					}
			}else{
				$error_change_color = 'Не выбран цвет';
			}
			unlink($link);
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
					<?php
						$link = db_connect();
						for	($n = 1; $n <= 7; $n++){
							$echo_color =  $link->query('SELECT code_color, reserved FROM colors WHERE id = "'.$n.'"');
							$echo_color = $echo_color->fetch_assoc();		
							if ($echo_color['reserved'] == '0'){
												echo '<p><input name="color" type="radio" value="'.$echo_color['code_color'].'">';
												echo '<svg width="30" height="15">';
												echo '<rect x="0" y="0" width="30" height="15" stroke="black" fill="'.$echo_color['code_color'].'"/>';
												echo '</svg>';
												echo '</p>';
							}
						}
				?>
				<input id="button" name="submit" type="submit" value="Выбрать"></input>
			</form>
			<span><?=$error_change_color?></span>
		</div>
	</div>
</body>
</html>