<?php

include 'libraries/people.php';
$peopleObj = new people();

if(!empty($id)) {
    $removeErrorParameter = '';
    $peopleObj->deletePerson($id);
    // nukreipiame į automobilių puslapį
    header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
    die();
}

?>