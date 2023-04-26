<!doctype html>
<html lang="en">
<?php session_start() ?>

<head>
    <title>Shalom | Single Product View </title>
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

                <?php if (isset($_GET["id"])) {
                ?>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <?php include "header.php";
                                $p_id = $_GET["id"];
                                $rs_1 = Database::search("SELECT * FROM `products` WHERE `id` = '" . $p_id . "' ");
                                $data_1 = $rs_1->fetch_assoc();
                                ?>
                            </div>

                            <div class="col-12">
                                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">category</li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo $data_1["title"] ?></li>
                                    </ol>
                                </nav>
                            </div>

                            <div class="col-12 col-lg-8 offset-lg-2 border border-2">
                                <div class="row">

                                    <div class="col-7 bg-black col-lg-5 p-3 border-end">
                                        <div class="row">

                                            <div id="carouselExample" class="carousel slide">
                                                <div class="carousel-inner">
                                                    <?php
                                                    $rs_2 = Database::search("SELECT * FROM `image` WHERE `products_id` = '" . $data_1["id"] . "' ");
                                                    for ($x = 0; $x < $rs_2->num_rows; $x++) {

                                                        $data_2 = $rs_2->fetch_assoc();
                                                    ?>
                                                        <div class="carousel-item active">
                                                            <img src="<?php echo ($data_2["name"]) ?>" class="d-block" alt="...">
                                                        </div>

                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12 col-lg-7 p-3 text-secondary">
                                        <div class="row g-3">
                                            <div class="col-12 d-block d-lg-none">
                                                <hr class="border border-1" />
                                            </div>
                                            <div class="col-12">
                                                <h1 class="text-uppercase"><?php echo $data_1["title"] ?></h1>
                                            </div>
                                            <div class="col-12"><label class="form-label"><i class="bi bi-cash fs-5"></i>&nbsp;Cash on Delivery</label></div>
                                            <div class="col-12"><label class="form-label"><i class="bi bi-arrow-repeat fs-5"></i>&nbsp;Easy Exchange & Refund Policy</label></div>
                                            <div class="col-12"><label class="form-label"><i class="bi bi-truck fs-5"></i>&nbsp;Island Wide Delivery</label></div>
                                            <div class="col-12"><label class="form-label">Availbe Qty : &nbsp; <?php echo $data_1["qty"] ?></label></div>
                                            <div class="col-12"><label class="form-label fs-4 text-primary fw-bold">LKR &nbsp; <?php echo $data_1["price"] ?></label></div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <select class="form-select" id="single_product_color">
                                                            <option value="color">Select Color</option>
                                                            <?php
                                                            $rs_3 = Database::search("SELECT * FROM `products_color` WHERE `products_id` = '" . $data_1["id"] . "' ");
                                                            for ($y = 0; $y < $rs_3->num_rows; $y++) {
                                                                $data_3 = $rs_3->fetch_assoc();
                                                                $rs_4 = Database::search("SELECT * FROM `color` WHERE `id` = '" . $data_3["color_id"] . "' ");
                                                                $data_4 = $rs_4->fetch_assoc();
                                                            ?>
                                                                <option value="<?php echo ($data_4['id']) ?>"><?php echo ($data_4["name"]) ?></option>

                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-4">
                                                        <select class="form-select" id="single_product_size">
                                                            <option value="size">Select Size</option>
                                                            <?php
                                                            $rs_5 = Database::search("SELECT * FROM `products_size` WHERE `products_id` = '" . $data_1["id"] . "' ");
                                                            for ($y = 0; $y < $rs_5->num_rows; $y++) {
                                                                $data_5 = $rs_5->fetch_assoc();
                                                                $rs_6 = Database::search("SELECT * FROM `size` WHERE `id` = '" . $data_5["size_id"] . "' ");
                                                                $data_6 = $rs_6->fetch_assoc();
                                                            ?>
                                                                <option value="<?php echo ($data_6['id']) ?>"><?php echo ($data_6["name"]) ?></option>

                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-4">
                                                        <input type="number" class="form-control" placeholder="Enter Quantity" id="single_product_qty" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-3 d-grid"><button class="btn btn-danger" onclick="add_wish_list(<?php echo ($p_id) ?>);"><i class="bi bi-bag-heart-fill"></i></button></div>
                                                    <div class="col-3 d-grid"><button class="btn btn-warning" onclick="add_cart_list(<?php echo ($p_id) ?>);"><i class="bi bi-cart-fill"></i></button></div>
                                                    <div class="col-6 d-grid"><button class="btn btn-primary" type="submit" id="payhere-payment" onclick="buy_now(<?php echo ($p_id) ?>);"><i class="bi bi-cash-coin"></i>&nbsp;Buy Now</button></div>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center"><label class="form-label"><?php echo $data_1["description"] ?></label></div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                } else {
                    echo ("Something went wrong");
                } ?>



            </div>
        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

</body>

</html>