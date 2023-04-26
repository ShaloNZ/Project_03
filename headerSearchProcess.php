<?php
require "connection.php";
session_start();
$text = $_GET["text"];

if (empty($text)) {
    echo ("empty");
} else if (strlen($text) > 100) {
    echo ("User Name must have LESS THAN 100 characters!");
} else {

?>

    <div class="col-12 mt-2">
        <div class="row">
            <?php

            $rs_1 = Database::search("SELECT * FROM `products` WHERE `title` LIKE '%" . $text . "%' ");
            $rs_2 = Database::search("SELECT * FROM `category_2` WHERE `name`   LIKE '%" . $text . "%' ");
            $rs_3 = Database::search("SELECT * FROM `category_1` WHERE `name`   LIKE '%" . $text . "%' ");

            if ($rs_1->num_rows != 0) {
                for ($x = 0; $rs_1->num_rows > $x; $x++) {
                    $data_1 = $rs_1->fetch_assoc();
            ?>
                    <div class="col-12 mb-2 col-lg-3">
                        <div class="row g-2">
                            <?php $image_1_rs = Database::search("SELECT * FROM `image` WHERE `products_id` = '" . $data_1['id'] . "' ");
                            $image_1_name = $image_1_rs->fetch_assoc();
                            ?>
                            <a href="single_product_view.php?id=<?php echo ($data_1['id']) ?>"><img style="height:500px;" src="<?php echo ($image_1_name["name"]) ?>" class="card-img-top" alt="Loading"></a>
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
            } else if ($rs_2->num_rows != 0) {
                $data_2 = $rs_2->fetch_assoc();
                $rs_4 = Database::search("SELECT * FROM `products` WHERE `category_2_id` = '" . $data_2["id"] . "' ");
                for ($x = 0; $rs_4->num_rows > $x; $x++) {
                    $data_4 = $rs_4->fetch_assoc();
                ?>
                    <div class="col-12 mb-2 col-lg-3">
                        <div class="row g-2">
                            <?php $image_1_rs = Database::search("SELECT * FROM `image` WHERE `products_id` = '" . $data_4['id'] . "' ");
                            $image_1_name = $image_1_rs->fetch_assoc();
                            ?>
                            <a href="single_product_view.php?id=<?php echo ($data_4['id']) ?>"><img style="height:500px;" src="<?php echo ($image_1_name["name"]) ?>" class="card-img-top" alt="Loading"></a>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-10">
                                        <p class="card-title text-uppercase"><?php echo ($data_4["title"]) ?></p>
                                        <p class="card-title text-primary fw-bold fs-5">LKR&nbsp;<?php echo ($data_4["price"]) ?></p>
                                    </div>
                                    <div class="col-2 text-center text-danger fs-4"><i onclick="add_wish_list(<?php echo ($data_4['id']) ?>)" class="bi bi-bag-heart-fill fs-4"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else if ($rs_3->num_rows != 0) {
                echo ("helo");
            } else if ($rs_1->num_rows == 0 && $rs_2->num_rows == 0 && $rs_3->num_rows == 0)
                echo ("No Search Iteam");
            ?>




        </div>
    </div>

<?php

}
