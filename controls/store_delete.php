<?php

include 'libraries/drinks.class.php';
$storeObj = new store();

if(!empty($id)) {

    $storeObj->deleteStore($id);

    // nukreipiame į automobilių puslapį
    header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
    die();
}

?>