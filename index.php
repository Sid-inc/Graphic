<?php

session_start();

require_once 'lib/class/day.php';
require_once 'lib/class/sotrudnik.php';
require_once 'lib/dbconnect.php';
require_once 'lib/functions.php';

if ($_GET['logout'] == 1) unset($_SESSION['user']);

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

if (isset($_POST['submit'])){ //Задать отпуск
	$nd = get_day_id($_POST['day'], $_POST['mounth'], $year);
	if($nd == 'error') {
	$date_error = 'Некорректная дата';
	}else{
		$set = $sotrudniki[get_user_id($sotrudniki, $_SESSION['user'])]->set_vacation($nd, $year);
		if(!is_numeric($set)){
			$date_error = $set;
		}else{
			for($x = $nd; $x <= $nd+$set; $x++){
				set_voc_color($x, $sotrudniki[get_user_id($sotrudniki, $_SESSION['user'])]->color, $link);
			}
			if ($sotrudniki[get_user_id($sotrudniki, $_SESSION['user'])]->first_start == '0'){
				$link->query('UPDATE graphic_users SET first_start = "'.$nd.'", first_stop = "'.($nd+$set).'" WHERE login = "'.$sotrudniki[get_user_id($sotrudniki, $_SESSION['user'])]->login.'"');
			}else{
				$link->query('UPDATE graphic_users SET second_start = "'.$nd.'", second_stop = "'.($nd+$set).'" WHERE login = "'.$sotrudniki[get_user_id($sotrudniki, $_SESSION['user'])]->login.'"');
				if ($sotrudniki[get_user_id($sotrudniki, $_SESSION['user'])]->login <> 'Sid'){
					unset($_SESSION['user']);
					echo "<script>window.location.href='index.php'</script>";
				}
			}
			echo "<script>window.location.href='index.php'</script>";
		}
	}
}
	
require_once 'struct/header.php';
if(!isset($_SESSION['user'])){ 
	echo '<div id="interval"></div>';
}else{
	require_once 'struct/user.php';
}

require_once 'struct/legend.php';
require_once 'struct/calendar.php';

?>
