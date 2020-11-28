<?php 


require_once("ElectronicItem.php");
require_once("Console.php");
require_once("Controller.php");
require_once("Microwave.php");
require_once("Television.php");
require_once("ElectronicItems.php");

$console = new Console(500);
$console->add(new Controller(20,true));
$console->add(new Controller(20,true));
$console->add(new Controller(20,false));
$console->add(new Controller(20,false));

$tv1 = new Television(650);
$tv1->add(new Controller(25,false));
$tv1->add(new Controller(25,false));

$tv2 = new Television(750.5);
$tv2->add(new Controller(25,true));
$tv2->add(new Controller(25,true));


$electronicItems = new ElectronicItems([$console, $tv1, $tv2]);
$sortedItems = $electronicItems->getSortedItems(ElectronicItems::SORTED_DESC);

echo "Q1:<br/>";
echo $sortedItems;
echo "Grand Total price: " . money_format('%i',  $electronicItems->getTotalPrice()) . " $<br/>";

echo "<br/><br/><br/>Q2:<br/> Console detailed price: <br/>";
// echo $electronicItems->getExtrasDetails($console);
echo $console->getSummary();



