<?php

include 'libraries/city.class.php';
$cityObj = new city();

if(!empty($id)) {

    $cityObj->deleteCity($id);

    // nukreipiame į automobilių puslapį
    header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
    die();
}

?>