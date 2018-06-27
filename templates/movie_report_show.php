<ul id="reportInfo">
    <li class="title">Filmų ataskaita</li>
    <li>Sudarymo data: <span><?php echo date("Y-m-d"); ?></span></li>
    <li>Filmų sukūrimo data:
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
if(sizeof($moviesData) > 0) { ?>
    <table class="reportTable">
        <tr>
            <th>Pavadinimas</th>
            <th>Apdovanojimas</th>
            <th class="width150">Ar nugalejo?</th>
        </tr>

        <?php
        // suformuojame lentelę
        for($i = 0; $i < sizeof($moviesData); $i++) {

            if($i == 0 || $moviesData[$i]['filmoPav'] != $moviesData[$i-1]['filmoPav']) {
                echo
                    "<tr>"
                    . "<td class='groupSeparator' colspan='3'>{$moviesData[$i]['filmoPav']}</td>"
                    . "</tr>";
            }


            echo
                "<tr>"
                . "<td>{$moviesData[$i]['Name']}</td>"
                . "<td>{$moviesData[$i]['awardName']}</td>"
                . "<td>{$moviesData[$i]['nugalejo']}</td>"
                . "</tr>";
            if($i == (sizeof($moviesData) - 1) || $moviesData[$i]['filmoPav'] != $moviesData[$i+1]['filmoPav']) {

                echo
                    "<tr class='aggregate'>"
                    . "<td colspan='2'></td>"
                    . "<td class='border'>Pergaliu kiekis: {$moviesData[$i]['Pergaliu_Sk']}</td>"
                    . "</tr>";
            }
        }
        ?>


        <tr>
            <td class='groupSeparator' colspan='3'>Bendras kiekis</td>
        </tr>

        <tr class="aggregate">
            <td class="label" style="text-align: right" colspan="2"></td>
            <td class="border"><?php echo "Viso pergaliu: " . $moviesSum[0]['Pergaliu_sk']; ?></td>
        </tr>
    </table>
    <a href="index.php?module=movies&action=report" title="Nauja ataskaita" style="margin-bottom: 15px" class="button large float-right">nauja ataskaita</a>
    <?php
} else {
        ?>
        <div class="warningBox">
            Nurodytu laikotartpiu sutarčių sudaryta nebuvo.
        </div>
        <?php
}
?>