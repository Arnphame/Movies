<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li>Apdovanojimai</li>
</ul>
<div id="actions">
    <a href='index.php?module=<?php echo $module; ?>&action=create'>Naujas apdovanojimas</a>
</div>
<div class="float-clear"></div>

<table class="listTable">
    <tr>
        <th>ID</th>
        <th>PAVADINIMAS</th>
        <th>METAI</th>
        <th>ŠALIS</th>
        <th>TIPAS</th>
        <th>FILMAS</th>
        <th></th>
    </tr>
    <?php
    // suformuojame lentelę
    foreach($data as $key => $val) {
        echo
            "<tr>"
            . "<td>{$val['id_Award']}</td>"
            . "<td>{$val['Name']}</td>"
            . "<td>{$val['Year']}</td>"
            . "<td>{$val['Country']}</td>"
            . "<td>{$val['Type']}</td>"
            . "<td>{$val['movie']}</td>"
            . "<td>"
            . "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_Award']}\"); return false;' title=''>šalinti</a>&nbsp;"
            . "<a href='index.php?module={$module}&action=edit&id={$val['id_Award']}' title=''>redaguoti</a>"
            . "</td>"
            . "</tr>";
    }
    ?>
</table>

<?php
// įtraukiame puslapių šabloną
include 'templates/paging.php';
?>