<?php

include 'libraries/movies.php';
$moviesObj = new movies();

if(!empty($id)) {
    $removeErrorParameter = '';
    $moviesObj->deleteMovie($id);
    // nukreipiame į automobilių puslapį
    header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
    die();
}

?>