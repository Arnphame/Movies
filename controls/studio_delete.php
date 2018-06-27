<?php

include 'libraries/studios.php';
$studiosObj = new studios();

if(!empty($id)) {
    $removeErrorParameter = '';
    $studiosObj->deleteStudio($id);
    header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
    die();
}

?>