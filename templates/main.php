<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="robots" content="noindex">
    <title>FILMAI</title>
    <link rel="stylesheet" type="text/css" href="scripts/datetimepicker/jquery.datetimepicker.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="style/main.css" media="screen" />
    <script type="text/javascript" src="scripts/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="scripts/datetimepicker/jquery.datetimepicker.full.min.js"></script>
    <script type="text/javascript" src="scripts/main.js"></script>
</head>
<body>
<div id="body">
    <div id="header">
        <h3 id="slogan"><a href="index.php">Filmai</a></h3>
    </div>
    <div id="content">
        <div id="topMenu">
            <ul class="float-left">
                <li><a href="index.php?module=movie&action=list" title="Filmai"<?php if($module == 'movie') { echo 'class="active"'; } ?>>Filmai</a></li>
                <li><a href="index.php?module=person&action=list" title="Žmonės"<?php if($module == 'person') { echo 'class="active"'; } ?>>Žmonės</a></li>
                <li><a href="index.php?module=studio&action=list" title="Studijos"<?php if($module == 'studio') { echo 'class="active"'; } ?>>Studijos</a></li>
                <li><a href="index.php?module=award&action=list" title="Apdovanojimai"<?php if($module == 'award') { echo 'class="active"'; } ?>>Apdovanojimai</a></li>
            </ul>
            <ul class="float-right">
                <li><a href="index.php?module=report&action=list" title="Ataskaitos"<?php if($module == 'report') { echo 'class="active"'; } ?>>Ataskaitos</a></li>
            </ul>
        </div>
        <div id="contentMain">
            <?php
            // įtraukiame veiksmų failą
            if(file_exists($actionFile)) {
                include $actionFile;
            }
            ?>
            <div class="float-clear"></div>
        </div>
    </div>
    <div id="footer">

    </div>
</div>
</body>
</html>