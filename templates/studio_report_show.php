<ul id="reportInfo">
    <li class="title">Studijų ataskaita</li>
    <li>Sudarymo data: <span><?php echo "data"; ?></span></li>
    <li>Paslaugų užsakymo laikotarpis:
        <span>
		<?php
        if(!empty($data['dataNuo'])) {
            if(!empty($data['dataIki'])) {
                echo "nuo {$data['dataNuo']} iki {$data['dataIki']}";
            } else {
                echo "nuo {$data['dataNuo']}";
            }
        } else {
            if(!empty($data['dataIki'])) {
                echo "iki {$data['dataIki']}";
            } else {
                echo "nenurodyta";
            }
        }
        ?>
		</span>
    </li>
</ul>
<?php
if(sizeof($studiosData) > 0) { ?>
    <table class="reportTable">
        <tr class="gray">
            <th>ID</th>
            <th>Pavadinimas</th>
            <th class="width100">Nufilmuota filmų</th>
            <th class="width100">Nufilmuotų filmų trukmė</th>
        </tr>

        <?php
        // suformuojame lentelę
        foreach($studiosData as $key => $val) {
            echo
                "<tr>"
                . "<td>{$val['id_Studio']}</td>"
                . "<td>{$val['Name']}</td>"
                . "<td>{$val['Studijos']}</td>"
                . "<td>{$val['bendras_runtime']}</td>"
                . "</tr>";
        }
        ?>

        <tr>
            <td class='groupSeparator' colspan='4'>Suma</td>
        </tr>

        <tr class="aggregate">
            <td></td>
            <td class="label"></td>
            <td class="border"><?php echo "{$studiosStats[0]['Studijos']}"; ?></td>
            <td class="border"><?php echo "{$studiosStats[0]['bendras_runtime']} min" ; ?></td>
        </tr>
    </table>
    <a href="index.php?module=studios&action=report" title="Nauja ataskaita" style="margin-bottom: 15px" class="button large float-right">nauja ataskaita</a>
    <?php
} else {
    ?>
    <div class="warningBox">
        Nurodytu laikotartpiu paslaugų užsakyta nebuvo.
    </div>
    <?php
}
?>