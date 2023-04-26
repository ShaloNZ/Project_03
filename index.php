<!doctype html>
<html lang="en">
<?php session_start() ?>

<head>
    <title>Shalom | Home </title>
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

                <div class="col-12"><?php include "home_page_header.php" ?></div>

                <div class="col-12">
                    <div class="row" id="home_main_div">
                        <div class="col-12 text-white bg-primary">
                            <div class="row">
                                <div class="col-12 mt-2 mb-2">
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h1><i class="bi bi-truck fs-1"></i></h1>
                                                </div>
                                                <div class="col-12 fw-bold fs-4">Free Shipping</div>
                                                <div class="col-12">Delivered to your doorstep at no additional cost</div>
                                            </div>
                                        </div>

                                        <div class="col-4 text-center">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h1><i class="bi bi-arrow-clockwise fs-1"></i></h1>
                                                </div>
                                                <div class="col-12 fw-bold fs-4">Returns And Exchange Available</div>
                                                <div class="col-12">Don’t like it? We do exchanges within 7 days!Guarantee of Comfort and Quality</div>
                                            </div>
                                        </div>

                                        <div class="col-4 text-center">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h1><i class="bi bi-emoji-smile fs-1"></i></h1>
                                                </div>
                                                <div class="col-12 fw-bold fs-4">Guarantee of Comfort and Quality</div>
                                                <div class="col-12">Wear confidence, comfort and quality. Made to fit you!</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">

                                <div class="col-12 mt-3">
                                    <p class="fw-bold fs-1 text-danger">New Arrival</p>
                                </div>

                                <div class="col-12 mb-3">
                                    <div class="row g-2">
                                        <?php
                                        $rs_1 = Database::search("SELECT * FROM `products` ORDER BY `id` DESC ");
                                        for ($x = 11; $rs_1->num_rows > $x; $x++) {
                                            $data_1 = $rs_1->fetch_assoc();
                                            $rs_2 = Database::search("SELECT * FROM `image` WHERE `products_id` = '" . $data_1["id"] . "'");
                                            $data_2 = $rs_2->fetch_assoc();
                                        ?>
                                            <div class="col-12 mb-2 col-lg-3">
                                                <div class="row g-2">
                                                    <a href="single_product_view.php?id=<?php echo ($data_1['id']) ?>"><img style="height:500px;" src="<?php echo ($data_2["name"]) ?>" class="card-img-top" alt="Loading"></a>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <p class="card-title text-uppercase"><?php echo ($data_1["title"]) ?></p>
                                                                <p class="card-title text-primary fw-bold fs-5">LKR&nbsp;<?php echo ($data_1["price"]) ?></p>
                                                            </div>
                                                            <div class="col-2 text-center text-danger fs-4"><i onclick="add_wish_list(<?php echo ($data_1['id']) ?>)" class="bi bi-bag-heart-fill fs-4"></i></div>
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
                        </div>

                        <div class="col-12">
                            <hr />
                        </div>

                        <div class="col-12 d-none d-lg-block">
                            <div class="row g-0">
                                <div class="col-3">
                                    <video style="height:700px;" autoplay muted loop>
                                        <source src="resources/video_02.mp4" type="video/mp4">
                                    </video>
                                </div>
                                <div class="col-3">
                                    <video style="height:700px;" autoplay muted loop>
                                        <source src="resources/video_02.mp4" type="video/mp4">
                                    </video>
                                </div>
                                <div class="col-3">
                                    <video style="height:700px;" autoplay muted loop>
                                        <source src="resources/video_02.mp4" type="video/mp4">
                                    </video>
                                </div>
                                <div class="col-3">
                                    <video style="height:700px;" autoplay muted loop>
                                        <source src="resources/video_02.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <hr />
                        </div>

                        <div class="col-12 mt-3">
                            <div class="row">

                                <div class="col-12 text-center text-secondary">
                                    <h1 class="fw-bold">Men's Collection</h1>
                                </div>

                                <div class="col-12 mt-3">
                                    <div class="row g-3">
                                        <?php
                                        $rs_1 = Database::search("SELECT * FROM `products` WHERE `category_2_id` = '17' ");
                                        for ($x = 0; $rs_1->num_rows > $x; $x++) {
                                            $data_1 = $rs_1->fetch_assoc();
                                            $rs_2 = Database::search("SELECT * FROM `image` WHERE `products_id` = '" . $data_1["id"] . "'");
                                            $data_2 = $rs_2->fetch_assoc();
                                        ?>
                                            <div class="col-12 mb-2 col-lg-3">
                                                <div class="row g-2">
                                                    <a href="single_product_view.php?id=<?php echo ($data_1['id']) ?>"><img style="height:500px;" src="<?php echo ($data_2["name"]) ?>" class="card-img-top" alt="Loading"></a>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <p class="card-title text-uppercase"><?php echo ($data_1["title"]) ?></p>
                                                                <p class="card-title text-primary fw-bold fs-5">LKR&nbsp;<?php echo ($data_1["price"]) ?></p>
                                                            </div>
                                                            <div class="col-2 text-center text-danger fs-4"><i onclick="add_wish_list(<?php echo ($data_1['id']) ?>)" class="bi bi-bag-heart-fill fs-4"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr />
                                </div>

                                <div class="col-12">
                                    <h1 class="fw-bold text-center text-secondary">Women's Collection</h1>
                                </div>


                                <div class="col-12 mt-3">
                                    <div class="row g-3">
                                        <?php
                                        $rs_1 = Database::search("SELECT * FROM `products` WHERE `category_2_id` = '17' ");
                                        for ($x = 0; $rs_1->num_rows > $x; $x++) {
                                            $data_1 = $rs_1->fetch_assoc();
                                            $rs_2 = Database::search("SELECT * FROM `image` WHERE `products_id` = '" . $data_1["id"] . "'");
                                            $data_2 = $rs_2->fetch_assoc();
                                        ?>
                                            <div class="col-12 mb-2 col-lg-3">
                                                <div class="row g-2">
                                                    <a href="single_product_view.php?id=<?php echo ($data_1['id']) ?>"><img style="height:500px;" src="<?php echo ($data_2["name"]) ?>" class="card-img-top" alt="Loading"></a>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <p class="card-title text-uppercase"><?php echo ($data_1["title"]) ?></p>
                                                                <p class="card-title text-primary fw-bold fs-5">LKR&nbsp;<?php echo ($data_1["price"]) ?></p>
                                                            </div>
                                                            <div class="col-2 text-center text-danger fs-4"><i onclick="add_wish_list(<?php echo ($data_1['id']) ?>)" class="bi bi-bag-heart-fill fs-4"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr />
                                </div>

                                <div class="col-12">
                                    <h1 class="fw-bold text-center text-secondary">Kid's Collection</h1>
                                </div>

                                <div class="col-12 mt-3">
                                    <div class="row g-3">
                                        <?php
                                        $rs_1 = Database::search("SELECT * FROM `products` WHERE `category_2_id` = '17' ");
                                        for ($x = 0; $rs_1->num_rows > $x; $x++) {
                                            $data_1 = $rs_1->fetch_assoc();
                                            $rs_2 = Database::search("SELECT * FROM `image` WHERE `products_id` = '" . $data_1["id"] . "'");
                                            $data_2 = $rs_2->fetch_assoc();
                                        ?>
                                            <div class="col-12 mb-2 col-lg-3">
                                                <div class="row g-2">
                                                    <a href="single_product_view.php?id=<?php echo ($data_1['id']) ?>"><img style="height:500px;" src="<?php echo ($data_2["name"]) ?>" class="card-img-top" alt="Loading"></a>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <p class="card-title text-uppercase"><?php echo ($data_1["title"]) ?></p>
                                                                <p class="card-title text-primary fw-bold fs-5">LKR&nbsp;<?php echo ($data_1["price"]) ?></p>
                                                            </div>
                                                            <div class="col-2 text-center text-danger fs-4"><i onclick="add_wish_list(<?php echo ($data_1['id']) ?>)" class="bi bi-bag-heart-fill fs-4"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr />
                                </div>

                                <div class="col-10 offset-1 d-none d-lg-block">
                                    <video style="height:100vh;" autoplay muted loop>
                                        <source src="resources/video_01.mp4" type="video/mp4">
                                    </video>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <?php include "footer.php" ?>

            </div>
        </div>
    </div>



    <script src="script.js"></script>
</body>

</html>