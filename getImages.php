<?php
$dir = "contenu";

for ($index = 0; $index < 4; $index++){
        switch ($index){
        case 0:
                $files = glob("$dir/*.png");
                break;
        case 1:
                $files += glob("$dir/*.jpg");
                break;
        case 2:
                $files += glob("$dir/*.jpeg");
                break;
        case 3:
                $files += glob("$dir/*.gif");
                break;
        default:
                echo "This shouldn't happen";
                break;
        }
}
echo json_encode($files);
