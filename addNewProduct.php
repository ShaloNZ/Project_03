<!doctype html>
<html lang="en">

<head>
    <title>Shalom | Add New Product</title>
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

                include "admin_profile.php";

                if (isset($_SESSION["adminNew"])) {
                ?>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 border border-3 border-warning mt-3 mb-3">

                                <div class="col-12">
                                    <div class="row g-2">

                                        <div class="col-12 text-center mt-5">
                                            <h1 class="text-uppercase fw-bold">Add New Product</h1>
                                        </div>

                                        <div class="col-12">
                                            <hr class="border border-2 border-warning" />
                                        </div>

                                        <div class="col-12" id="add_Product_Alert"></div>


                                        <div class="col-12">
                                            <label>Enter Product Title/Name</label>
                                            <input class="form-control" type="text" id="title" />
                                        </div>

                                        <div class="col-12">
                                            <hr />
                                        </div>

                                        <div class="col-12">
                                            <div class="row g-2">
                                                <div class="col-12"> <label>Add A Brand</label></div>
                                                <div class="col-12 col-lg-6">
                                                    <select class="form-select text-uppercase" id="brand_selector">
                                                        <option value="brand">Select Brand</option>
                                                        <?php
                                                        $rs_4 = Database::search("SELECT * FROM `brand`");
                                                        for ($z = 0; $z < $rs_4->num_rows; $z++) {
                                                            $data_4 = $rs_4->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo ($data_4["id"]); ?>"><?php echo ($data_4["name"]); ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <div class="row">
                                                        <div class="col-7"> <input class="form-control" type="text" id="add_new_brand"></div>
                                                        <div class="col-5 d-grid"><button class="btn btn-warning" onclick="Add_new_Brand();">Add New Brand</button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <hr />
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <select class="form-select text-uppercase" id="gender_selector">
                                                        <option value="gender">Select Gender</option>
                                                        <?php
                                                        $rs_1 = Database::search("SELECT * FROM `gender`");
                                                        for ($x = 0; $x < $rs_1->num_rows; $x++) {
                                                            $data_1 = $rs_1->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo ($data_1["id"]); ?>"><?php echo ($data_1["name"]); ?></option>

                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-6 d-grid"><button onclick="set_gender()" class="btn btn-warning">Set Gender</button></div>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <select class="form-select text-uppercase" id="Category_1_slector">
                                                        <option class="Category_1_slector">Please Select Category 1</option>
                                                        <!-- <option>Select Category_1</option> -->
                                                    </select>
                                                </div>
                                                <div class="col-6 d-grid"><button onclick="set_Category_2()" class="btn btn-warning">Set Category_1</button></div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <select class="form-select text-uppercase" id="Category_2_slector">
                                                        <option class="Category_2_slector">Please Select Category 2</option>
                                                        <!-- <option>Select Category_2</option> -->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <hr />
                                        </div>


                                        <div class="col-12">
                                            <div class="row g-2">
                                                <div class="col-12"><label>Set Color</label></div>
                                                <div class="col-12 col-lg-6">
                                                    <select class="form-select text-uppercase" id="color_selector">
                                                        <option class="color">Please Select Color</option>
                                                        <?php
                                                        $rs_3 = Database::search("SELECT * FROM `color`");
                                                        for ($x = 0; $x < $rs_3->num_rows; $x++) {
                                                            $data_3 = $rs_3->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo ($data_3["id"]); ?>"><?php echo ($data_3["name"]); ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <div class="row">
                                                        <div class="col-7"> <input class="form-control" type="text" id="add_new_color"></div>
                                                        <div class="col-5 d-grid"><button class="btn btn-warning" onclick="Add_new_Color();"> New Color</button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <hr />
                                        </div>


                                        <div class="col-12">
                                            <div class="row g-2">
                                                <div class="col-12"><label>Set A Size</label></div>
                                                <div class="col-12 col-lg-6">
                                                    <select class="form-select text-uppercase" id="size_selector">
                                                        <option value="size">Please Select Size</option>
                                                        <?php
                                                        $rs_5 = Database::search("SELECT * FROM `size`");
                                                        for ($x = 0; $x < $rs_5->num_rows; $x++) {
                                                            $data_5 = $rs_5->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo ($data_5["id"]); ?>"><?php echo ($data_5["name"]); ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <div class="row">
                                                        <div class="col-7"><input class="form-control" type="text" id="add_new_size"></div>
                                                        <div class="col-5 d-grid"><button class="btn btn-warning" onclick="Add_new_Size();"> New Size</button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <hr />
                                        </div>

                                        <div class="col-12">
                                            <label>Qty</label>
                                            <input class="form-control" type="text" id="qty" />
                                        </div>

                                        <div class="col-12">
                                            <hr />
                                        </div>


                                        <div class="col-12">
                                            <label>Price</label>
                                            <input class="form-control" type="text" id="price" />
                                        </div>

                                        <div class="col-12">
                                            <hr />
                                        </div>


                                        <div class="col-12">
                                            <label>Description</label>
                                            <textarea class="form-control" type="text" id="description"></textarea>
                                        </div>

                                        <div class="col-12">
                                            <hr />
                                        </div>


                                        <div class="col-12">
                                            <input class="form-control" multiple type="file" id="image">
                                        </div>

                                        <div class="col-12">
                                            <hr />
                                        </div>


                                        <div class="col-12 d-grid mb-5">
                                            <div class="row g-3">
                                                <div class="col-6 col-lg-3 d-grid"><button class="btn btn-danger" onclick="clearDate();"><i class="bi bi-x-circle"></i>&nbsp;Clear Form</button></div>
                                                <div class="col-6 col-lg-3  d-grid"><button class="btn btn-warning"><i class="bi bi-cloud-download-fill"></i>&nbsp;Save & Draft</button></div>
                                                <div class="col-12 col-lg-6  d-grid"><button class="btn btn-primary" onclick="Add_new_Product();"><i class="bi bi-bag-plus-fill"></i>&nbsp;Add New Product</button></div>
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

                <?php
                }
                ?>



            </div>
        </div>
    </div>


    <script src="script.js"></script>
</body>

</html>