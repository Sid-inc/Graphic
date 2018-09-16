<?php

class Day 
{
	public $DayMounth;
	public $DayNumber;
	public $DayName;
	public $hollyday;
	
	public function __construct($mounth, $number, $name, $hollyday)
	{
		$this->DayMounth = $mounth;
		$this->DayNumber = $number;
		$this->DayName = $name;
		$this->hollyday = $hollyday;
	}
}



?>