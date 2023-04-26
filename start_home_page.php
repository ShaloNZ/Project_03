<!doctype html>
<html lang="en">

<head>
    <title>HOME | SHALOM</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="icon" href="resources/logo_and_images/logo.webp" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

</head>

<body onload="logo_run_animation();">

    <div class="container-fluid">
        <div class="row">

            <video autoplay loop muted plays-inline class="back-video">
                <source src="resources/background_video(1).mp4" />
            </video>
            <audio loop id="mySong">
                <source src="resources/background_audio.mp3" type="audio/mp3" />
            </audio>


            <div class="open_page_div">
                <div class="col-12 text-center" id="Main_div_item">
                    <div class="row">
                        <div class="col-12">
                            <img style="height: 300px;" src="resources/logo_and_images/logo.webp" />
                        </div>
                        <div class="col-12">
                            <h1 class="text-white fw-bold text-uppercase" style="font-size: 80px;">Start Shopping</h1>
                        </div>
                        <div class=" offset-4 col-4 d-grid">
                            <button onclick="Start_shopping();" class="btn btn-outline-light fs-1 fw-bold rounded">CLICK TO EXPLORE</button>
                        </div>
                        <p><img style="height:100px;" id="icon" src="resources/play.png" /></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var mySong = document.getElementById("mySong");
        var icon = document.getElementById("icon");

        icon.onclick = function() {

            if (mySong.paused) {
                mySong.play();
                icon.src = "resources/pause.png"
            } else {
                mySong.pause();
                icon.src = "resources/play.png"
            }
        }
    </script>

    <script src="script.js"></script>

</body>

</html>