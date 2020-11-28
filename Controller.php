<?php 

require_once("ElectronicItem.php");

/**
*
*	Primitive type
*/
class Controller extends ElectronicItem{

	public function __construct($price, $isWired){
		$this->setType(self::ELECTRONIC_ITEM_CONTROLLER);
		$this->setPrice($price);
		$this->setWired($isWired);
	}

	//return string summary of the item
	function getSummary(): string{
		return "Product: " . $this->getType() . (($this->getWired()) ? " (Wired)" : " (Remote)") . " price: " . money_format('%i', $this->price) . "$<br/>";
	}

	public function maxExtras(): int{
		return 0;
	}

}