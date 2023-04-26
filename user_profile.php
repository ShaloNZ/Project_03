<!doctype html>
<html lang="en">
<?php session_start(); ?>

<head>
    <title>Shalom | User Profile </title>
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
                include "header.php";
                if (isset($_SESSION["user"])) {
                    $user = $_SESSION["user"];
                    $rs_1 = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "' ");
                    $data_1 = $rs_1->fetch_assoc();
                ?>
                    <div class="col-12">
                        <div class="row">
                            <!-- <div class="col-12 border border-1 border-warning mt-2 text-center">
                                <div class="row g-2">
                                    <div class="All_hover col-lg-3 col-6 bg-black text-white"><label class="p-2" class="mt-3 "><i class="bi bi-person-check-fill me-2"></i> &nbsp;My Account</label></div>
                                    <div class="All_hover col-lg-3 col-6"><a href=""><label class="p-2"><i class="bi bi-box2-fill me-2"></i> &nbsp;My Orders</label></a></div>
                                    <div class="All_hover col-lg-3 col-6"><a href="wish_list.php"><label class="p-2"><i class="bi bi-bag-heart me-2"></i> &nbsp;My Wish List</label></a></div>
                                    <div class="All_hover col-lg-3 col-6"><a href="cart.php"><label class="p-2" class="mb-3"><i class="bi bi-cart3 me-2"></i> &nbsp;My Cart</label></a></div>
                                </div>
                            </div> -->
                            <div class="col-12 border border-1 border-warning mt-2">
                                <div class="row">
                                    <div class="col-12 col-lg-4 border-end border-1 border-warning">
                                        <div class="row">
                                            <?php
                                            if (empty($data_1["user_dp"])) {
                                            ?>
                                                <div class="col-12 text-center">
                                                    <div class="row">
                                                        <input type="file" class="d-none" id="user_image" />
                                                        <label for="user_image"><i class="bi bi-plus-square-fill fs-3"></i></label>
                                                        <button class="btn btn-warning" onclick="change_user_dp();">Set Profile Picture</button>
                                                    </div>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 mb-2 mt-2">
                                                            <div class="row g-2">
                                                                <div class="col-6 text-center"><img class="rounded" style="height: 150px;" src="<?php echo ($data_1["user_dp"]) ?>" /></div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <input type="file" class="d-none" id="user_image" />
                                                                        <label for="user_image"><i class="bi bi-arrow-repeat fs-3"></i></label>
                                                                        <button class="btn btn-warning" onclick="change_user_dp();">Chane Profile Photo</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                            <div class="col-12 border border-1 bg-secondary text-white">
                                                <div class="row g-2">
                                                    <div class="col-12 mt-3">
                                                        <labe class="text-uppercase"><i class="bi bi-person-bounding-box"></i>&nbsp;&nbsp;<?php echo ($data_1["user_name"]) ?></labe>
                                                    </div>
                                                    <div class="col-12">
                                                        <labe><i class="bi bi-envelope-at"></i>&nbsp;&nbsp;<?php echo ($data_1["email"]) ?></labe>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <labe><i class="bi bi-telephone-fill"></i>&nbsp;&nbsp;<?php echo ($data_1["mobile"]) ?></labe>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-2 mb-3">
                                                <div class="row g-2">
                                                    <div class="All_hover col-6 col-lg-12" onclick="my_address();"><label class="p-2"><i class="bi bi-envelope-at"></i></i> &nbsp;My Address</label></div>
                                                    <div class="All_hover col-6 col-lg-12" onclick="my_order();"><label class="p-2"><i class="bi bi-box2-fill me-2"></i> &nbsp;My Orders</label></div>
                                                    <div class="All_hover col-6 col-lg-12" onclick="my_profile();"><label class="p-2"><i class="bi bi-person-circle me-2"></i></i> &nbsp;My Profile</label></div>
                                                    <div class="All_hover col-6 col-lg-12" onclick="Go_track_order();"><label class="p-2"><i class="bi bi-pen-fill"></i> &nbsp;Traking Orders</label></div>
                                                    <div class="All_hover col-6 col-lg-12"><label class="p-2"><i class="bi bi-chat-left-text"></i> &nbsp;Messages</label></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-8 ">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row" id="user_profile_option_set">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

        <?php
                } else {
        ?>

            <div class="col-8 offset-2 border border-4 border-danger mt-5 mb-4 ">
                <div class="row">
                    <div class=" col-10 offset-1 text-center mt-5 mb-5">
                        <div class="row">
                            <h2 class="text-black">YOU HAVE TO LOGIN FIRST.</h2>
                            <P>After We Will Create Profile</P>
                            <a href="sign.php"><button class="btn btn-success">Go to Login Page</button></a>
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

    <script src="script.js"></script>
</body>

</html>