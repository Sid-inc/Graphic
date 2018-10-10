<?php

class Sotrudnik
{
	private $addpday = 0.0767123287671233;
	public $id;
	public $login;
	public $name;
	public $start_days;
	public $first;
	public $second;
	public $color;
	
	public function __construct($id, $login, $name, $start_days, $first, $second, $color)
	{
		$this->id = $id;
		$this->login = $login;
	    $this->name = $name;
		$this->start_days = $start_days;
		$this->first = $first;
		$this->second = $second;
		$this->color = $color;
	}
	
	public function day_avalible($dayindex)
	{
		return $this->start_days + $dayindex * $this->addpday;
	}
	
	public function set_vacation($first_day, $year)
	{
		$i = 14;
		$d = 0;
		while ($i >= 1){
			if($year[$first_day+$d]->DayColor <> '') {
				return 'Пересечение отпусков!';
				break;
			}else{
				$year[$first_day+$d]->DayColor = $this->color;
			}
			$d++;
			if(($year[$first_day+$d]->DayName <> 'сб') && ($year[$first_day+$d]->DayName <> 'вс') && ($year[$first_day+$d]->DayHolly == 1)){
				continue;
			}else{
				$i--;
			}
		}
		if($year[$first_day+$d-1]->DayName == 'сб') $year[$first_day+$d]->DayColor = $this->color;
		return 'ok';	
	}	
}
?>