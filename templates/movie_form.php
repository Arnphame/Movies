<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li><a href="index.php?module=<?php echo $module; ?>&action=list">Filmai</a></li>
    <li><?php if(!empty($id)) echo "Filmo redagavimas"; else echo "Naujas filmas"; ?></li>
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
            <legend>Filmo informacija</legend>
            <p>
                <label class="field" for="Genre">Žanrai<?php echo in_array('Genre', $required) ? '<span> *</span>' : ''; ?></label>
                <select id="Genre" name="Genre">
                    <option value="-1">---------------</option>
                    <?php
                    // išrenkame visas kategorijas sugeneruoti pasirinkimų lauką
                     $genres = $moviesObj->getGenresList();
                    foreach($genres as $key => $val) {
                        $selected = "";
                        if(isset($data['Genre']) && $data['Genre'] == $val['id_Movie_genres']) {
                            $selected = " selected='selected'";
                        }
                        echo "<option{$selected} value='{$val['id_Movie_genres']}'>{$val['name']}</option>";
                    }
                    ?>
                </select>
            </p>
            <p>
                <label class="field" for="studio">Studija<?php echo in_array('studio', $required) ? '<span> *</span>' : ''; ?></label>
                <select id="studio" name="studio">
                    <option value="-1">---------------</option>
                    <?php
                    // išrenkame visas kategorijas sugeneruoti pasirinkimų lauką
                    $studios = $moviesObj->getStudiosList();
                    foreach($studios as $key => $val) {
                        $selected = "";
                        if(isset($data['studio']) && $data['studio'] == $val['id_Studio']) {
                            $selected = " selected='selected'";
                        }
                        echo "<option{$selected} value='{$val['id_Studio']}'>{$val['Name']}</option>";
                    }
                    ?>
                </select>
            </p>
            <p>
                <label class="field" for="Name">Pavadinimas<?php echo in_array('Name', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Name" name="Name" class="textbox textbox-70" value="<?php echo isset($data['Name']) ? $data['Name'] : ''; ?>">
            </p>
            <p>
                <label class="field" for="Year"> Metai<?php echo in_array('Year', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Year" name="Year" class="textbox textbox-70" value="<?php echo isset($data['Year']) ? $data['Year'] : ''; ?>">
            </p>
            <p>
                <label class="field" for="Runtime"> Trukmė<?php echo in_array('Runtime', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Runtime" name="Runtime" class="textbox textbox-70" value="<?php echo isset($data['Runtime']) ? $data['Runtime'] : ''; ?>">
            </p>
            <p>
                <label class="field" for="Box_Office"> Biudžetas<?php echo in_array('Box_Office', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Box_Office" name="Box_Office" class="textbox textbox-70" value="<?php echo isset($data['Box_Office']) ? $data['Box_Office'] : ''; ?>">
            </p>

            <p>
                <label class="field" for="Is_Released">Ar išleistas?</label>
                <input type="checkbox" id="Is_Released" name="Is_Released"<?php echo (isset($data['Is_Released']) && ($data['Is_Released'] == 1 || $data['Is_Released'] == 'on'))  ? ' checked="checked"' : ''; ?>>
            </p>
        </fieldset>
        <p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
        <p>
            <input type="submit" class="submit button" name="submit" value="Išsaugoti">
        </p>
        <?php if(isset($data['id_Movie'])) { ?>
            <input type="hidden" name="id_Movie" value="<?php echo $data['id_Movie']; ?>" />
        <?php } ?>
    </form>
</div>