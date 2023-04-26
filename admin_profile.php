<!doctype html>
<html lang="en">
<?php session_start() ?>

<head>
    <title>Shalom | Admin Pannel</title>
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
        <div class="col-12">
            <div class="row">

                <?php
                if (isset($_SESSION["adminNew"])) {
                ?>
                    <div class="col-12"><?php include "header.php" ?></div>
                    <div class="col-12 text-uppercase">
                        <h1 class="fw-bold">Admin Pannel</h1>
                    </div>

                    <div class="col-12 border border-1 border-warning mt-2 text-center">
                        <div class="row g-2">
                            <div class="All_hover col-lg-3 col-6"><label class="p-2" class="mt-3 ">Messages</label></div>
                            <div class="All_hover col-lg-3 col-6"><a href="addNewProduct.php"><label class="p-2">Add New Product</label></a></div>
                            <div class="All_hover col-lg-3 col-6"><a href="admin_profile_load_manage_users.php"><label class="p-2">Manage Users</label></a></div>
                            <div class="All_hover col-lg-3 col-6"><a href="admin_profile_load_manage_products.php"><label class="p-2">Manage Products</label></a></div>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="row" id="load_admin_option_div">
                        </div>
                    </div>

                <?php
                } else {
                ?>
                    <div class="col-1"><a href="index.php"><i class="bi bi-arrow-left fs-1"></i></a></div>
                    <div class="col-11 text-center text-danger mt-3 mb-3">
                        <p class="fw-bold fs-5">Warning : you are Logging to the admin Account, Please Think carefully about changes before submitting this form</p>
                        <p>IF YOU WANT TON FULL ACCESS LOGIN</p>
                    </div>
                    <div class="col-12 col-lg-8 offset-lg-2 bg-white">
                        <div class="row">
                            <div class="col-6 admin_Login_bg d-none d-lg-block"></div>
                            <div class="col-12 col-lg-6">
                                <div class="row g-2">
                                    <div class="col-12 mt-3 text-center ">
                                        <?php
                                        require "connection.php";
                                        $admin = $_SESSION["admin"];
                                        $rs_1 = Database::search("SELECT * FROM `admin` WHERE `id` = '" . $admin["id"] . "' ");
                                        $data_1 = $rs_1->fetch_assoc();
                                        ?>
                                        <img style="height:200px;" src="<?php echo ($data_1["user_dp"]) ?>" />
                                    </div>

                                    <div class="col-12 mt-2" id="signInForm">
                                        <div class="row g-3">
                                            <div class="col-12 text-center  d-none" id="signUpAlert" role="alert"></div>
                                            <div class="col-12"><input class="form-control" type="email" placeholder="User Name" id="userName" /></div>
                                            <div class="col-12"><input class="form-control" type="email" placeholder="Email" id="email" /></div>
                                            <div class="col-12"><input class="form-control" type="text" placeholder="Mobile Number" id="mobile" /></div>
                                            <div class="col-12"><input class="form-control" type="password" placeholder="Password" id="password" /></div>
                                            <div class="col-12 text-end"><a class="text-decoration-none" href="#">Forgot Password ?</a> </div>
                                            <div class="col-12  d-grid"><button class="btn btn-warning" onclick="admin_sign_in();">Sign In</button></div>
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
    </div>

</body>


<script src="script.js"></script>

</html>