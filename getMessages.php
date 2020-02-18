<?php
$dir = "contenu/messages.txt";

if (!$messages = file($dir, FILE_IGNORE_NEW_LINES)) {
    $messages = fopen($dir, "w");
}

echo json_encode($messages);
