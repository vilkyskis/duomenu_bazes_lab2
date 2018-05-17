<?php

// sukuriame markių klasės objektą
include 'libraries/city.class.php';
$cityObj = new city();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $cityObj->getCityListCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio markes
$data = $cityObj->getCityList($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/city_list.tpl.php';

?>