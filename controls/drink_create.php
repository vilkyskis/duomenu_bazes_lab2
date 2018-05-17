<?php

include 'libraries/drinks.class.php';
$drinksObj = new drinks();
include 'libraries/drink_data.class.php';
$drinkTypeObj = new drinkData();

$formErrors = null;
$data = array();

// nustatome privalomus laukus
$required = array('Pavadinimas', 'Kiekis', 'Vieneto_kaina','Galiojimo_data','Pagaminimo_data',
    'Pakuote','fk_maistingumasid_Maistingumas','fk_Cekisnr','fk_saskaitos_fakturanr');

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
        'Pakuote'  => 'positivenumber',
        'fk_maistingumasid_Maistingumas' => 'positivenumber',
        'fk_Cekisnr' => 'positivenumber',
        'fk_saskaitos_fakturanr' => 'positivenumber');

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