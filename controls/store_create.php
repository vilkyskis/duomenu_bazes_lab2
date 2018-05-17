<?php

include 'libraries/store.class.php';
$storesObj = new store();
include 'libraries/city.class.php';
$cityObj = new city();

$formErrors = null;
$data = array();

// nustatome privalomus laukus
$required = array('Adresas', 'Pavadinimas');

// maksimalūs leidžiami laukų ilgiai
$maxLengths = array (
    'Pavadinimas' => 20,
    'Adresas' => 30
);

// paspaustas išsaugojimo mygtukas
if(!empty($_POST['submit'])) {
    // nustatome laukų validatorių tipus
    $validations = array (
        'Adresas' => 'anything',
        'Pavadinimas' => 'anything');

    // sukuriame validatoriaus objektą
    include 'utils/validator.class.php';
    $validator = new validator($validations, $required, $maxLengths);

    if($validator->validate($_POST)) {
        // suformuojame laukų reikšmių masyvą SQL užklausai
        $dataPrepared = $validator->preparePostFieldsForSQL();

        // įrašome naują įrašą
        $storesObj->insertStore($dataPrepared);

        // nukreipiame į markių puslapį
        header("Location: index.php?module={$module}&action=list");
        die();
    } else {
        // gauname klaidų pranešimą
        $formErrors = $validator->getErrorHTML();
        // gauname įvestus laukus
        $data = $_POST;
    }
}

// įtraukiame šabloną
include 'templates/drink_form.tpl.php';

?>