<?php

class Day 
{
	public $DayIndex;
	public $DayNumber;
	public $DayName;
	public $DayMounth;
	public $DayColor;
	public $DayHolly;
	public $DayStartInterval;
	
	public function __construct($index, $number, $name, $mounth, $color, $hollyday, $StartInterval)
	{
		$this->DayIndex = $index;
		$this->DayNumber = $number;
		$this->DayName = $name;
		$this->DayMounth = $mounth;
		$this->DayColor = $color;
		$this->DayHolly = $hollyday;
		$this->DayStartInterval = $StartInterval;
	}
}



?>