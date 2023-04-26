<!doctype html>
<html lang="en">

<?php session_start();
$id = $_GET["id"];
require "connection.php";
?>

<head>
    <title>Shalom | Invoice </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


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
                if (isset($_SESSION["user"])) {
                ?>

                    <div class="col-12"><a href="user_profile.php"><i class="bi bi-arrow-left fs-1 fw-bold text-primery"></i></a></div>

                    <div class="col-12 col-lg-10 offset-1">
                        <div class="row">
                            <div class="col-12 border border-3 border-primary mt-3 mb-3 p-0 p-lg-4">
                                <div class="row">

                                    <?php
                                    $rs_1 = Database::search("SELECT * FROM `orders` WHERE `id` = '" . $id . "' ");
                                    $data_1 = $rs_1->fetch_assoc();
                                    $rs_2 = Database::search("SELECT * FROM `user` WHERE `id` = '" . $data_1["user_id"] . "' ");
                                    $data_2 = $rs_2->fetch_assoc();
                                    $rs_3 = Database::search("SELECT * FROM `products` WHERE `id` = '" . $data_1["products_id"] . "' ");
                                    $data_3 = $rs_3->fetch_assoc();
                                    ?>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6 mt-3">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <img src="resources/logo_and_images/logo.webp" style="height:100px;" class="logo" />
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <!-- <label class="form-label fs-4">ShaloM Fashion</label></br> -->
                                                        <label class="form-label">110, 01/01 Mirigama</label></br>
                                                        <label class="form-label">Gampaha</label></br>
                                                        <label class="form-label">Sri Lanka</label></br>
                                                        <label class="form-label">071 9850755</label></br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 text-end mt-3">
                                                <h2 class="fw-bold">Tax Invoice</h2>
                                            </div>
                                            <div class="col-12">
                                                <hr class="border border-1 border-dark" />
                                            </div>

                                            <div class="col-12 mb-4">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label class="from-label fw-bold">Bill To</label>
                                                            </div>
                                                            <div class="col-6 text-end">
                                                                <label><?php echo ($data_2["user_name"]) ?></label></br>
                                                                <?php
                                                                $rs_4 = Database::search("SELECT * FROM `address` WHERE `user_id` = '" . $data_2["id"] . "' ");
                                                                $data_4 = $rs_4->fetch_assoc();
                                                                ?>
                                                                <label><?php echo ($data_4["line1"]) ?></label>&nbsp;&nbsp;<label><?php echo ($data_4["line2"]) ?></label></br>
                                                                <?php
                                                                $rs_5 = Database::search("SELECT * FROM `city` WHERE `id` = '" . $data_4["city_id"] . "' ");
                                                                $data_5 = $rs_5->fetch_assoc();
                                                                //
                                                                $rs_6 = Database::search("SELECT * FROM `color` WHERE `id` = '" . $data_1["color_id"] . "' ");
                                                                $data_6 = $rs_6->fetch_assoc();
                                                                //
                                                                $rs_7 = Database::search("SELECT * FROM `size` WHERE `id` = '" . $data_1["size_id"] . "' ");
                                                                $data_7 = $rs_7->fetch_assoc();
                                                                ?>
                                                                <label><?php echo ($data_5["name"]) ?></label></br>
                                                                <label>Sri Lanka</label></br>
                                                                <label><?php echo ($data_2["mobile"]) ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 offset-lg-2 col-lg-4">
                                                        <div class="row">
                                                            <div class="col-5">
                                                                <label class="form-label fw-bold">Invoice no : </label></br>
                                                                <label class="form-label fw-bold">Date : </label></br>
                                                            </div>
                                                            <div class="col-7">
                                                                <label class="form-label"><?php echo ($data_1["invoice_id"]) ?></label></br>
                                                                <label class="form-label"><?php echo ($data_1["buy_date"]) ?></label></br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12  mt-3">
                                                        <div class="row">
                                                            <div class="col-1 border border-1 border-dark fw-bold">no</div>
                                                            <div class="col-3 border border-1 border-dark fw-bold">Products</div>
                                                            <div class="col-2 border border-1 border-dark fw-bold">Quantity</div>
                                                            <div class="col-3 border border-1 border-dark fw-bold">Unit Price</div>
                                                            <div class="col-3 border border-1 border-dark fw-bold">Amount</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-1 border border-1 border-dark fw-bold"><?php echo ($data_1["id"]) ?></div>
                                                            <div class="col-3 border border-1 border-dark text-uppercase">
                                                                <p><?php echo ($data_3["title"]) ?></p>
                                                                <p>color :&nbsp;<?php echo ($data_6["name"]) ?></p>
                                                                <p>size :&nbsp;<?php echo ($data_7["name"]) ?></p>
                                                            </div>
                                                            <div class="col-2 border border-1 border-dark text-center"><?php echo ($data_1["qty"]) ?></div>
                                                            <div class="col-3 border border-1 border-dark"><?php echo ($data_3["price"]) ?>&nbsp;LKR</div>
                                                            <div class="col-3 border border-1 border-dark text-end"><?php echo ($data_1["qty"]) ?>&nbsp;*&nbsp;<?php echo ($data_3["price"]) ?>&nbsp;LKR</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="offset-6 col-3 border border-1 border-dark fw-bold p-2">SUBTOTAL</div>
                                                            <div class="col-3 border border-1 border-dark text-end p-2"><?php echo ($data_1["price"]) ?>&nbsp;LKR</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="offset-6 col-3 text-uppercase border border-1 border-dark fw-bold  p-2">Delivery Fee</div>
                                                            <div class="col-3 border border-1 border-dark text-end p-2">FREE</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="offset-6 col-3 border border-1 border-dark fw-bold p-2">GRAND TOTAL</div>
                                                            <div class="col-3 border border-1 border-dark text-end p-2"><?php echo ($data_1["price"]) ?>&nbsp;LKR</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <hr class="border border-1 border-dark" />
                                            </div>

                                            <div class="col-12 text-center mb-3">
                                                <label class="form-label">Invoice was created on a computer and is valid without the Signature and Seal.</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <div class="row">
                                            <div class="offset-lg-6 col-6 col-lg-3 d-grid">
                                                <button class="btn btn-warning"><i class="bi bi-printer-fill me-2 text-white fs-6"></i>Print</button>
                                            </div>
                                            <div class="col-6 col-lg-3 d-grid">
                                                <button class="btn btn-primary"><i class="bi bi-filetype-pdf me-2 text-white fs-6"></i>Export as PDF</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 d-grid mb-4">
                                <a href="user_profile.php" class="d-grid text-decoration-none">
                                    <button class="btn btn-outline-primary"><i class="bi bi-arrow-left fs-6 fw-bold text-primery"></i>&nbsp;&nbsp;Back To Order</button>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php
                } else {
                ?>
                    <h1>Login First</h1>
                <?php
                }
                ?>

            </div>
        </div>
    </div>


    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>