<?php
$dir = "contenu";
$files = glob($dir . '/*.{jpg,png,jpeg,gif}', GLOB_BRACE);

echo json_encode($files);
