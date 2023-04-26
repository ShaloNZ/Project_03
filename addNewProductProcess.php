<?php

require "connection.php";

$title = $_POST["title"];
$brand_selector = $_POST["brand_selector"];
$Category_2_slector = $_POST["Category_2_slector"];
$color_selector = $_POST["color_selector"];
$size_selector = $_POST["size_selector"];
$qty = $_POST["qty"];
$price = $_POST["price"];
$description = $_POST["description"];



// title
if (empty($title)) {
    echo ("Please enter Title");
} else if (strlen($title) > 50) {
    echo ("Title must have LESS THAN 50 characters!");
} else if (!preg_match("/[a-zA-z]/", $title)) {
    echo ("Title must have Include charecters!");
}
// brand_selector
else if (!is_numeric($brand_selector)) {
    echo ("Please Select Brand Name !");
}
// Category_2_slector
else if (!is_numeric($Category_2_slector)) {
    echo ("Please Select Category !");
}
// color_selector
else if (!is_numeric($color_selector)) {
    echo ("Please Select Color !");
}
// size_selector
else if (empty($size_selector)) {
    echo ("Please Select Size !");
} else if (!is_numeric($size_selector)) {
    echo ("Please Select Size !");
}
// qty
else if (empty($qty)) {
    echo ("Please Enter Qty !");
} else if (!is_numeric($qty)) {
    echo ("Qty Does Not Mactch !");
}
// price
elseif (empty($price)) {
    echo ("Please Enter Price");
} elseif (!is_numeric($price)) {
    echo ("Price Does Not Mactch");
} // description
else if (strlen($description) > 500) {
    echo ("Title must have LESS THAN 500 characters!");
} //images
else if (sizeof($_FILES) != 3) {
    echo ("Should add 3 pictures !");
} else {

    date_default_timezone_set('Asia/colombo');
    $date = date('d-m-y h:i:s');

    $rs_1 = Database::iud("INSERT INTO `products`(`title`,`price`,`qty`,`description`,`add_date`,`status_id`,`brand_id`,`category_2_id`,`stock_id`)
    VALUES('" . $title . "','" . $price . "','" . $qty . "','" . $description . "','" . $date . "','1','1','" . $Category_2_slector . "','1')");

    $countfiles = sizeof($_FILES);

    for ($x = 0; $x < $countfiles; $x++) {
        $image = $_FILES["image" . $x];

        if ($image["type"] == "png") {
            $image_type = ".png";
            //
        } else if ($image["type"] == "image/jpg") {
            $image_type = ".jpg";
            //
        } else if ($image["type"] == "image/jpeg") {
            $image_type = ".jpeg";
            //
        } else if ($image["type"] == "image/WebP") {
            $image_type = ".WebP";
            //
        } else if ($image["type"] == "video/mp4") {
            echo ("Cant Uploade Video");
            //
        } else {
            echo ("Invalid Image Type");
        }

        $rs_2 = Database::search("SELECT *FROM `products` ORDER BY id DESC LIMIT 1");
        $data_2 = $rs_2->fetch_assoc();

        $new_path = "./selling_Iteam_pic/" . $title . " " . uniqid() . $image_type;
        move_uploaded_file($image["tmp_name"], $new_path);

        $rs_3 = Database::iud("INSERT INTO `image`(`name`,`products_id`)VALUES('" . $new_path . "','" . $data_2["id"] . "')  ");
    }

    $rs_4 = Database::iud("INSERT INTO `products_color`(`products_id`,`color_id`)VALUES('" .  $data_2["id"] . "','" . $color_selector . "')  ");

    $rs_5 = Database::iud("INSERT INTO `products_size`(`products_id`,`size_id`)VALUES('" .  $data_2["id"] . "','" . $size_selector . "')  ");

    echo ("success");
}
