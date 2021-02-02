<?php

$dispid = "<?php
$idn = '$id';
?> ";

$disp_main = file_get_contents('templates/recipedisp.php');

$disp_path = "recipes/recipe$id.php";

file_put_contents($disp_path, $dispid);
file_put_contents($disp_path, $disp_main, FILE_APPEND);
