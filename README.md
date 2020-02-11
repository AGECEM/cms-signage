# cms-signage
Application web pour digital signage

## Affichage d'images

Les images à afficher peuvent être déposées dans le répertoire `contenu`. Les types fichiers supportés sont `jpg`, `png`, `jpeg`, `gif`, `pdf`.

## Affichage de messages

Les messages à afficher sont dans le fichier `messages.txt`. Chaque ligne de texte représente un message à afficher.


## Changelog

2019-12-17 (Initial)

-.contenu{} occupe 91% de l'espace de la page (partie supérieur)

-.bar{} occupe 9% de l'espace de la page (partie inférieur)

-Permet d'afficher une image par la balise <embed> dans .contenu{}. L'image fit et s'ajuste à l'intérieur de .contenu{} en révélant le background noir sur les côtés (ou au dessus et en dessous) au besoin, selon la taille de l'image
