<ul class="breadcrumb bg-dark" id="pagePath">
    <li class="breadcrumb-item"><a href="index.php">Pradžia</a></li>
    <li class="breadcrumb-item"><a href="index.php?module=<?php echo $module; ?>&action=list">Miestai</a></li>
    <li class="breadcrumb-item active"><?php if(!empty($id)) echo "Miesto redagavimas"; else echo "Naujas miestas"; ?></li>
    <li class="breadcrumb-item"><a href='index.php?module=<?php echo $module; ?>&action=create_more'>Nauji miestai</a></li>
</ul>
<div class="float-clear"></div>
<div id="formContainer" class="container">
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
            <legend>Miesto informacija</legend>
            <p>
                <label class="field" for="name">Pavadinimas<?php echo in_array('Pavadinimas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="name" name="Pavadinimas" class="textbox textbox-150" value="<?php echo isset($data['Pavadinimas']) ? $data['Pavadinimas'] : ''; ?>">
                <?php if(key_exists('Pavadinimas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['Pavadinimas']} simb.)</span>"; ?>
            </p>

        </fieldset>
        <p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
        <p align="center">
            <input type="submit" class="submit button btn btn-primary" name="submit" value="Išsaugoti">
        </p>
        <?php if(isset($data['id'])) { ?>
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
        <?php } ?>
    </form>
</div>