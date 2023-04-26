<!doctype html>
<html lang="en">
<?php session_start(); ?>

<head>
    <title>Shalom | Wish List </title>
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
                <div class="col-12"><?php include "header.php" ?></div>
                <div class="col-12">
                    <div class="row">
                        <?php

                        if (isset($_SESSION["user"])) {
                            $data = $_SESSION["user"];
                            $u_id = $data["id"];

                            $rs1 = Database::search("SELECT * FROM `wishlist` WHERE  `user_id` = '" . $u_id . "'  ");
                            if ($rs1->num_rows == 0) {
                        ?>
                                <div class="col-12 mb-2">
                                    <h1 class="form-label fw-bold">Wish List </h1>
                                </div>

                                <div class="col-8 offset-2 border border-4 border-danger mt-5 mb-4 ">
                                    <div class="row">
                                        <div class=" col-10 offset-1 text-center mt-5 mb-5">
                                            <div class="row">
                                                <h2 class="text-black">NO Iteam In Your Wish List</h2>
                                                <P>First add Iteams in Wish List</P>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                    <?php
                            } else {
                    ?>

                        <div class="col-12 col-lg-6">
                            <h1 class="form-label fw-bold text-uppercase text-danger"><i class="bi bi-bag-heart fs-1"></i>&nbsp;Wish List </h1>
                        </div>

                        <div class="col-12 col-lg-6 mb-2 text-end mt-2">
                            <label class="form-label fs-5"><?php echo ($rs1->num_rows); ?> iteam In your WishList</label>
                        </div>

                        <div class="col-12">
                            <hr />
                        </div>

                        <div class="col-12">
                            <div class="row g-4">

                                <?php
                                for ($y = 0; $rs1->num_rows > $y; $y++) {
                                    $table = $rs1->fetch_assoc();
                                    $p_id = $table["products_id"];

                                    $rs2 = Database::search("SELECT * FROM `products` WHERE `id` = '" . $p_id . "' ");
                                    $table2 = $rs2->fetch_assoc();
                                ?>
                                    <div class="col-12 col-lg-3 mb-3">
                                        <div class="row g-3">
                                            <?php
                                            $rs3 = Database::search("SELECT * FROM `image` WHERE `products_id` = '" . $p_id . "' ");
                                            $table3 = $rs3->fetch_assoc();
                                            ?>
                                            <a href="single_product_view.php?id=<?php echo ($table2['id']) ?>"><img style="height:500px;" src="<?php echo ($table3["name"]) ?>" class="card-img-top" alt="..."></a>
                                            <div class="col-12">
                                                <div class="row g-1">
                                                    <div class="col-10 d-grid"><button onclick="remove_wish_list(<?php echo ($p_id) ?>)" class="btn btn-danger"><i class="bi bi-calendar-x-fill fs-6"></i>&nbsp;Remove Wish List</button></div>
                                                    <div class="col-2"><a class="d-grid" href="single_product_view.php?id=<?php echo ($table2['id']) ?>"><button class="btn btn-warning"><i class="bi bi-cart-fill fs-6"></i></button></a></div>
                                                    <div class="col-12 text-center">
                                                        <p class="card-title text-uppercase"><?php echo ($table2["title"]) ?></p>
                                                    </div>
                                                    <div class="col-12 text-center">
                                                        <p class="card-title text-uppercase text-warning">LKR &nbsp;<?php echo ($table2["price"]) ?></p>
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
                    <?php
                            }
                        } else {
                    ?>

                    <div class="col-8 offset-2 border border-4 border-danger mt-5 mb-4 ">
                        <div class="row">
                            <div class=" col-10 offset-1 text-center mt-5 mb-5">
                                <div class="row">
                                    <h2 class="text-black">YOU HAVE TO LOGIN FIRST.</h2>
                                    <P>Before Iteams add to your cart</P>
                                    <a href="sign.php"><button class="btn btn-success">Go to Login Page</button></a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="script.js"></script>
</body>

</html>