<?php

include 'libraries/people.php';
$peopleObj = new people();


$formErrors = null;
$data = array();

// nustatome privalomus laukus
$required = array('Name', 'Surname', 'Personal_No', 'nationality');

$maxLengths = array (
    'Personal_No' => 10
);

// vartotojas paspaudė išsaugojimo mygtuką
if(!empty($_POST['submit'])) {
    // nustatome laukų validatorių tipus
    $validations = array(
        'Name' => 'alfanum',
        'Surname' => 'alfanum',
        'Personal_No' => 'positivenumber',
        'Salary' => 'positivenumber',
        'Sex' => 'alfanum',
        'Age' => 'positivenumber',
        'Experience' => 'positivenumber',
        'nationality' => 'alfanum',
        'profesijos' => 'positivenumber'
    );

    // sukuriame laukų validatoriaus objektą
    include 'utils/validator.class.php';
    $validator = new validator($validations, $required, $maxLengths);

    // laukai įvesti be klaidų
    if ($validator->validate($_POST)) {
        // suformuojame laukų reikšmių masyvą SQL užklausai
        $dataPrepared = $validator->preparePostFieldsForSQL();

        $tmp = $peopleObj->getPerson($dataPrepared['Personal_No']);

        if (isset($tmp['Personal_No'])) {
            // sudarome klaidų pranešimą
            $formErrors = "Žmogus su įvestu asmens kodu egzistuoja";
            // laukų reikšmių kintamajam priskiriame įvestų laukų reikšmes
            $data = $_POST;
            // įrašome naują įrašą
        } else {
            $peopleObj->insertPerson($dataPrepared);

            $peopleObj->updateProfessions($dataPrepared);
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
            $data = $peopleObj->getPerson($id);
        }
    }
}
// įtraukiame šabloną
include 'templates/person_form.php';

?>