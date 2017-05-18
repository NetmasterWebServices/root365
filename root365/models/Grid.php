<?php

class Grd
{
	private $gridCode;
	private $gridName;

	public function getCode()
	{
		return $this->gridCode;
	}
	public function setCode($gridCode)
	{
		$this->gridCode= $gridCode;
	}
	
	public function getName()
	{
		return $this->gridName;
	}
	public function setName($gridCode)
	{
		$this->gridName= $gridCode;
	}

	public function getGridDetails($gridCode)
	{
		return "Details for grid with code: ". $gridCode;
	}

}