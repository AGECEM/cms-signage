<?php
$dir = "contenu/messages.txt";
$messages = file("contenu/messages.txt", FILE_IGNORE_NEW_LINES);

echo json_encode($messages);
