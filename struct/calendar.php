<div class="months">
<?php
$monthid = [ '1' => 'Январь',
						'2' => 'Февраль',
						'3' => 'Март',
						'4' => 'Апрель',
						'5' => 'Май',
						'6' => 'Июнь',
						'7' => 'Июль',
						'8' => 'Август',
						'9' => 'Сентябрь',
						'10' => 'Октябрь',
						'11' => 'Ноябрь',
						'12' => 'Декабрь'];

$day_counter = 1;
for ($m = 1;$m <= 12;$m++){ //Перебираем месяцы
	echo '<table';
	if ($m % 4 <> 0) echo ' class="floating" '; //Включаем обтекание для всех блоков кроме 4го
	echo '>';
	echo '<tr><th colspan="7">'.$monthid[$m].'</th></tr>'; //Вывод названия месяца
	echo '<tr><td>пн</td><td>вт</td><td>ср</td><td>чт</td><td>пт</td><td style="color: red;">сб</td><td style="color: red;">вс</td></tr>'; //Вывод названия дней недели
	for ($y = 1; $y <= 6; $y++){ //Представляем месяц в виде талицы 6х7. Выводим строки
		echo '<tr>'; //Начало строки
		for  ($x = 1; $x <= 7; $x++){ //Выводим столбцы
			if ($x<=$year[$day_counter]->DayStartInterval){ //Выводим пустые ячейки если текущем столбце нет номера дня
				echo '<td> </td>';
			}else if($year[$day_counter]->DayMounth == $m){ 
				echo '<td bgcolor="'.$year[$day_counter]->DayColor.'"';
				if ($year[$day_counter]->DayHolly == '1'){ echo ' style="color: red;"';} //Если день выходной, красим в красный
				echo '>';
				echo $year[$day_counter]->DayNumber.'</td>';
				$day_counter++;
			}else{
				echo '<td> </td>';
			}
		}
		echo '</tr>';
	}
	if(isset($_SESSION['user'])){
		echo '<tr><td colspan="7" class="daycount">Доступно дней: '.round($sotrudniki[get_user_id($sotrudniki, $_SESSION['user'])]->day_avalible($day_counter-1), 2).'</td></tr>';
	}
	echo '</table>';
}
?>
</body>
</html>



