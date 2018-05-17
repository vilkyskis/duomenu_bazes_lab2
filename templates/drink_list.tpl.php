<ul class="breadcrumb" id="pagePath">
    <li class="breadcrumb-item"><a href="index.php">Pradžia</a></li>
    <li class="breadcrumb-item active">Gerimai</li>
</ul>

<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
    <div class="errorBox">
        Gerimas nebuvo pašalinta, nes yra įtrauktas į sutartį (-is).
    </div>
<?php } ?>
<table class="table table-bordered table-striped">
    <tr class="bg-secondary text-white">
        <th>Id</th>
        <th>Pavadinimas</th>
        <th>Kiekis</th>
        <th>Vieneto kaina</th>
        <th>Galiojimo data</th>
        <th>Pagaminimo data</th>
        <th>Pakuotė </th>
        <th><div id="actions">
                <a class="btn btn-light text-black" href='index.php?module=<?php echo $module; ?>&action=create'>Naujas gerimas</a>
            </div>
        </th>
    </tr>
    <?php
    // suformuojame lentelę
    foreach($data as $key => $val) {
        echo
            "<tr>"
            . "<td>{$val['id_Gaivusis_gerimas']}</td>"
            . "<td>{$val['Pavadinimas']}</td>"
            . "<td>{$val['Kiekis']}</td>"
            . "<td>{$val['Vieneto_kaina']}</td>"
            . "<td>{$val['Pagaminimo_data']}</td>"
            . "<td>{$val['Galiojimo_data']}</td>"
            .  "<td>{$val['name']}</td>"
            . "<td>"
            . "<a class='btn btn-danger' href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_Gaivusis_gerimas']}\"); return false;' title=''>šalinti</a>&nbsp;"
            . "<a class='btn btn-warning' href='index.php?module={$module}&action=edit&id={$val['id_Gaivusis_gerimas']}' title=''>redaguoti</a>"
            . "</td>"
            . "</tr>";
    }
    ?>
</table>

<?php
// įtraukiame puslapių šabloną
include 'templates/paging.tpl.php';
?>