<?php

include 'libraries/movies.php';
$moviesObj = new movies();

$formErrors = null;
$fields = array();

$data = array();
if(empty($_POST['submit'])) {
    // rodome ataskaitos parametrų įvedimo formą
    include 'templates/movie_report_form.php';
} else {
    // nustatome laukų validatorių tipus
    $validations = array (
    );

    // sukuriame validatoriaus objektą
    include 'utils/validator.class.php';
    $validator = new validator($validations);

    if($validator->validate($_POST)) {
        // suformuojame laukų reikšmių masyvą SQL užklausai
        $data = $validator->preparePostFieldsForSQL();

        // išrenkame ataskaitos duomenis
        $moviesData = $moviesObj->getMoviesAwardsReport($data['dataNuo'], $data['dataIki']);
        $moviesSum = $moviesObj->getCountOfWins($data['dataNuo'], $data['dataIki']);
        //$totalPrice = $contractsObj->getSumPriceOfContracts($data['dataNuo'], $data['dataIki']);
        //$totalServicePrice = $contractsObj->getSumPriceOfOrderedServices($data['dataNuo'], $data['dataIki']);

        // rodome ataskaitą
        include 'templates/movie_report_show.php';
    } else {
        // gauname klaidų pranešimą
        $formErrors = $validator->getErrorHTML();
        // gauname įvestus laukus
        $fields = $_POST;

        // rodome ataskaitos parametrų įvedimo formą su klaidomis
        include 'templates/movie_report_form.php';
    }
}