<?php

include 'libraries/awards.php';
$awardsObj = new awards();


$formErrors = null;
$data = array();

// nustatome privalomus laukus
$required = array('Name');

$maxLengths = '';

// vartotojas paspaudė išsaugojimo mygtuką
if(!empty($_POST['submit'])) {
    // nustatome laukų validatorių tipus
    $validations = array (
        'Name' => 'alfanum',
        'Year' => 'positivenumber',
        'Country' => 'alfanum',
        'Type' => 'positivenumber',
        'fk_Movieid_Movie' => 'positivenumber'
    );

    // sukuriame laukų validatoriaus objektą
    include 'utils/validator.class.php';
    $validator = new validator($validations, $required, $maxLengths);

    // laukai įvesti be klaidų
    if($validator->validate($_POST)) {
        // suformuojame laukų reikšmių masyvą SQL užklausai
        $dataPrepared = $validator->preparePostFieldsForSQL();

        $awardsObj->updateAward($dataPrepared);

        // nukreipiame vartotoją į automobilių puslapį
        header("Location: index.php?module={$module}&action=list");
        die();
    } else {
        // gauname klaidų pranešimą
        $formErrors = $validator->getErrorHTML();
        // laukų reikšmių kintamajam priskiriame įvestų laukų reikšmes
        $data = $_POST;
    }
} else {
    // tikriname, ar nurodytas elemento id. Jeigu taip, išrenkame elemento duomenis ir jais užpildome formos laukus.
        // išrenkame automobilį
        $data = $awardsObj->getAward($id);

}

// įtraukiame šabloną
include 'templates/award_form.php';

?>