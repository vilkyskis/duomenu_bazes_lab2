<?php

include 'libraries/drinks.class.php';
$drinksObj = new drinks();

if(!empty($id)) {

    $drinksObj->deleteDrink($id);

    // nukreipiame į automobilių puslapį
    header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
    die();
}

?>