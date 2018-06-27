<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li>Filmai</li>
</ul>
<div id="actions">
    <a href='index.php?module=<?php echo $module; ?>&action=create'>Nauja studija</a>
    <a href='index.php?module=<?php echo $module; ?>&action=report'>Studiju ataskaita</a>
</div>
<div class="float-clear"></div>

<table class="listTable">
    <tr>
        <th>ID</th>
        <th>PAVADINIMAS</th>
        <th>ŠALIS</th>
        <th>ĮKŪRĖJAS</th>
        <th>METAI</th>
        <th>PELNAS</th>
        <th></th>
    </tr>
    <?php
    // suformuojame lentelę
    foreach($data as $key => $val) {
        echo
            "<tr>"
            . "<td>{$val['id_Studio']}</td>"
            . "<td>{$val['Name']}</td>"
            . "<td>{$val['Country']}</td>"
            . "<td>{$val['Founder']}</td>"
            . "<td>{$val['Year']}</td>"
            . "<td>{$val['Revenue']}</td>"
            . "<td>"
            . "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_Studio']}\"); return false;' title=''>šalinti</a>&nbsp;"
            . "<a href='index.php?module={$module}&action=edit&id={$val['id_Studio']}' title=''>redaguoti</a>"
            . "</td>"
            . "</tr>";
    }
    ?>
</table>

<?php
// įtraukiame puslapių šabloną
include 'templates/paging.php';
?>