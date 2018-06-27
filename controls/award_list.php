<?php

// sukuriame automobilių klasės objektą
include 'libraries/awards.php';
$awardsObj = new awards();
// suskaičiuojame bendrą įrašų kiekį
$elementCount = $awardsObj->getAwardListCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);
// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio automobilius
$data = $awardsObj->getAwardsList($paging->size, $paging->first);
// įtraukiame šabloną
include 'templates/award_list.php';

?>