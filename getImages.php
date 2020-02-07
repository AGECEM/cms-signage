<?php
$dir = "contenu";
$files = scandir($dir);

echo json_encode(array_values(array_diff($files, array('.', '..'))));
