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
	
}
?>