<ul class="breadcrumb bg-dark" id="pagePath">
    <li class="breadcrumb-item"><a href="index.php">Pradžia</a></li>
    <li class="breadcrumb-item"><a href="index.php?module=<?php echo $module; ?>&action=list">Gerimai</a></li>
    <li class="breadcrumb-item active"><?php if(!empty($id)) echo "Gėrimo redagavimas"; else echo "Nauja Gėrimas"; ?></li>
</ul>
<div class="float-clear"></div>
<div class="container text-center-left">
    <?php if($formErrors != null) { ?>
        <div class="errorBox">
            Neįvesti arba neteisingai įvesti šie laukai:
            <?php
            echo $formErrors;
            ?>
        </div>
    <?php } ?>
    <form action="" method="post">
        <fieldset>
            <legend>Gėrimo informacija</legend>
            <p>
                <?php echo in_array('Pavadinimas', $required) ? '<span> *</span>' : ''; ?>
                <input type="text" placeholder="Pavadinimas" id="name" name="Pavadinimas" class="textbox textbox-150" value="<?php echo isset($data['Pavadinimas']) ? $data['Pavadinimas'] : ''; ?>">
                <?php if(key_exists('Pavadinimas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Pavadinimas']} simb.)</span>"; ?>
            </p>
            <p>
                <?php echo in_array('Kiekis', $required) ? '<span> *</span>' : ''; ?>
                <input type="number" placeholder="Kiekis" id="Kiekis" name="Kiekis" class="textbox textbox-30" value="<?php echo isset($data['Kiekis']) ? $data['Kiekis'] : ''; ?>">
            </p>
            <p>
                <?php echo in_array('Vieneto_kaina', $required) ? '<span> *</span>' : ''; ?>
                <input type="text" id="Vieneto_kaina" placeholder="Vieneto kaina" name="Vieneto_kaina" class="textbox textbox-30" value="<?php echo isset($data['Vieneto_kaina']) ? $data['Vieneto_kaina'] : ''; ?>">
            </p>
            <p>
                <?php echo in_array('Galiojimo_data', $required) ? '<span> *</span>' : ''; ?>
                <input type="text" id="Galiojimo_data" placeholder="Galiojimo data" name="Galiojimo_data" class="textbox textbox-70 date" value="<?php echo isset($data['Galiojimo_data']) ? $data['Galiojimo_data'] : ''; ?>">
            </p>
            <p>
                <?php echo in_array('Pagaminimo_data', $required) ? '<span> *</span>' : ''; ?>
                <input type="text" id="Pagaminimo_data" placeholder="Pagaminimo data" name="Pagaminimo_data" class="textbox textbox-70 date" value="<?php echo isset($data['Pagaminimo_data']) ? $data['Pagaminimo_data'] : ''; ?>">
            </p>

            <p>
                <?php echo in_array('Pakuote', $required) ? '<span> *</span>' : ''; ?>
                <select id="Pakuote" name="Pakuote">
                    <option value="-1">----Pakuote-----</option>
                    <?php
                    // išrenkame visas kategorijas sugeneruoti pasirinkimų lauką
                    $type = $drinksObj->getDrinkTypeList();
                    foreach($type as $key => $val) {
                        $selected = "";
                        if(isset($data['Pakuote']) && $data['Pakuote'] == $val['id_Pakuote']) {
                            $selected = " selected='selected'";
                        }
                        echo "<option{$selected} value='{$val['id_Pakuote']}'>{$val['name']}</option>";
                    }
                    ?>
                </select>
            </p>
        </fieldset>
        <p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
        <p>
            <input type="submit" class="submit button" name="submit" value="Išsaugoti">
        </p>
        <?php if(isset($data['id_Gaivusis_gerimas'])) { ?>
            <input type="hidden" name="id_Gaivusis_gerimas" value="<?php echo $data['id_Gaivusis_gerimas']; ?>" />
        <?php } ?>
    </form>
</div>