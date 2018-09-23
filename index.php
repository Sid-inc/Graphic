<?php

require_once '/lib/class/day.php';
require_once '/lib/dbconnect.php';



function get_record($link, $i) //Получение данных дня из БД
{
	$tmp =  $link->query("SELECT index_of_year, day_num, week_day, month, bak_color, holyday, start_interval FROM days WHERE index_of_year = $i");
	$tmp = $tmp->fetch_assoc();
	return $tmp;
}

$link = db_connect(); //Подключение к БД

$year = []; //Массив для объектов дней
$year[0] = ''; 

for ($i = 1; $i <= 365; $i++){ //Собираем данные дней из бд в массив объектов
	$getting_array = get_record($link,$i);
	$year[] = new Day($getting_array['index_of_year'], $getting_array['day_num'], $getting_array['week_day'], $getting_array['month'], $getting_array['bak_color'], $getting_array['holyday'], $getting_array['start_interval']);
}

require_once '/struct/header.php';
require_once '/struct/user.php';
require_once '/struct/legend.php';
require_once '/struct/calendar.php';


?>
