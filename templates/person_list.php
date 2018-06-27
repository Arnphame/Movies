<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li>Žmonės</li>
</ul>
<div id="actions">
    <a href='index.php?module=<?php echo $module; ?>&action=create'>Naujas žmogus</a>
</div>
<div class="float-clear"></div>

<table class="listTable">
    <tr>
        <th>VARDAS</th>
        <th>PAVARDĖ</th>
        <th>ASMENS KODAS</th>
        <th>PROFESIJA</th>
        <TH>PILIETYBĖ</TH>
        <th></th>
    </tr>
    <?php
    // suformuojame lentelę
    foreach($data as $key => $val) {
        echo
            "<tr>"
            . "<td>{$val['Name']}</td>"
            . "<td>{$val['Surname']}</td>"
            . "<td>{$val['Personal_No']}</td>"
            . "<td>{$val['Profesija']}</td>"
            . "<td>{$val['nationality']}</td>"
            . "<td>"
            . "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['Personal_No']}\"); return false;' title=''>šalinti</a>&nbsp;"
            . "<a href='index.php?module={$module}&action=edit&id={$val['Personal_No']}' title=''>redaguoti</a>"
            . "</td>"
            . "</tr>";
    }
    ?>
</table>

<?php
// įtraukiame puslapių šabloną
include 'templates/paging.php';
?>