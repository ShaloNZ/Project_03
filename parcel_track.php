<!doctype html>
<html lang="en">

<?php require "connection.php" ?>

<head>
    <title>Track-Order</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="icon" href="resources/logo_and_images/logo.webp" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<div class="container-fluid">
    <div class="col-12">
        <div class="row">
            <div class="col-12 d-flex justify-content-center vh-100  tracking_page_bg">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-8 offset-lg-2">
                        <div class="row">
                            <div class="col-12"><a href="user_profile.php"><i class="bi bi-arrow-left fs-1 fw-bold text-white"></i></a></div>
                            <div class="col-12 text-center">
                                <img src="resources/logo_and_images/logo.webp" class="login_logo" />
                            </div>
                            <div class="col-12 col-lg-9 mt-5">
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class="text-white fw-bold text-uppercase l-p">Package Tracking</h1>
                                    </div>
                                    <div class="col-12 bg-white rounded">
                                        <div class="row">
                                            <div class="col-8 p-3"> <input type="text" placeholder="Enter Tracking Number" class="form-control border-0 fs-5" /></div>
                                            <div class="col-4 p-3 d-grid"><button class="btn btn-primary fs-5"><i class="bi bi-binoculars-fill"></i>&nbsp;&nbsp;TRACK PACKAGE</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 d-none d-lg-block">
                                <img src="resources/tracking_page_bg.png" style="height:500px;" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="bootstrap.bundle.js"></script>
<script src="script.js"></script>
</body>

</html>