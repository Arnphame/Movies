<?php

// sukuriame automobilių klasės objektą
include 'libraries/movies.php';
$moviesObj = new movies();
// suskaičiuojame bendrą įrašų kiekį
$elementCount = $moviesObj->getMovieListCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);
// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio automobilius
$data = $moviesObj->getMovieList($paging->size, $paging->first);
// įtraukiame šabloną
include 'templates/movie_list.php';

?>