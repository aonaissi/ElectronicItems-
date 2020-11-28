<?php 


class ElectronicItems
{
	private $items = array();

	//sort ascending by price
	const SORTED_ASC = 1; 

	//sort descending by price
	const SORTED_DESC = 2;

	public function __construct(array $items)
	{
		$this->items = $items;
	}

	/**
	* Returns the items depending on the sorting type requested
	*
	* @return array
	*/
	public function getSortedItems($type = self::SORTED_ASC)
	{
		$sorted = array();
		
		foreach ($this->items as $item)
		{
			$sorted[($item->getPrice() * 100)] = $item;
		}
		 (($type == self::SORTED_ASC) ?  ksort($sorted, SORT_NUMERIC) : krsort($sorted, SORT_NUMERIC));

		
		 return self::display($sorted);
		

	}
	/**
	*
	* @param string $type
	* @return array
	*/
	public function getItemsByType($type)
	{
		if (in_array($type, ElectronicItem::$types))
		{
			$callback = function($item) use ($type)
			{
				return $item->getType == $type;
			};
			$items = array_filter($this->items, $callback);
		}
		return false;
	}
	
	
	/**
	*
	* @return float total price of the items
	*/
	public function getTotalPrice()
	{
		$total = 0.0;
		foreach ($this->items as $item){
			$total += $item->getPrice();
		}
		return $total;
	
	}


	/**
	*
	* @param arrayL $array of items
	* @return string as a summary of the content of the array items
	*/
	public static function display($array): string{
		$output = "";
		foreach ($array as $item){
			$output .= $item->getSummary();
		}
		return $output ;
	}


	
}