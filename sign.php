<!doctype html>
<html lang="en">

<?php session_start() ?>

<head>
    <title>Login | SignUp </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="icon" href="resources/logo_and_images/logo.webp" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>


<body>

    <div class="container-fluid">
        <div class="row">

            <?php

            if (isset($_SESSION["user"])) {

            ?>

                <div class="col-8 offset-2 border border-4 border-danger mt-5 mb-4 ">
                    <div class="row">
                        <div class=" col-10 offset-1 text-center mt-5 mb-5">
                            <div class="row">
                                <h2 class="text-black">YOU ARE ALREADY LOGIN .</h2>
                                <button class="btn btn-success" onclick="Gohome();">Go to HOME Page</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php

            } else if (isset($_SESSION["admin"]) || isset($_SESSION["adminNew"])) {
            ?>

                <div class="col-8 offset-2 border border-4 border-danger mt-5 mb-4 ">
                    <div class="row">
                        <div class=" col-10 offset-1 text-center mt-5 mb-5">
                            <div class="row">
                                <h2 class="text-black">ADMIN ACCOUNT ALREADY LOGIN .</h2>
                                <p>Log Out Pleace</p>
                                <button class="btn btn-success" onclick="Gohome();">Go to HOME Page</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php


            } else {
            ?>


                <div class="col-12 col-lg-4 offset-lg-4 bg-white">
                    <div class="row">

                        <div class="col-12">
                            <div class="row g-2">
                                <div class="col-12"><a href="index.php"><i class="bi bi-arrow-left fs-1"></i></a></div>
                                <div class="col-12 d-none d-lg-block login_logo" onclick="Gohome();"></div>

                                <div class="col-12" id="signInForm">
                                    <div class="row g-3">

                                        <div class="col-12">
                                            <h1>LOGIN</h1>
                                        </div>
                                        <div class="col-12 text-start">
                                            <p>Your password must contain letters and numbers, and must not contain spaces, special characters, or emoji.</p>
                                        </div>
                                        <div class="col-12 text-center d-none" id="signInAlert" role="alert"></div>
                                        <div class="col-12"><input class="form-control" type="text" placeholder="Email Address Or Mobile Number" id="email" /></div>
                                        <div class="col-12"><input class="form-control" type="password" placeholder="Password" id="password" /></div>
                                        <div class="col-12 text-end"><a class="text-decoration-none" href="#">Forgot Password ?</a> </div>
                                        <div class="col-12  d-grid"><button class="btn btn-warning" onclick="signIn();">Sign In</button></div>
                                        <div class="col-12 text-center">
                                            <p>Don't have an account? <a class="text-decoration-none" onclick="sign();" href="#">SignUp</a></p>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 d-none" id="signUpForm">
                                    <div class="row g-3">

                                        <div class="col-12">
                                            <h1>SIGNUP</h1>
                                        </div>
                                        <div class="col-12 text-start">
                                            <p>Your password must contain letters and numbers, and must not contain spaces, special characters, or emoji.</p>
                                        </div>
                                        <div class="col-12 text-center  d-none" id="signUpAlert" role="alert"></div>
                                        <div class="col-12"><input class="form-control" type="email" placeholder="User Name" id="userName2" /></div>
                                        <div class="col-12"><input class="form-control" type="email" placeholder="Email" id="email2" /></div>
                                        <div class="col-12"><input class="form-control" type="text" placeholder="Mobile Number" id="mobile2" /></div>
                                        <div class="col-12"><input class="form-control" type="password" placeholder="Password" id="password2" /></div>
                                        <div class="col-12"><input class="form-control" type="password" placeholder="Confirm Password" id="confirm_password2" /></div>
                                        <!-- <div class="col-12 text-end"><a class="text-decoration-none" href="#">Forgot Password ?</a> </div> -->
                                        <div class="col-12  d-grid"><button class="btn btn-warning" onclick="signUp();">Sign Up</button></div>
                                        <div class="col-12 text-center">
                                            <p>Already have an account? <a class="text-decoration-none" onclick="sign();" href="#">Login</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            <?php

            }

            ?>



        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>