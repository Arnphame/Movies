<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li>Filmai</li>
</ul>
<div id="actions">
    <a href='index.php?module=<?php echo $module; ?>&action=create'>Naujas filmas</a>
</div>
<div class="float-clear"></div>

<table class="listTable">
    <tr>
        <th>ID</th>
        <th>FILMO PAVADINIMAS</th>
        <th>METAI</th>
        <th>LAIKAS</th>
        <th>ŽANRAS</th>
        <th>STUDIJA</th>
        <th></th>
    </tr>
    <?php
    // suformuojame lentelę
    foreach($data as $key => $val) {
        echo
            "<tr>"
            . "<td>{$val['id_Movie']}</td>"
            . "<td>{$val['Name']}</td>"
            . "<td>{$val['Year']}</td>"
            . "<td>{$val['Runtime']}</td>"
            . "<td>{$val['Genre']}</td>"
            . "<td>{$val['studio']}</td>"
            . "<td>"
            . "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_Movie']}\"); return false;' title=''>šalinti</a>&nbsp;"
            . "<a href='index.php?module={$module}&action=edit&id={$val['id_Movie']}' title=''>redaguoti</a>"
            . "</td>"
            . "</tr>";
    }
    ?>
</table>

<?php
// įtraukiame puslapių šabloną
include 'templates/paging.php';
?>