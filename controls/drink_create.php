<?php

include 'libraries/drinks.class.php';
$drinksObj = new drinks();

$formErrors = null;
$data = array();

// nustatome privalomus laukus
$required = array('Pavadinimas', 'Kiekis', 'Vieneto_kaina','Galiojimo_data','Pagaminimo_data',
    'Pakuote');

// maksimalūs leidžiami laukų ilgiai
$maxLengths = array (
    'Pavadinimas' => 20
);

// paspaustas išsaugojimo mygtukas
if(!empty($_POST['submit'])) {
    // nustatome laukų validatorių tipus
    $validations = array (
        'Pavadinimas' => 'anything',
        'Kiekis' => 'positivenumber',
        'Vieneto_kaina' => 'positivenumber',
        'Galiojimo_data' => 'date',
        'Pagaminimo_data' => 'date',
        'Pakuote'  => 'positivenumber'
);

    // sukuriame validatoriaus objektą
    include 'utils/validator.class.php';
    $validator = new validator($validations, $required, $maxLengths);

    if($validator->validate($_POST)) {
        // suformuojame laukų reikšmių masyvą SQL užklausai
        $dataPrepared = $validator->preparePostFieldsForSQL();

        // įrašome naują įrašą
        $drinksObj->insertDrink($dataPrepared);

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