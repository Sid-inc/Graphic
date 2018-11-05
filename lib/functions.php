<?php

function get_record($link, $i) //Получение данных дня из БД
{
	$tmp =  $link->query("SELECT index_of_year, day_num, week_day, month, bak_color, holyday, start_interval FROM days WHERE index_of_year = $i");
	$tmp = $tmp->fetch_assoc();
	return $tmp;
}

function get_record_sotrudnik($link, $i) //Получение данных пользователей из БД
{
	$tmp =  $link->query("SELECT id, login, name, start_days, first_start, first_stop, second_start, second_stop, color FROM graphic_users WHERE id = $i");
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

function get_day_id($mounthday, $mounth, $year)
{
	for ($i=1;$i<=365; $i++){
		if(($year[$i]->DayNumber == $mounthday) && ($year[$i]->DayMounth == $mounth)) return $i;
	}
	return 'error';
}

function set_voc_color($x, $color, $link)
{
	$link->query('UPDATE days SET bak_color = "'.$color.'" WHERE index_of_year = "'.$x.'"');				
}

function get_mounth_id($name){
	switch ($name) {
    case 'Февраль':
        return 2;
        break;
    case 'Март':
        return 3;
        break;
	case 'Апрель':
        return 4;
        break;
	case 'Май':
        return 5;
        break;
	case 'Июнь':
        return 6;
        break;
	case 'Июль':
        return 7;
        break;
	case 'Август':
        return 8;
        break;
	case 'Сентябрь':
        return 9;
        break;
	case 'Октябрь':
        return 10;
        break;
	case 'Ноябрь':
        return 11;
        break;
	}
}

?>