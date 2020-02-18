<?php
$dir = "contenu";
$files = glob($dir . '/*.{jpg,png,jpeg,gif,pdf}', GLOB_BRACE);

echo json_encode($files);
