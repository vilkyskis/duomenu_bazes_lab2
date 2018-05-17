<?php

// sukuriame markių klasės objektą
include 'libraries/drinks.class.php';
$drinksObj = new drinks();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $drinksObj->getDrinkListCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio markes
$data = $drinksObj->getDrinkList($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/drink_list.tpl.php';

?>