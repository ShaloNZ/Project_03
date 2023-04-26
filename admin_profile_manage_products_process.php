<?php
require "connection.php";
$p_id = $_GET["id"];

$cu_rs_1 = Database::search("SELECT * FROM `products` WHERE `id`='" . $p_id . "'");
$cu_data_1 = $cu_rs_1->fetch_assoc();
?>

<div class="container-fluid">
    <div class="col-12">
        <div class="row">

            <div class="col-12">
                <div class="row">

                    <div class="col-12 mt-2 text-center">
                        <div class="row g-2">
                            <div class="All_hover col-6 col-lg-3 border border-1"><label class="p-2">Update Products Details</label></div>
                            <div class="All_hover col-6 col-lg-3 border border-1"><label class="p-2">Delet Products</label></div>
                            <div class="All_hover col-6 col-lg-3 border border-1"><label class="p-2">Deactive Products</label></div>
                            <div class="All_hover col-6 col-lg-3 border border-1"><label class="p-2">Mark As Out Of Stock</label></div>
                            <!-- <div class="All_hover col-2"><label class="p-2">orders</label></div> -->
                        </div>
                    </div>

                    <div class="col-12 col-lg-8 offset-lg-2 border border-3 border-warning mt-3 mb-3">
                        <div class="row g-2">

                            <div class="col-12 text-center mt-5">
                                <h1 class="text-uppercase fw-bold">Update Product</h1>
                            </div>

                            <div class="col-12">
                                <hr class="border border-2 border-warning" />
                            </div>

                            <div class="col-12" id="add_Product_Alert"></div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label>Current Title/Name</label>
                                        <input class="form-control" type="text" value="<?php echo ($cu_data_1["title"]) ?>" disabled />
                                    </div>
                                    <div class="col-12">
                                        <label>Enter Product Title/Name</label>
                                        <input class="form-control" type="text" id="title" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr />
                            </div>

                            <div class="col-12">
                                <div class="row g-2">
                                    <div class="col-6">
                                        <?php
                                        $cu_rs_2 = Database::search("SELECT * FROM `brand` WHERE `id` ='" . $cu_data_1["brand_id"] . "' ");
                                        $cu_data_2 = $cu_rs_2->fetch_assoc();
                                        ?>
                                        <label>Current Brand</label>
                                        <input class="form-control text-uppercase" type="text" value="<?php echo ($cu_data_2["name"]) ?>" disabled />
                                    </div>
                                    <div class="col-6 col-lg-6">
                                        <label>Select New Brand</label>
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
                                </div>
                            </div>

                            <div class="col-12">
                                <hr />
                            </div>

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-5">
                                        <?php
                                        $cu_rs_3 = Database::search("SELECT * FROM `category_2` WHERE `id` ='" . $cu_data_1["category_2_id"] . "' ");
                                        $cu_data_3 = $cu_rs_3->fetch_assoc();
                                        ?>
                                        <label>Current Category _02</label>
                                        <input class="form-control text-uppercase" type="text" value="<?php echo ($cu_data_3["name"]) ?>" disabled />
                                    </div>

                                    <div class="col-4">
                                        <?php
                                        $cu_rs_4 = Database::search("SELECT * FROM `category_1` WHERE `id` ='" . $cu_data_3["category_1_id"] . "' ");
                                        $cu_data_4 = $cu_rs_4->fetch_assoc();
                                        ?>
                                        <label>Current Category _01</label>
                                        <input class="form-control text-uppercase" type="text" value="<?php echo ($cu_data_4["name"]) ?>" disabled />
                                    </div>

                                    <div class="col-3">
                                        <?php
                                        $cu_rs_5 = Database::search("SELECT * FROM `gender` WHERE `id` ='" . $cu_data_4["gender_id"] . "' ");
                                        $cu_data_5 = $cu_rs_5->fetch_assoc();
                                        ?>
                                        <label>Current Gender</label>
                                        <input class="form-control text-uppercase" type="text" value="<?php echo ($cu_data_5["name"]) ?>" disabled />
                                    </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <hr />
                            </div>

                            <div class="col-col-12 col-lg-6">
                                <div class="row">
                                    <?php
                                    $cu_rs_6 = Database::search("SELECT * FROM `products_color` WHERE `products_id` ='" . $cu_data_1["id"] . "' ");
                                    for ($xx = 0; $xx < $cu_rs_6->num_rows; $xx++) {
                                        $cu_data_6 = $cu_rs_6->fetch_assoc();
                                        $cu_rs_7 = Database::search("SELECT * FROM `color` WHERE `id` ='" . $cu_data_6["color_id"] . "' ");
                                        $cu_data_7 = $cu_rs_7->fetch_assoc();
                                    ?>
                                        <div class="col-2">
                                            <input class="form-control text-uppercase" value="<?php echo ($cu_data_7["name"]) ?>" disabled />
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="row g-2">
                                    <div class="col-12"><label>Set Color</label></div>
                                    <div class="col-12">
                                        <select class="form-select" id="color_selector">
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
                                </div>
                            </div>

                            <div class="col-12">
                                <hr />
                            </div>
                            <div class="col-col-12 col-lg-6">
                                <div class="row">
                                    <?php
                                    $cu_rs_8 = Database::search("SELECT * FROM `products_size` WHERE `products_id` ='" . $cu_data_1["id"] . "' ");
                                    for ($xx = 0; $xx < $cu_rs_8->num_rows; $xx++) {
                                        $cu_data_8 = $cu_rs_8->fetch_assoc();
                                        $cu_rs_9 = Database::search("SELECT * FROM `size` WHERE `id` ='" . $cu_data_8["size_id"] . "' ");
                                        $cu_data_9 = $cu_rs_9->fetch_assoc();
                                    ?>
                                        <div class="col-2">
                                            <input class="form-control text-uppercase" value="<?php echo ($cu_data_9["name"]) ?>" disabled />
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="col-col-12 col-lg-6">
                                <div class="row g-2">
                                    <div class="col-12"><label>Set A Size</label></div>
                                    <div class="col-12">
                                        <select class="form-select" id="size_selector">
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
                                </div>
                            </div>

                            <div class="col-12">
                                <hr />
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label>Current Qty</label>
                                        <input class="form-control text-uppercase" type="text" value="<?php echo ($cu_data_1["qty"]) ?>" disabled />
                                    </div>
                                    <div class="col-12">
                                        <label>Qty</label>
                                        <input class="form-control" type="text" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr />
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label>Current Price (LKR.)</label>
                                        <input class="form-control text-uppercase" type="text" value="<?php echo ($cu_data_1["price"]) ?>" disabled />
                                    </div>
                                    <div class="col-12">
                                        <label>Price (LKR.)</label>
                                        <input class="form-control" type="text" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr />
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label>Current Description</label>
                                        <input class="form-control text-uppercase" type="text" value="<?php echo ($cu_data_1["description"]) ?>" disabled />
                                    </div>
                                    <div class="col-12">
                                        <label>Description</label>
                                        <input class="form-control" type="text" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr />
                            </div>

                            <div class="col-12">
                                <label>Add a New Photo</label>
                                <input class="form-control" multiple type="file" id="image">
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <?php
                                    $cu_rs_10 = Database::search("SELECT * FROM `image` WHERE `products_id` ='" . $cu_data_1["id"] . "' ");
                                    for ($x = 0; $x < $cu_rs_10->num_rows; $x++) {
                                        $cu_data_10 = $cu_rs_10->fetch_assoc();
                                    ?>
                                        <div class="col-lg-3 col-6 border border-1"><img style="height:300px;" src="<?php echo ($cu_data_10["name"]) ?>" /></div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="col-12 d-grid mt-3 mb-2">
                                <div class="row g-3">
                                    <!-- <div class="col-6 col-lg-3 d-grid"><button class="btn btn-danger" onclick="clearDate();"><i class="bi bi-x-circle"></i>&nbsp;Clear Form</button></div> -->
                                    <div class="col-12 col-lg-6  d-grid"><button class="btn btn-warning"><i class="bi bi-cloud-download-fill"></i>&nbsp;Data Restore</button></div>
                                    <div class="col-12 col-lg-6  d-grid"><button class="btn btn-primary" onclick="admin_update_products(<?php echo ($cu_data_1['id']) ?>);"><i class="bi bi-bag-plus-fill"></i>&nbsp;Update Product</button></div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>