<!doctype html>
<html lang="en">

<?php session_start() ?>

<head>
    <title>Shalom | Product List </title>
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


                <div class="col-12">
                    <?php include "header.php"; ?>

                </div>

                <div class="col-12">
                    <div class="row">

                        <?php
                        if (isset($_GET["id"])) {
                            $p_id = $_GET["id"];

                            $rs_1 = Database::search("SELECT * FROM `products` WHERE `category_2_id` = '" . $p_id . "' ");

                            if ($rs_1->num_rows == 0) {
                        ?>

                                <div class="col-12 offset-lg-4 col-lg-4 border border-1 border-danger mt-5 mb-4 ">
                                    <div class="row">
                                        <div class=" col-10 offset-1 text-center mt-5 mb-5">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="text-black">Not Prduct Availbe This Category.</p>
                                                </div>
                                                <div class="col-12 d-grid"><button class="btn btn-primary" onclick="Gohome();">HOME</button></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            } else {

                                for ($x = 0; $rs_1->num_rows > $x; $x++) {
                                    $data_1 = $rs_1->fetch_assoc();

                                    $rs_2 = Database::search("SELECT * FROM `image` WHERE `products_id` = '" . $data_1["id"] . "'");
                                    $data_2 = $rs_2->fetch_assoc();

                                ?>
                                    <div class="col-6 col-lg-3">
                                        <div class="card">
                                            <a href="single_product_view.php?id=<?php echo ($data_1['id']) ?>"><img style="height:450px;" src="<?php echo ($data_2["name"]) ?>" class="card-img-top" alt="..."></a>
                                            <div class="card-body">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <p class="card-title text-uppercase"><?php echo ($data_1["title"]) ?></p>
                                                            <p class="card-title text-warning">LKR&nbsp;<?php echo ($data_1["price"]) ?></p>
                                                        </div>
                                                        <div class="col-2 text-center text-danger fs-4"><i onclick="add_wish_list(<?php echo ($data_1['id']) ?>)" class="bi bi-bag-heart-fill fs-4"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            <?php

                                }
                            }
                        } else {
                            ?>
                            <h1>Some Thing Wrong</h1>
                        <?php
                        }
                        ?>
                    </div>
                </div>



            </div>
        </div>
    </div>


    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="script.js"></script>
</body>

</html>