<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li><a href="index.php?module=<?php echo $module; ?>&action=list">Apdovanojimai</a></li>
    <li><?php if(!empty($id)) echo "Apdovanojimo redagavimas"; else echo "Naujas apdovanojimas"; ?></li>
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
            <legend>Apdovanojimo informacija</legend>
            <p>
                <label class="field" for="Name">Pavadinimas<?php echo in_array('Name', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Name" name="Name" class="textbox textbox-70" value="<?php echo isset($data['Name']) ? $data['Name'] : ''; ?>">
            </p>
            <p>
                <label class="field" for="Year"> Metai<?php echo in_array('Year', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Year" name="Year" class="textbox textbox-70" value="<?php echo isset($data['Year']) ? $data['Year'] : ''; ?>">
            </p>
            <p>
                <label class="field" for="Country"> Šalis<?php echo in_array('Country', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Country" name="Country" class="textbox textbox-70" value="<?php echo isset($data['Country']) ? $data['Country'] : ''; ?>">
            </p>
            <p>
                <label class="field" for="Type">Tipas<?php echo in_array('Type', $required) ? '<span> *</span>' : ''; ?></label>
                <select id="Type" name="Type">
                    <option value="-1">---------------</option>
                    <?php
                    // išrenkame visas kategorijas sugeneruoti pasirinkimų lauką
                    $awardTypes = $awardsObj->getAwardTypesList();
                    foreach($awardTypes as $key => $val) {
                        $selected = "";
                        if(isset($data['Type']) && $data['Type'] == $val['id_Award_types']) {
                            $selected = " selected='selected'";
                        }
                        echo "<option{$selected} value='{$val['id_Award_types']}'>{$val['name']}</option>";
                    }
                    ?>
                </select>
            </p>
            <p>
                <label class="field" for="movie">Filmas<?php echo in_array('movie', $required) ? '<span> *</span>' : ''; ?></label>
                <select id="movie" name="movie">
                    <option value="-1">---------------</option>
                    <?php
                    // išrenkame visas kategorijas sugeneruoti pasirinkimų lauką
                    $movies = $awardsObj->getMoviesList();
                    foreach($movies as $key => $val) {
                        $selected = "";
                        if(isset($data['movie']) && $data['movie'] == $val['id_Movie']) {
                            $selected = " selected='selected'";
                        }
                        echo "<option{$selected} value='{$val['id_Movie']}'>{$val['Name']}</option>";
                    }
                    ?>
                </select>
            </p>
        </fieldset>
        <p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
        <p>
            <input type="submit" class="submit button" name="submit" value="Išsaugoti">
        </p>
        <?php if(isset($data['id_Award'])) { ?>
            <input type="hidden" name="id_Award" value="<?php echo $data['id_Award']; ?>" />
        <?php } ?>
    </form>
</div>