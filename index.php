<!DOCTYPE html>
<html lang="fr">

<head>
    <title>CMS Signage</title>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="script/date-utils.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

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
                            updateImage(images, ++index);
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
                if (canRun) {
                    canRun = false;
                    getImages();
                }
            }, 600)
        });

    </script>
</div>

<div id="bar">

    <div id="date-time">
        <div id="time"></div>
        <div id="date"></div>
    </div>
    <div id="info-text"></div>
    <script>
        setDateTime();
        setInterval(function () {
            setDateTime()
        }, 60000);
    </script>

</div>
</body>

</html>
