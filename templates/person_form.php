<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li><a href="index.php?module=<?php echo $module; ?>&action=list">Žmonės</a></li>
    <li><?php if(!empty($id)) echo "Žmogaus redagavimas"; else echo "Naujas žmogus"; ?></li>
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
            <legend>Žmogaus informacija</legend>
            <p>
                <label class="field" for="Name">Vardas<?php echo in_array('Name', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Name" name="Name" class="textbox textbox-70" value="<?php echo isset($data['Name']) ? $data['Name'] : ''; ?>">
            </p>
            <p>
                <label class="field" for="Surname"> Pavardė<?php echo in_array('Surname', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Surname" name="Surname" class="textbox textbox-70" value="<?php echo isset($data['Surname']) ? $data['Surname'] : ''; ?>">
            </p>
            <p>
                <label class="field" for="Personal_No"> Asmens kodas<?php echo in_array('Personal_No', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Personal_No" name="Personal_No" class="textbox textbox-70" value="<?php echo isset($data['Personal_No']) ? $data['Personal_No'] : ''; ?>">
            </p>
            <p>
                <label class="field" for="Salary"> Alga<?php echo in_array('Salary', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Salary" name="Salary" class="textbox textbox-70" value="<?php echo isset($data['Salary']) ? $data['Salary'] : ''; ?>">
            </p>
            <p>
                <label class="field" for="Sex"> Lytis<?php echo in_array('Sex', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Sex" name="Sex" class="textbox textbox-70" value="<?php echo isset($data['Sex']) ? $data['Sex'] : ''; ?>">
            </p>
            <p>
                <label class="field" for="Age"> Amžius<?php echo in_array('Age', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Age" name="Age" class="textbox textbox-70" value="<?php echo isset($data['Age']) ? $data['Age'] : ''; ?>">
            </p>
            <p>
                <label class="field" for="Experience"> Patirtis<?php echo in_array('Experience', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="Experience" name="Experience" class="textbox textbox-70" value="<?php echo isset($data['Experience']) ? $data['Experience'] : ''; ?>">
            </p>
            <p>
                <label class="field" for="nationality">Pilietybės<?php echo in_array('nationality', $required) ? '<span> *</span>' : ''; ?></label>
                <select id="nationality" name="nationality">
                    <option value="-1">---------------</option>
                    <?php
                    // išrenkame visas kategorijas sugeneruoti pasirinkimų lauką
                    $natList = $peopleObj->getNationalityList();
                    foreach($natList as $key => $val) {
                        $selected = "";
                        if(isset($data['nationality']) && $data['nationality'] == $val['ISO']) {
                            $selected = " selected='selected'";
                        }
                        echo "<option{$selected} value='{$val['ISO']}'>{$val['Name']}</option>";
                    }
                    ?>
                </select>
            </p>
        </fieldset>
        <fieldset>
            <legend>Profesijos</legend>
            <div class="childRowContainer">
                <div class="labelLeft wide<?php if(empty($data['profesijos']) || sizeof($data['profesijos']) == 0) echo ' hidden'; ?>">Profesija</div>
                <div class="float-clear"></div>
                <?php
                if(empty($data['profesijos']) || sizeof($data['profesijos']) == 0) {
                    ?>
                    <div class="childRow hidden">
                        <select class="elementSelector" name="profesijos[]" disabled="disabled">
                            <?php
                            $tmp = $peopleObj->getProfessionList();
                            foreach($tmp as $key => $val) {
                                echo "<option value='{$val['id_Profession']}'>{$val['Title']}</option>";
                            }
                            ?>
                        </select>
                        <a href="#" title="" class="removeChild">šalinti</a>
                    </div>
                    <div class="float-clear"></div>

                    <?php
                } else {
                    foreach($data['profesijos'] as $key => $val) {
                        ?>
                        <div class="childRow">
                            <select class="elementSelector" name="profesijos[]">
                                <?php
                                $tmp = $peopleObj->getProfessionList();
                                foreach($tmp as $key2 => $val2) {
                                    $selected = "";
                                    if($val2['id_Profession'] == $val['id_Profession']) {
                                        $selected = " selected='selected'";
                                    }
                                    echo "<option{$selected} value='{$val2['id_Profession']}'>{$val2['Title']}</option>";
                                }
                                ?>
                            </select>
                            <a href="#" title="" class="removeChild">šalinti</a>
                        </div>
                        <div class="float-clear"></div>
                        <?php
                    }
                }
                ?>
            </div>
            <p id="newItemButtonContainer">
                <a href="#" title="" class="addChild">Pridėti</a>
            </p>
        </fieldset>
        <p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
        <p>
            <input type="submit" class="submit button" name="submit" value="Išsaugoti">
        </p>
        <?php if(isset($data['Personal_No'])) { ?>
            <input type="hidden" name="Personal_No" value="<?php echo $data['Personal_No']; ?>" />
        <?php } ?>
    </form>
</div>