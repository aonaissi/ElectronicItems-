<?php 


require_once("ElectronicItem.php");

/**
*
*	Primitive type
*/
class Microwave extends ElectronicItem{

	public function __construct($price){
		$this->setType(self::ELECTRONIC_ITEM_MICROWAVE);
		$this->setPrice($price);
		$this->setWired(true);
	}


	public function maxExtras(): int{
		return 0;
	}

}