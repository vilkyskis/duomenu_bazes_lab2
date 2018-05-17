<ul class="breadcrumb bg-dark" id="pagePath">
    <li class="breadcrumb-item"><a href="index.php">Pradžia</a></li>
    <li class="breadcrumb-item"><a href="index.php?module=<?php echo $module; ?>&action=list">Parduotuvės</a></li>
    <li class="breadcrumb-item"><a href='index.php?module=<?php echo $module; ?>&action=create'>Nauja parduotuvė</a></li>
    <li class="breadcrumb-item active"><?php if(!empty($id)) echo "Parduotuvės redagavimas"; else echo "Naujos parduotuvės"; ?></li>
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
    <div class="container bg-dark text-white">
        <form action="" method="post">
            <p>
                <legend>Miestas</legend>
                <label class="field" for="Miestas">Miestas:<?php echo in_array('Miestas', $required) ? '<span> *</span>' : ''; ?></label>
                <select id="Miestas" name="Miestas">
                    <option value="-1">---------------</option>
                    <?php
                    // išrenkame visas kategorijas sugeneruoti pasirinkimų lauką
                    $type = $storeObj->getCityList();
                    foreach($type as $key => $val) {
                        var_dump($val);
                        $selected = "";
                        if(isset($data['fk_Miestasid_Miestas']) && $data['fk_Miestasid_Miestas'] == $val['id']) {
                            $selected = " selected='selected'";
                        }
                        echo "<option{$selected} value='{$val['id']}'>{$val['Pavadinimas']}</option>";
                    }
                    ?>
                </select>
            </p>
            <fieldset>

                <div class="childRowContainer bg-secondary">
                    <legend>Parduotuvės</legend>
                    <div class="float-clear"></div>
                    <div class="childRow">

                        <p>
                            <label class="field" for="name"><?php echo in_array('Pavadinimas', $required) ? '<span> *</span>' : ''; ?>Pavadinimas</label>
                            <input type="text" id="name" name="pard_Pavadinimas[]" class="textbox textbox-150" value="<?php echo isset($data['Pavadinimas']) ? $data['Pavadinimas'] : ''; ?>">
                            <?php if(key_exists('Pavadinimas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Pavadinimas']} simb.)</span>"; ?>
                        </p>
                        <p>
                            <label class="field" for="Adresas">Adresas<?php echo in_array('Adresas', $required) ? '<span> *</span>' : ''; ?></label>
                            <input type="text" id="Adresas" name="adresas[]" class="textbox textbox-30" value="<?php echo isset($data['Adresas']) ? $data['Adresas'] : ''; ?>">
                        </p>
                        <p>
                            <label class="field" for="internetine_svetaine">internetine svetaine<?php echo in_array('internetine_svetaine', $required) ? '<span> *</span>' : ''; ?></label>
                            <input type="text" id="internetine_svetaine" name="internetine_svetaine[]" class="textbox textbox-30" value="<?php echo isset($data['internetine_svetaine']) ? $data['internetine_svetaine'] : ''; ?>">
                        </p>
                        <p>
                            <label class="field" for="telefonas">telefonas<?php echo in_array('telefonas', $required) ? '<span> *</span>' : ''; ?></label>
                            <input type="text" id="telefonas" name="telefonas[]" class="textbox textbox-70" value="<?php echo isset($data['telefonas']) ? $data['telefonas'] : ''; ?>">
                        </p>
                        <p>
                            <label class="field" for="el_pastas">el pastas<?php echo in_array('el_pastas', $required) ? '<span> *</span>' : ''; ?></label>
                            <input type="text" id="el_pastas" name="el_pastas[]" class="textbox textbox-70" value="<?php echo isset($data['el_pastas']) ? $data['el_pastas'] : ''; ?>">
                        </p>
                            <a href="#" title="" class="removeChild btn-sm btn-danger">Šalinti</a>
                    </div>
                    <div class="float-clear"></div>
                </div>
                <p id="newItemButtonContainer" align="center">
                    <a href="#" title="" class="addChild btn-sm btn-primary">Pridėti</a>
                </p>
            </fieldset>

            <p class="required-note text-danger">* pažymėtus laukus užpildyti privaloma</p>
            <p class="text-center">
                <input type="submit" class="submit button btn btn-primary" name="submit" value="Išsaugoti">
            </p>
            <?php if(isset($data['id'])) { ?>
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
            <?php } ?>
        </form>
    </div>
</div>