<?php

include 'libraries/city.class.php';
$cityObj = new city();

$formErrors = null;
$data = array();

// nustatome privalomus laukus
$required = array('Pavadinimas');

// maksimalūs leidžiami laukų ilgiai
$maxLengths = array (
    'Pavadinimas' => 20
);

// paspaustas išsaugojimo mygtukas
if(!empty($_POST['submit'])) {
    // nustatome laukų validatorių tipus
    $validations = array (
        'Pavadinimas' => 'anything');

    // sukuriame validatoriaus objektą
    include 'utils/validator.class.php';
    $validator = new validator($validations, $required, $maxLengths);
        if($validator->validate($_POST)) {
            // suformuojame laukų reikšmių masyvą SQL užklausai
            $dataPrepared = $validator->preparePostFieldsForSQL();

            $cityObj->insertMultipleCities($dataPrepared);
            // nukreipiame į markių puslapį
            header("Location: index.php?module={$module}&action=list");
            die();
        }else {
            // gauname klaidų pranešimą
            $formErrors = $validator->getErrorHTML();
            // gauname įvestus laukus
            if(isset($_POST['kiekiai']) && sizeof($_POST['kiekiai']) > 0) {
                $i = 0;
                foreach($_POST['kiekiai'] as $key => $val) {
                    $data['uzsakytos_paslaugos'][$i]['kiekis'] = $val;
                    $i++;
                }
            }
            $data = $_POST;
        }

}

// įtraukiame šabloną
include 'templates/city_form_more.tpl.php';

?>