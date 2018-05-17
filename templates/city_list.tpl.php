<ul class="breadcrumb" id="pagePath">
    <li class="breadcrumb-item"><a href="index.php">Pradžia</a></li>
    <li class="breadcrumb-item active">Miestai</li>
</ul>

<div class="float-clear"></div>

<?php if(isset($_GET['remove_error'])) { ?>
    <div class="errorBox">
        Miestas nebuvo pašalintas, nes yra įtrauktas į sutartį (-is).
    </div>
<?php } ?>
<div id="actions" align="center" class="container">
    <a class="btn btn-primary" href='index.php?module=<?php echo $module; ?>&action=create'>Naujas miestas</a>
    <a class="btn btn-primary" href='index.php?module=<?php echo $module; ?>&action=create_more'>Nauji miestai</a>
</div>
<div class="container">
    <table class="table table-bordered table-striped text-center">
        <tr class="bg-secondary text-white">
            <th>Id</th>
            <th>Pavadinimas</th>
            <th>veiksmai</th>
        </tr>
        <?php
        // suformuojame lentelę
        foreach($data as $key => $val) {
            echo
                "<tr>"
                . "<td>{$val['id']}</td>"
                . "<td>{$val['Pavadinimas']}</td>"
                . "<td>"
                . "<a class='btn btn-danger' href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id']}\"); return false;' title=''>šalinti</a>&nbsp;"
                . "<a class='btn btn-warning' href='index.php?module={$module}&action=edit&id={$val['id']}' title=''>redaguoti</a>"
                . "</td>"
                . "</tr>";
        }
        ?>
    </table>

</div>
<?php
// įtraukiame puslapių šabloną
include 'templates/paging.tpl.php';
?>

