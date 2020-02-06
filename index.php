<!DOCTYPE html>
<html>

<head>
    <title>CMS Signage</title>
    <!--
        <meta http-equiv="refresh" content="10" />
    -->
    <style>
        body {
            background-color: red;
            margin: 0px;
            padding: 0px;
            border: 0px;
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
        <!--Embed goes here-->
        <!--<embed src="contenu/05 - partyagecem13mars télé.jpg" />-->

	<?php
		$dir = "/contenu";
		$files = scandir($dir);
	?>
        <!--<embed src="contenu/03 - 2016.01.26 - Affiche tv - Diva cup.jpg" />-->
	<embed src="<?php echo $files[0];?>"/>
    </div>

    <div id="bar">
        <!--Navigation bar, datetime and stuff goes here-->
        <img id="bar-bg" src="ressources/degrade_bleu-gris.jpg" />
        <!-- Works, mais pas homebrew
        <iframe src="http://free.timeanddate.com/clock/i73mmlu4/n165/tlca2/fn6/fs28/fc9ff/tct/pct/ftb/pa8/tt0/tw1/th1/tb4" frameborder="0" width="337" height="86" allowTransparency="true"></iframe>
        -->

        <!-- Works somewhat-->
        <div id="banner-text">

            <!-- Time -->
            <div id="currentTime" />
            <script>
                $message = "woaah"

                function currentTime() {
                    var date = new Date();
                    var hours = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
                    var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
                    var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();

                    return hours + ":" + minutes + ":" + seconds;
                }

                setInterval(function () { document.getElementById("currentTime").innerHTML = currentTime(); }, 1000);
            </script>
        </div>

    </div>
</body>

</html>
