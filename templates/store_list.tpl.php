<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li>Gerimai</li>
</ul>
<div id="actions">
    <a href='index.php?module=<?php echo $module; ?>&action=create'>Nauja parduotuvė</a>
</div>
<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
    <div class="errorBox">
        Parduotuvė nebuvo pašalinta, nes yra įtrauktas į sutartį (-is).
    </div>
<?php } ?>
<table class="listTable">
    <tr>
        <th>Kodas</th>
        <th>Pavadinimas</th>
        <th>adresas</th>
        <th>internetine svetaine</th>
        <th>telefonas</th>
        <th>el pastas</th>
        <th>miestas</th>
        <th>veiksmai</th>
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
            . "<td>{$val['telefonas']}</td>"
            . "<td>{$val['el_pastas']}</td>"
            .  "<td>{$val['miestopavadinimas']}</td>"
            . "<td>"
            . "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['kodas']}\"); return false;' title=''>šalinti</a>&nbsp;"
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