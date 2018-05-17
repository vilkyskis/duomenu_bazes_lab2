<?php

// sukuriame markių klasės objektą
include 'libraries/store.class.php';
$storeObj = new store();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $storeObj->getStoreListCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio markes
$data = $storeObj->getStoreList($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/store_list.tpl.php';

?>