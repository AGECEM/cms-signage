<?php
$dir = "contenu";
$files = scandir($dir);
unset($files[0]);
unset($files[1]);

echo json_encode($files);