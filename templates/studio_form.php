<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li><a href="index.php?module=<?php echo $module; ?>&action=list">Studijos</a></li>
    <li><?php if(!empty($id)) echo "Studijos redagavimas"; else echo "Nauja studija"; ?></li>
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
            <legend>Studijos informacija</legend>
            <p>
                <label class="field" for="Name">Pavadinimas<?php echo in_array('Name', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Name" name="Name" class="textbox textbox-70" value="<?php echo isset($data['Name']) ? $data['Name'] : ''; ?>">
            </p>
            <p>
                <label class="field" for="Country"> Šalis<?php echo in_array('Country', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Country" name="Country" class="textbox textbox-70" value="<?php echo isset($data['Country']) ? $data['Country'] : ''; ?>">
            </p>
            <p>
                <label class="field" for="Founder">Įkūrėjas<?php echo in_array('Founder', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Founder" name="Founder" class="textbox textbox-70" value="<?php echo isset($data['Founder']) ? $data['Founder'] : ''; ?>">
            </p>
            <p>
                <label class="field" for="Year"> Įkūrimo metai<?php echo in_array('Year', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Year" name="Year" class="textbox textbox-70" value="<?php echo isset($data['Year']) ? $data['Year'] : ''; ?>">
            </p>
            <p>
                <label class="field" for="Revenue"> Pelnas<?php echo in_array('Revenue', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Revenue" name="Revenue" class="textbox textbox-70" value="<?php echo isset($data['Revenue']) ? $data['Revenue'] : ''; ?>">
            </p>
        </fieldset>
        <p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
        <p>
            <input type="submit" class="submit button" name="submit" value="Išsaugoti">
        </p>
        <?php if(isset($data['id_Studio'])) { ?>
            <input type="hidden" name="id_Studio" value="<?php echo $data['id_Studio']; ?>" />
        <?php } ?>
    </form>
</div>