<!doctype html>
<html lang="en">

<?php require "connection.php" ?>

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<!-- <div class="container-fluid"> -->
<div class="col-12">
    <div class="row">

        <div class="col-12">
            <div class="row">
                <?php
                if (isset($_SESSION["user"])) {
                    $user = $_SESSION["user"];
                ?>

                    <div class="col-12 bg-primary">
                        <div class="row">
                            <div class="col-12 col-lg-8 mt-2 mb-2">
                                <div class="row">
                                    <div class="col-3 col-lg-2 text-center All_hover p-2"> <a class="text-decoration-none text-white" href="index.php"><i class="bi bi-house-door-fill fs-5"></i>&nbsp;HOME</a></div>

                                    <div class="col-1 col-lg-2 text-center All_hover p-2"> <a class="text-decoration-none text-white" href="wish_list.php"><i class="bi bi-bag-heart-fill fs-5"></i></a></div>

                                    <div class="col-1 col-lg-2 text-center All_hover p-2"> <a class="text-decoration-none text-white" href="cart.php"><i class="bi bi-cart-fill fs-5"></i></a></div>

                                    <div class="col-3 col-lg-2 text-center All_hover p-2"> <a class="text-decoration-none text-uppercase text-white" href="user_profile.php"><i class="bi bi-person-circle fs-5"></i>&nbsp;<?php echo ($user["user_name"]) ?></a></div>

                                    <div class="col-4 col-lg-2 text-center All_hover p-2"> <a onclick="signOut();" class="text-decoration-none text-white" href="#"><i class="bi bi-box-arrow-right fs-5"></i>&nbsp;Sign Out</a></div>

                                </div>
                            </div>
                        </div>
                    </div>


                <?php
                } else if (isset($_SESSION["admin"]) || isset($_SESSION["adminNew"])) {
                    $admin = $_SESSION["admin"];
                ?>
                    <div class="col-12 bg-primary">
                        <div class="row">

                            <div class="col-12 col-lg-8 mt-2 mb-3">
                                <div class="row">

                                    <div class="col-6 col-lg-3 text-center All_hover p-2"> <a class="text-decoration-none text-white" href="index.php"><i class="bi bi-house-door-fill fs-5"></i>&nbsp;HOME</a></div>

                                    <div class="col-6 col-lg-3 text-center All_hover p-2"> <a class="text-decoration-none text-white" href="admin_profile.php"><i class="bi bi-gear-fill fs-5"></i>&nbsp;Control Pannel</a></div>

                                    <div class="col-6 col-lg-3 text-center All_hover p-2"> <a class="text-decoration-none text-uppercase text-white" href="admin_profile.php"><i class="bi bi-person-circle fs-4"></i>&nbsp;<?php echo ($admin["user_name"]) ?></a></div>

                                    <div class="col-6 col-lg-3 text-center All_hover p-2"> <a onclick="signOut();" class="text-decoration-none text-white" href="#"><i class="bi bi-box-arrow-right fs-5"></i>&nbsp;Sign Out</a></div>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="col-12 bg-primary">
                        <div class="row">
                            <div class="col-12 col-lg-8 mt-2 mb-2">
                                <div class="row">
                                    <div class="col-4 text-center All_hover p-2"> <a class="text-decoration-none text-white" href="index.php"><i class="bi bi-house-door-fill fs-5"></i>&nbsp;HOME</a></div>

                                    <div class="col-2 text-center All_hover p-2"> <a class="text-decoration-none text-white" href="wish_list.php"><i class="bi bi-bag-heart-fill fs-5"></i></a></div>

                                    <div class="col-2 text-center All_hover p-2"> <a class="text-decoration-none text-white" href="cart.php"><i class="bi bi-cart-fill fs-5"></i></a></div>

                                    <div class="col-4 text-center All_hover p-2"> <a class="text-decoration-none text-white" href="sign.php"><i class="bi bi-box-arrow-in-left fs-5"></i>&nbsp;Sign Up | Login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>


                <div class="col-12 mb-2 border-bottom border-1">
                    <div class="row">
                        <?php
                        $rs_1 = Database::search("SELECT * FROM `gender`");
                        for ($x = 0; $x < $rs_1->num_rows; $x++) {

                            $data_1 = $rs_1->fetch_assoc();
                        ?>
                            <div onclick="select_gender(<?php echo ($data_1['id']); ?>);" class="col-4 text-center text-uppercase All_hover p-2"> <text class="fs-5"><?php echo ($data_1["name"]); ?></text></div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        
                        <div class="col-6">
                            <div class="row" id="load_category_1">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row" id="load_category_2">
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                ?>
            </div>
        </div>


    </div>
</div>
<!-- </div> -->

<script src="bootstrap.bundle.js"></script>
<script src="script.js"></script>
</body>

</html>