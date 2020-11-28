<?php 


require_once("ElectronicItem.php");

class Console extends ElectronicItem{

	private $children;

	public function __construct($price){
		$this->children = new \SplObjectStorage();
		$this->setType(self::ELECTRONIC_ITEM_CONSOLE);
		$this->setPrice($price);
		$this->setWired(true);
	}

	public function maxExtras(): int{
		return 4;
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
		return TRUE;
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
		return count($this->children) < $this->maxExtras();
	}

	function getSummary(): string{
		$output = "Product: " . $this->getType() . " total price: " .money_format('%i', $this->getPrice()). "$<br/> ---Price: " . money_format('%i', $this->price) . "$<br/>";
		foreach ($this->children as $child){
			$output .= "---" . $child->getSummary();
		}
		return $output;
	}



}