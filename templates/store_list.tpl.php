<ul class="breadcrumb bg-dark" id="pagePath">
    <li class="breadcrumb-item"><a href="index.php">Pradžia</a></li>
    <li class="breadcrumb-item active">Parduotuvės</li>
    <li class="breadcrumb-item"><a href='index.php?module=<?php echo $module; ?>&action=create'>Nauja parduotuvė</a></li>
    <li class="breadcrumb-item"><a href='index.php?module=<?php echo $module; ?>&action=create_more'>Naujos parduotuvės</a></li>
</ul>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
    <div class="errorBox">
        Parduotuvė nebuvo pašalinta, nes yra įtrauktas į sutartį (-is).
    </div>
<?php } ?>
<table class="table table-bordered table-striped">
    <tr class="bg-secondary text-white">
        <th>Kodas</th>
        <th>Pavadinimas</th>
        <th>Adresas</th>
        <th>Internetine svetaine</th>
        <th>Miestas</th>
        <th>Veiksmai</th>
    </tr>
    <?php
    // suformuojame lentelę
    foreach($data as $key => $val) {
        echo
            "<tr>"
            . "<td>{$val['kodas']}</td>"
            . "<td>{$val['Pavadinimas']}</td>"
            . "<td>{$val['Adresas']}</td>"
            . "<td>{$val['internetine_svetaine']}</td>"
            .  "<td>{$val['miestopavadinimas']}</td>"
            . "<td>"
            . "<a class='btn btn-danger' href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['kodas']}\"); return false;' title=''>šalinti</a>&nbsp;"
            . "<a class='btn btn-warning' href='index.php?module={$module}&action=edit&id={$val['kodas']}' title=''>redaguoti</a>"
            . "</td>"
            . "</tr>";
    }
    ?>
</table>

<?php
// įtraukiame puslapių šabloną
include 'templates/paging.tpl.php';
?>
