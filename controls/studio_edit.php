<?php

include 'libraries/studios.php';
$studiosObj = new studios();

$formErrors = null;
$data = array();

// nustatome privalomus laukus
$required = array('Name');

$maxLengths = array (
);

// vartotojas paspaudė išsaugojimo mygtuką
if(!empty($_POST['submit'])) {
    // nustatome laukų validatorių tipus
    $validations = array(
        'Name' => 'alfanum',
        'Country' => 'alfanum',
        'Founder' => 'alfanum',
        'Year' => 'positivenumber',
        'Revenue' => 'positivenumber'
    );

    // sukuriame laukų validatoriaus objektą
    include 'utils/validator.class.php';
    $validator = new validator($validations, $required, $maxLengths);

    // laukai įvesti be klaidų
    if ($validator->validate($_POST)) {
        // suformuojame laukų reikšmių masyvą SQL užklausai
        $dataPrepared = $validator->preparePostFieldsForSQL();


        $studiosObj->updateStudio($dataPrepared);
        header("Location: index.php?module={$module}&action=list");
        die();
    }
}
else {
    $data = $studiosObj->getStudio($id);
}
// įtraukiame šabloną
include 'templates/studio_form.php';

?>