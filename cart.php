<!doctype html>
<html lang="en">
<?php session_start(); ?>


<head>
    <title>Shalom | Cart</title>
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
                    $data = $_SESSION["user"];
                    $u_id = $data["id"];

                    $rs1 = Database::search("SELECT * FROM `cart` WHERE  `user_id` = '" . $u_id . "'  ");
                    if ($rs1->num_rows == 0) {
                ?>
                        <div class="col-12 mb-2">
                            <h1 class="form-label fw-bold">Shopping Cart </h1>
                        </div>

                        <div class="col-8 offset-2 border border-4 border-danger mt-5 mb-4 ">
                            <div class="row">
                                <div class=" col-10 offset-1 text-center mt-5 mb-5">
                                    <div class="row">
                                        <h2 class="text-black">NO Iteam In Your Shopping Cart.</h2>
                                        <P>First add Iteams in youryour cart</P>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    } else { ?>

                        <!-- <div class="col-12 mt-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="userProfile.php">My Profile</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                                </ol>
                            </nav>
                        </div>

                        <div class="col-12 mt-2 mb-3">
                            <div class="row">
                                <div class="col-lg-9 col-12 "> <input class="form-control" type="search" placeholder="I'm Shooping for...." /></div>
                                <div class="col-lg-3 col-12 mt-2 mt-lg-0 d-grid"> <button class="btn btn-primary">Search From Cart</button></div>
                            </div>
                        </div> -->

                        <!-- <div class="col-12">
                            <hr class="border border-1 border-warning" />
                        </div> -->

                        <div class="col-12 col-lg-6 mb-2">
                            <h1 class="form-label fw-bold text-uppercase text-primary"><i class="bi bi-cart-fill fs-1"></i>&nbsp;Shopping Cart </h1>
                        </div>

                        <div class="col-12 col-lg-6 mb-2 text-end mt-2">
                            <label class="form-label fw-bold"><?php echo ($rs1->num_rows); ?> iteam In your Cart</label>
                        </div>

                        <div class="col-12 col-lg-9 mb-4">
                            <div class="row">

                                <?php

                                for ($y = 0; $rs1->num_rows > $y; $y++) {
                                    $table = $rs1->fetch_assoc();
                                    $p_id = $table["products_id"];

                                    $rs2 = Database::search("SELECT * FROM `products` WHERE `id` = '" . $p_id . "' ");
                                    $table2 = $rs2->fetch_assoc();

                                    $rs_3 = Database::search("SELECT * FROM `products_color` WHERE `products_id` = '" . $p_id . "' AND `id` = '" . $table["products_color_id"] . "' ");
                                    $data_3 = $rs_3->fetch_assoc();
                                    $color_id = $data_3["color_id"];

                                    $rs_10 = Database::search("SELECT * FROM `color` WHERE `id` = '" . $color_id . "' ");
                                    $data_10 = $rs_10->fetch_assoc();

                                    $rs_4 = Database::search("SELECT * FROM `products_size` WHERE `products_id` = '" . $p_id . "' AND `id` = '" . $table["products_size_id"] . "' ");
                                    $data_4 = $rs_4->fetch_assoc();
                                    $size_id = $data_4["size_id"];

                                    $rs_11 = Database::search("SELECT * FROM `size` WHERE `id` = '" . $size_id . "'  ");
                                    $data_11 = $rs_11->fetch_assoc();

                                ?>

                                    <div class="col-12 mb-3 border border-2 border-danger">
                                        <div class="row g-2 p-2 text-secondary">
                                            <?php
                                            $rs5 = Database::search("SELECT * FROM `image` WHERE `products_id` = '" . $p_id . "' ");
                                            $table5 = $rs5->fetch_assoc();
                                            ?>
                                            <div class="col-12">
                                                <h1 class="text-uppercase"><?php echo ($table2["title"]) ?></h1>
                                            </div>
                                            <div class="col-12 col-lg-3">
                                                <a href="single_product_view.php?id=<?php echo ($table2['id']) ?>"> <img style="height:300px;" src="<?php echo ($table5["name"]) ?>" class="card-img-top" alt="..."></a>
                                            </div>
                                            <div class="col-9">
                                                <div class="row">
                                                    <div class="col-6 col-lg-2">
                                                        <div class="row">
                                                            <div class="col-12"></div>
                                                            <div class="col-12">Color :</div>
                                                            <div class="col-12">Size :</div>
                                                            <div class="col-12">Quantity :</div>
                                                            <div class="col-12">LKR : </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-lg-10">
                                                        <div class="row">
                                                            <div class="col-12"><?php echo ($data_10["name"]) ?></div>
                                                            <div class="col-12"><?php echo ($data_11["name"]) ?></div>
                                                            <div class="col-12"><?php echo ($table["qty"]) ?></div>
                                                            <div class="col-12"><?php echo ($table2["price"]) ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-5 col-lg-4 d-grid"><button onclick="remove_cart_list(<?php echo ($table['id']) ?>)" class="btn btn-warning"><i class="bi bi-cart-fill"></i>&nbsp;&nbsp;Remove To Cart</button></div>
                                                            <div class="col-2 col-lg-1 text-center text-danger" onclick="add_wish_list(<?php echo ($p_id) ?>)"><i class="bi bi-bag-heart-fill fs-4"></i></div>
                                                            <div class="col-5 col-lg-4 d-grid"> <button type="submit" id="payhere-payment" onclick="buy_now(<?php echo ($p_id) ?>);" class="btn btn-primary"><i class="bi bi-cash-coin"></i>&nbsp;&nbsp;Buy Now</button></div>
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

                        <div class="col-2 offset-1 d-none d-lg-block">
                            <div class="row">
                                <div class="col-12 border border-4 text-center border-danger">
                                    <div class="row">
                                        <div class="col-12">
                                            <h1 class="form-label fw-bold">SUMMERY</h1>
                                            <label class="form-label fs-5">Cart total :</label></br>
                                            <label class="form-label fw-bold fs-3">Rs 353 500 .00</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 border border-3 border-warning mt-2">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label">Payment methods</label></br>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-3"><img src="resources/images/payment/visa_img.png" style="width:50px; height:auto;"></div>
                                                <div class="col-3"><img src="resources/images/payment/paypal_img.png" style="width:50px; height:auto;"></div>
                                                <div class="col-3"><img src="resources/images/payment/mastercard_img.png" style="width:50px; height:auto;"></div>
                                                <div class="col-3"><img src="resources/images/payment/american_express_img.png" style="width:50px; height:auto;"></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <hr />
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fs-3 fw-bold">Buyer Protection</label></br>
                                            <label class="form-label"> Get full refund if the item is not as described or if is not delivered</label></br>
                                        </div>
                                    </div>
                                </div>
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
                                    <a href="sign.php"><button class="btn btn-success" onclick="goToLoginPage();">Go to Login Page</button></a>
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