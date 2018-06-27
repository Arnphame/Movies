<?php

// sukuriame automobilių klasės objektą
include 'libraries/studios.php';
$studiosObj = new studios();
// suskaičiuojame bendrą įrašų kiekį
$elementCount = $studiosObj->getStudioListCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);
// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio automobilius
$data = $studiosObj->getStudioList($paging->size, $paging->first);
// įtraukiame šabloną
include 'templates/studio_list.php';

?>