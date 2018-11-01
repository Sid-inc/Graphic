<?php

class Sotrudnik
{
	private $addpday = 0.0767123287671233;
	public $id;
	public $login;
	public $name;
	public $start_days;
	public $first_start;
	public $first_stop;
	public $second_start;
	public $second_stop;
	public $color;
	
	public function __construct($id, $login, $name, $start_days, $first_start, $first_stop, $second_start, $second_stop, $color)
	{
		$this->id = $id;
		$this->login = $login;
	    $this->name = $name;
		$this->start_days = $start_days;
		$this->first_start = $first_start;
		$this->first_stop = $first_stop;
		$this->second_start = $second_start;
		$this->second_stop = $second_stop;
		$this->color = $color;
	}
	
	public function day_avalible($dayindex)
	{
		if($this->first_start <> '0'){ 
			if($dayindex < $this->first_start){ //Если запрошенный, день раньше первого отпуска возращаем "-", для вывода в календаре
				return '-'; 
			}else{
				return (($this->start_days + $dayindex) - ($this->first_stop - $this->first_start)) * $this->addpday;//Если первый отпуск уже задан то при расчете остатка вычитаем количество дней израсходованных на первый отпуск
			}
		}else{
			return $this->start_days + $dayindex * $this->addpday;
		}
	}
	
	public function set_vacation($first_day, $year)
	{
		$i = 14;
		$d = 0;
		if ($this->day_avalible($first_day) < 11.67){
			return 'Недостаточно дней для начала отпуска в выбранную дату';
		}else{
			while ($i >= 1){
				if($year[$first_day+$d]->DayColor <> '') {
					return 'Пересечение отпусков!';
					break;
				}//else{
				//	$year[$first_day+$d]->DayColor = $this->color;
				//}
				$d++;
				if(($year[$first_day+$d]->DayName <> 'сб') && ($year[$first_day+$d]->DayName <> 'вс') && ($year[$first_day+$d]->DayHolly == 1)){
					continue;
				}else{
					$i--;
				}
			}
			//if($year[$first_day+$d-1]->DayName == 'сб') $year[$first_day+$d]->DayColor = $this->color;
			return $d-1;	
		}
	}	
}
?>