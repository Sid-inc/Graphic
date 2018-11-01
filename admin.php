<?php

	session_start();
	if(!isset($_SESSION['user'])){
		header("Location:index.php");
	}else if ($_SESSION['user'] <> 'Sid'){
		header("Location:index.php");
	}

	require_once 'lib/class/day.php';
	require_once 'lib/class/sotrudnik.php';
	require_once 'lib/dbconnect.php';
	require_once 'lib/functions.php';

	$link = db_connect(); //Подключение к БД

	$year = []; //Массив для объектов дней
	$year[0] = ''; 

	$sotrudniki = [];
	$sotrudniki[0] = '';

	for ($i = 1; $i <= 365; $i++){ //Собираем данные дней из бд в массив объектов
		$getting_array = get_record($link,$i);
		$year[] = new Day($getting_array['index_of_year'], $getting_array['day_num'], $getting_array['week_day'], $getting_array['month'], $getting_array['bak_color'], $getting_array['holyday'], $getting_array['start_interval']);
	}

	for ($i = 1; $i <= 7; $i++){ //Собираем данные пользователей в массив объектов
		$getting_array = get_record_sotrudnik($link,$i);
		$sotrudniki[] = new Sotrudnik($getting_array['id'], $getting_array['login'], $getting_array['name'], $getting_array['start_days'], $getting_array['first_start'], $getting_array['first_stop'], $getting_array['second_start'], $getting_array['second_stop'], $getting_array['color']);
	}
	echo '<ul>';
	for	($n = 1; $n < count($sotrudniki); $n++){
		echo '<li>';
		echo $sotrudniki[$n]->name.' ';
		if ($sotrudniki[$n]->first_start <> '0'){
			if ($sotrudniki[$n]->second_start <> '0'){
				echo '<a href="admin.php?user='.$sotrudniki[$n]->login.'&v=2">Очистить отпуск 2</a>';
			}else{
				echo '<a href="admin.php?user='.$sotrudniki[$n]->login.'&v=1">Очистить отпуск 1</a>';
			}
		}
		echo '</li>';
	}
	echo '</ul>';

	if (isset($_GET['user'])){ //Удалить отпуск
		if($_GET['v'] == '1'){
			for($x = $sotrudniki[get_user_id($sotrudniki, $_GET['user'])]->first_start; $x <= $sotrudniki[get_user_id($sotrudniki, $_GET['user'])]->first_stop; $x++){
				$link->query('UPDATE days SET bak_color = "" WHERE index_of_year = "'.$x.'"');
			}
			$link->query('UPDATE graphic_users SET first_start = "", first_stop = "" WHERE login = "'.$_GET['user'].'"');
			echo "<script>window.location.href='admin.php'</script>";
		}
		if($_GET['v'] == '2'){
			for($x = $sotrudniki[get_user_id($sotrudniki, $_GET['user'])]->second_start; $x <= $sotrudniki[get_user_id($sotrudniki, $_GET['user'])]->second_stop; $x++){
				$link->query('UPDATE days SET bak_color = "" WHERE index_of_year = "'.$x.'"');
			}
			$link->query('UPDATE graphic_users SET second_start = "", second_stop = "" WHERE id = "'.get_user_id($sotrudniki, $_GET['user']).'"');
			echo "<script>window.location.href='admin.php'</script>";
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

</body>
</html>