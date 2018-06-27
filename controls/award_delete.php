<?php

include 'libraries/awards.php';
$awardsObj = new awards();

if(!empty($id)) {
    $removeErrorParameter = '';
    $awardsObj->deleteAward($id);
    // nukreipiame į automobilių puslapį
    header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
    die();
}

?>