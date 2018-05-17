<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li><a href="index.php?module=<?php echo $module; ?>&action=list">Miestai</a></li>
    <li><?php if(!empty($id)) echo "Miesto redagavimas"; else echo "Nauji miestai"; ?></li>
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
        <!--TODO ISIAISKINTI VEIKIMO PRINCIPA-->
        <fieldset>
            <legend>Miestai</legend>
            <div class="childRowContainer">

                <div class="float-clear"></div>
                        <div class="childRow">
                                <label class="field" for="name"><?php echo in_array('Pavadinimas', $required) ? '<span> *</span>' : ''; ?>Pavadinimas <?php if(key_exists('Pavadinimas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Pavadinimas']} simb.)</span>"; ?></label>
                                <input type="text" id="name" name="Pavadinimas[]" class="textbox textbox-150" value="<?php echo isset($data['Pavadinimas']) ? $data['Pavadinimas'] : ''; ?>">

                            <a href="#" title="" class="removeChild">šalinti</a>
                        </div>
                        <div class="float-clear"></div>
            </div>
            <p id="newItemButtonContainer">
                <a href="#" title="" class="addChild">Pridėti</a>
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