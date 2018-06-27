<?php

include 'libraries/movies.php';
$moviesObj = new movies();


$formErrors = null;
$data = array();

// nustatome privalomus laukus
$required = array('Name', 'Year', 'Is_Released', 'Runtime', 'Box_Office', 'Genre', 'studio');

$maxLengths = '';

// vartotojas paspaudė išsaugojimo mygtuką
if(!empty($_POST['submit'])) {
    // nustatome laukų validatorių tipus
    $validations = array (
        'Name' => 'alfanum',
        'Year' => 'positivenumber',
        'Is_Released' => 'positivenumber',
        'Runtime' => 'positivenumber',
        'Box_Office' => 'positivenumber',
        'Genre' => 'positivenumber',
        'studio' => 'positivenumber'
    );

    // sukuriame laukų validatoriaus objektą
    include 'utils/validator.class.php';
    $validator = new validator($validations, $required, $maxLengths);

    // laukai įvesti be klaidų
    if($validator->validate($_POST)) {
        // suformuojame laukų reikšmių masyvą SQL užklausai
        $dataPrepared = $validator->preparePostFieldsForSQL();

        if(isset($dataPrepared['Is_Released']) && $dataPrepared['Is_Released'] == 'on') {
            $dataPrepared['Is_Released'] = 1;
        } else {
            $dataPrepared['Is_Released'] = 0;
        }
        // įrašome naują įrašą
        $moviesObj->insertMovie($dataPrepared);

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
    if(!empty($id)) {
        // išrenkame automobilį
        $data = $moviesObj->getMovie($id);
    }
}

// įtraukiame šabloną
include 'templates/movie_form.php';

?>