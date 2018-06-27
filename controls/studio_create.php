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

        $tmp = $studiosObj->getStudio($dataPrepared['id_Studio']);

        if (isset($tmp['id_Studio'])) {
            // sudarome klaidų pranešimą
            $formErrors = "Studija su įvestu ID egzistuoja";
            // laukų reikšmių kintamajam priskiriame įvestų laukų reikšmes
            $data = $_POST;
            // įrašome naują įrašą
        } else {
            $studiosObj->insertStudio($dataPrepared);
        }
        // nukreipiame vartotoją į automobilių puslapį
        if ($formErrors == null) {
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
        if (!empty($id)) {
            // išrenkame automobilį
            $data = $studiosObj->getStudio($id);
        }
    }
}
// įtraukiame šabloną
include 'templates/studio_form.php';

?>