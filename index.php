<!DOCTYPE html>
<html lang="fr">

<head>
    <title>CMS Signage</title>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <style>
        body {
            background-color: red;
            margin: 0;
            padding: 0;
            border: 0;
        }

        embed {
            max-width: 100%;
            height: 100%;
            object-fit: contain;
        }

        #contenu {
            background-color: black;
            position: fixed;
            text-align: center;
            width: 100%;
            height: 91%;
            top: 0;
            left: 0;
        }

        #bar {
            background-color: #2b2d2f;
            position: fixed;
            text-align: left;
            width: 100%;
            height: 9%;
            bottom: 0;
            left: 0;
        }

        img#bar-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        #banner-text {
            position: relative;
            color: yellow;
            font-family: sans-serif;
            font-weight: bold;
            z-index: 1;
        }

        #currentTime {
            text-align: left;
            font-size: 300%;
        }
    </style>
</head>


<body>
<div id="contenu">
    <embed id="image"/>
    <script>

        const REFRESH_TIME = 10000;
        let canRun = true;

        function updateImage(images, index) {
            document.getElementById("image").setAttribute("src", "contenu/" + images[index]);
        }

        function getImages() {

            $.ajax({
                url: 'getImages.php',
                type: 'POST',
                dataType: 'json',
                success: function (obj, textstatus) {
                    if (textstatus === "success") {
                        const images = Object.keys(obj).map((key) => [obj[key]]);
                        let index = 0;

                        updateImage(images, index);
                        const intervalUpdate = setInterval(function () {
                            index++;
                            updateImage(images, index);
                            if (index >= images.length - 1) {
                                clearInterval(intervalUpdate);
                                setTimeout(function () {
                                    canRun = true;
                                }, REFRESH_TIME);
                            }
                        }, REFRESH_TIME);
                    }
                }
            });
        }

        $(document).ready(function () {
            setInterval(function () {
                console.log(canRun);
                if (canRun) {
                    canRun = false;
                    getImages();
                }
            }, 600)
        });

    </script>
</div>

<div id="bar">
    <!--Navigation bar, datetime and stuff goes here
    TODO trouver une meilleure facon de mettre le background image du div au degrade
-->
    <img id="bar-bg" src="ressources/degrade_bleu-gris.jpg" alt="bar"/>

    <div id="banner-text">

        <div id="currentTime"></div>
        <script>
            function currentTime() {
                const date = new Date();
                const hours = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
                const minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
                const seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();

                return hours + ":" + minutes + ":" + seconds;
            }

            setInterval(function () {
                document.getElementById("currentTime").innerHTML = currentTime();
            }, 1000);
        </script>
    </div>

</div>
</body>

</html>
