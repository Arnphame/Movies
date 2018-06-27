<?php

// sukuriame automobilių klasės objektą
include 'libraries/people.php';
$peopleObj = new people();
// suskaičiuojame bendrą įrašų kiekį
$elementCount = $peopleObj->getPeopleCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);
// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio automobilius
$data = $peopleObj->getPeopleList($paging->size, $paging->first);
// įtraukiame šabloną
include 'templates/person_list.php';

?>