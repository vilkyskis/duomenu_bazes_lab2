<?php

include 'libraries/drinks.class.php';
$drinksObj = new drinks();


$formErrors = null;
$data = array();

// nustatome privalomus laukus
$required = array('Pavadinimas', 'Kiekis', 'Vieneto_kaina', 'Galiojimo_data', 'Pagaminimo_data', 'Pakuote');

// maksimalūs leidžiami laukų ilgiai
$maxLengths = array (
);

// vartotojas paspaudė išsaugojimo mygtuką
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

    // sukuriame laukų validatoriaus objektą
    include 'utils/validator.class.php';
    $validator = new validator($validations, $required, $maxLengths);

    // laukai įvesti be klaidų
    if($validator->validate($_POST)) {
        // suformuojame laukų reikšmių masyvą SQL užklausai
        $dataPrepared = $validator->preparePostFieldsForSQL();


        // atnaujiname duomenis
        $drinksObj->updateDrink($dataPrepared,$id);

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
    // išrenkame elemento duomenis ir jais užpildome formos laukus.
    $data = $drinksObj->getDrink($id);
}

// įtraukiame šabloną
include 'templates/drink_form.tpl.php';

?>