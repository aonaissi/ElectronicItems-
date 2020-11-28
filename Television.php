<?php 


require_once("ElectronicItem.php");

/**
*
*	composite type
*/
class Television extends ElectronicItem{

	/**
	*
	*@var \SplObjectStorage
	*/
	private $children;

	public function __construct($price){

        $this->children = new \SplObjectStorage();
    
		$this->setType(self::ELECTRONIC_ITEM_TELEVISION);
		$this->setPrice($price);
		$this->setWired(true);
	}

	public function maxExtras(): int{
		return self::MAX_EXTRAS_UNLIMITED;
	}

	public function add(ElectronicItem $item): void{
		//max extras reached ? don't add
		if (!$this->canAddExtras()){
			return;
		}
		$this->children->attach($item);
		$this->setParent($this);
	}

	public function remove(ElectronicItem $item): void{
		$this->children->detach($item);
		$this->setParent(NULL);
	}

	public function isComposite(): bool{
		return true;
	}

	public function getPrice(){
		$total = parent::getPrice();
		foreach ($this->children as $child){
			$total += $child->getPrice();
		}
		return $total;
	}

	public function getChildren(){
		return $this->children;
	}

	function canAddExtras(): bool{
		return true;
	}

	//return string summary of the item
	function getSummary(): string{
		$output = "Product: " . $this->getType() . " total price: " .money_format('%i', $this->getPrice()). "$<br/> ---Price: " . money_format('%i', $this->price) . "$<br/>";
		foreach ($this->children as $child){
			$output .= "---" . $child->getSummary();
		}
		return $output;
	}

}