<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li>Gerimai</li>
</ul>
<div id="actions">
    <a href='index.php?module=<?php echo $module; ?>&action=create'>Naujas gerimas</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
    <div class="errorBox">
        Gerimas nebuvo pašalinta, nes yra įtrauktas į sutartį (-is).
    </div>
<?php } ?>
<table class="listTable">
    <tr>
        <th>Id</th>
        <th>Pavadinimas</th>
        <th>Kiekis</th>
        <th>Vieneto kaina</th>
        <th>Galiojimo data</th>
        <th>Pagaminimo data</th>
        <th>Pakuotė</th>
        <th></th>
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
            . "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_Gaivusis_gerimas']}\"); return false;' title=''>šalinti</a>&nbsp;"
            . "<a href='index.php?module={$module}&action=edit&id={$val['id']}' title=''>redaguoti</a>"
            . "</td>"
            . "</tr>";
    }
    ?>
</table>

<?php
// įtraukiame puslapių šabloną
include 'templates/paging.tpl.php';
?>