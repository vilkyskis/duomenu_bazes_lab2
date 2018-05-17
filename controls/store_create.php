<?php

include 'libraries/store.class.php';
$storeObj = new store();

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
        'Adresas' => 'alphanumeric',
        'Pavadinimas' => 'words');

    // sukuriame validatoriaus objektą
    include 'utils/validator.class.php';
    $validator = new validator($validations, $required, $maxLengths);

    if($validator->validate($_POST)) {
        // suformuojame laukų reikšmių masyvą SQL užklausai
        $dataPrepared = $validator->preparePostFieldsForSQL();

        // įrašome naują įrašą
        $storeObj->insertStore($dataPrepared);

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
include 'templates/store_form.tpl.php';

?>