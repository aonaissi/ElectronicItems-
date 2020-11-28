<?php 

/*
* Composite structure: ElectronicItem as a primitive type;
*
*/
abstract class ElectronicItem {

	/**
	* @var parent of the object
	*/
	protected $parents;

	/**
	* @var float
	*/
	public $price;
	/**
	* @var string
	*/
	private $type;
	public $wired;

	const ELECTRONIC_ITEM_TELEVISION = 'television';
	const ELECTRONIC_ITEM_CONSOLE = 'console';
	const ELECTRONIC_ITEM_MICROWAVE = 'microwave';
	const ELECTRONIC_ITEM_CONTROLLER = 'controller';

	/*
	* constant for unlimited entries
	*/
	const MAX_EXTRAS_UNLIMITED = -1;

	private static $types = array(self::ELECTRONIC_ITEM_CONSOLE,
		self::ELECTRONIC_ITEM_MICROWAVE, self::ELECTRONIC_ITEM_TELEVISION, self::ELECTRONIC_ITEM_CONTROLLER);
	
	function getPrice()
	{
		return $this->price;
	}


	function getType()
	{
		return $this->type;
	}
	function getWired()
	{
		return $this->wired;
	}
	function setPrice($price)
	{
		$this->price = $price;
	}
	function setType($type)
	{
		$this->type = $type;
	}
	function setWired($wired)
	{
		$this->wired = $wired;
	}

	//return string summary of the item
	function getSummary(): string{
		return "Product: " . $this->getType() . " price: " . money_format('%i', $this->price) . "$<br/>";
	}

	public abstract function maxExtras(): int;

	function canAddExtras(): bool{
		return false;
	}

	//--------- Composite methods -------------


	function setParent(ElectronicItem $item){
		$this->parent = $item;
	}

	function getParent(): ElectronicItem{
		return $this->parent;
	}

	
	function isComposite(): bool{
		return false;
	}

	function add(ElectronicItem $item) : void{}
	function remove(ElectronicItem $item) : void{}
}