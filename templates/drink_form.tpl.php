<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li><a href="index.php?module=<?php echo $module; ?>&action=list">Gerimai</a></li>
    <li><?php if(!empty($id)) echo "Gėrimo redagavimas"; else echo "Nauja Gėrimas"; ?></li>
</ul>
<div class="float-clear"></div>
<div id="formContainer">
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
            <!--`Pavadinimas`,
            `Kiekis`,
            `Vieneto_kaina`,
            `Galiojimo_data`,
            `Pagaminimo_data`,
            `Pakuote`,
            `fk_Maistingumasid_Maistingumas`,
            `fk_Cekisnr`,
            `fk_saskaitos_fakturanr`-->
            <legend>Gėrimo informacija</legend>
            <p>
                <label class="field" for="name">Pavadinimas<?php echo in_array('Pavadinimas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="name" name="Pavadinimas" class="textbox textbox-150" value="<?php echo isset($data['Pavadinimas']) ? $data['Pavadinimas'] : ''; ?>">
                <?php if(key_exists('Pavadinimas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Pavadinimas']} simb.)</span>"; ?>
            </p>
            <p>
                <label class="field" for="Kiekis">Kiekis<?php echo in_array('Kiekis', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="number" id="Kiekis" name="Kiekis" class="textbox textbox-30" value="<?php echo isset($data['Kiekis']) ? $data['Kiekis'] : ''; ?>">
            </p>
            <p>
                <label class="field" for="Vieneto_kaina">Vieneto kaina<?php echo in_array('Vieneto_kaina', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Vieneto_kaina" name="Vieneto_kaina" class="textbox textbox-30" value="<?php echo isset($data['Vieneto_kaina']) ? $data['Vieneto_kaina'] : ''; ?>">
            </p>
            <p>
                <label class="field" for="Galiojimo_data">Pagaminimo data<?php echo in_array('Galiojimo_data', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Galiojimo_data" name="Galiojimo_data" class="textbox textbox-70 date" value="<?php echo isset($data['Galiojimo_data']) ? $data['Galiojimo_data'] : ''; ?>">
            </p>
            <p>
                <label class="field" for="Pagaminimo_data">Galiojimo data<?php echo in_array('Pagaminimo_data', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Pagaminimo_data" name="Pagaminimo_data" class="textbox textbox-70 date" value="<?php echo isset($data['Pagaminimo_data']) ? $data['Pagaminimo_data'] : ''; ?>">
            </p>

            <p>
                <label class="field" for="Pakuote">Pakuote<?php echo in_array('Pakuote', $required) ? '<span> *</span>' : ''; ?></label>
                <select id="Pakuote" name="Pakuote">
                    <option value="-1">---------------</option>
                    <?php
                    // išrenkame visas kategorijas sugeneruoti pasirinkimų lauką
                    $type = $drinksObj->getDrinkTypeList();
                    foreach($type as $key => $val) {
                        $selected = "";
                        if(isset($data['name']) && $data['name'] == $val['id_Pakuote']) {
                            $selected = " selected='selected'";
                        }
                        echo "<option{$selected} value='{$val['id_Pakuote']}'>{$val['name']}</option>";
                    }
                    ?>
                </select>
            </p>

            <p>
                <label class="field" for="fk_Maistingumasid_Maistingumas">fk_Maistingumas<?php echo in_array('fk_Maistingumasid_Maistingumas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="fk_Maistingumasid_Maistingumas" name="fk_Maistingumasid_Maistingumas" class="textbox textbox-30" value="<?php echo isset($data['fk_Maistingumasid_Maistingumas']) ? $data['fk_Maistingumasid_Maistingumas'] : ''; ?>">
            </p>
            <p>
                <label class="field" for="fk_Cekisnr">Cekio nr<?php echo in_array('fk_Cekisnr', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="fk_Cekisnr" name="fk_Cekisnr" class="textbox textbox-30" value="<?php echo isset($data['fk_Cekisnr']) ? $data['fk_Cekisnr'] : ''; ?>">
            </p>
            <p>
                <label class="field" for="fk_saskaitos_fakturanr">Sask nr<?php echo in_array('fk_saskaitos_fakturanr', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="fk_saskaitos_fakturanr" name="fk_saskaitos_fakturanr" class="textbox textbox-30" value="<?php echo isset($data['fk_saskaitos_fakturanr']) ? $data['fk_saskaitos_fakturanr'] : ''; ?>">
            </p>
            

        </fieldset>
        <p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
        <p>
            <input type="submit" class="submit button" name="submit" value="Išsaugoti">
        </p>
        <?php if(isset($data['id'])) { ?>
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
        <?php } ?>
    </form>
</div>