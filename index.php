<?php

session_start();

require_once '/lib/class/day.php';
require_once '/lib/class/sotrudnik.php';
require_once '/lib/dbconnect.php';

if ($_GET['logout'] == 1) unset($_SESSION['user']);

$link = db_connect(); //Подключение к БД

$year = []; //Массив для объектов дней
$year[0] = ''; 

$sotrudniki = [];
$sotrudniki[0] = '';

function get_record($link, $i) //Получение данных дня из БД
{
	$tmp =  $link->query("SELECT index_of_year, day_num, week_day, month, bak_color, holyday, start_interval FROM days WHERE index_of_year = $i");
	$tmp = $tmp->fetch_assoc();
	return $tmp;
}

function get_record_sotrudnik($link, $i) //Получение данных пользователей из БД
{
	$tmp =  $link->query("SELECT id, login, name, start_days, first, second, color FROM graphic_users WHERE id = $i");
	$tmp = $tmp->fetch_assoc();
	return $tmp;
}

function get_user_id($arr, $name){
	$gettingid='';
	for($i = 1; $i <= 7; $i++){
		if ($arr[$i]->login == $name){
			$gettingid = $i;
		}
	}
	return $gettingid;
}

for ($i = 1; $i <= 365; $i++){ //Собираем данные дней из бд в массив объектов
	$getting_array = get_record($link,$i);
	$year[] = new Day($getting_array['index_of_year'], $getting_array['day_num'], $getting_array['week_day'], $getting_array['month'], $getting_array['bak_color'], $getting_array['holyday'], $getting_array['start_interval']);
}

for ($i = 1; $i <= 7; $i++){ //Собираем данные пользователей в массив объектов
	$getting_array = get_record_sotrudnik($link,$i);
	$sotrudniki[] = new Sotrudnik($getting_array['id'], $getting_array['login'], $getting_array['name'], $getting_array['start_days'], $getting_array['first'], $getting_array['second'], $getting_array['color']);
}

require_once '/struct/header.php';
if(!isset($_SESSION['user'])){ 
	echo '<div id="interval"></div>';
}else{
	require_once '/struct/user.php';
}

require_once '/struct/legend.php';
require_once '/struct/calendar.php';

?>
