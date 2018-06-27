<?php

include 'libraries/studios.php';
$studiosObj = new studios();
$formErrors = null;
$fields = array();
$formSubmitted = false;

$data = array();
if(empty($_POST['submit'])) {

    // rodome ataskaitos parametrų įvedimo formą
    include 'templates/studio_report_form.php';
} else {
    $formSubmitted = true;

    // nustatome laukų validatorių tipus
    $validations = array ();

    // sukuriame validatoriaus objektą
    include 'utils/validator.class.php';
    $validator = new validator($validations);


    if($validator->validate($_POST)) {
        // suformuojame laukų reikšmių masyvą SQL užklausai
        $data = $validator->preparePostFieldsForSQL();

        // išrenkame ataskaitos duomenis
        $studiosData = $studiosObj->getStudiosReport($data['dataNuo'], $data['dataIki']);
        $studiosStats = $studiosObj->getStatsOfStudiosReport($data['dataNuo'], $data['dataIki']);

        // rodome ataskaitą
        include 'templates/studio_report_show.php';
    } else {
        // gauname klaidų pranešimą
        $formErrors = $validator->getErrorHTML();
        // gauname įvestus laukus
        $fields = $_POST;

        // rodome ataskaitos parametrų įvedimo formą su klaidomis ir sustabdome scenarijaus vykdym1
        include 'templates/studio_report_form.php';
    }
}

