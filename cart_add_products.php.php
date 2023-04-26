<?php

require("connection.php");
session_start();

$id = $_POST["p_id"];
$p_color = $_POST["color"];
$p_size = $_POST["size"];
$p_qty = $_POST["qty"];

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];

    if (!is_numeric($id)) {
        echo ("SomeThing Wrong");
    }
    // color
    else if (!is_numeric($p_color)) {
        echo ("Please Select Color !");
    }
    // size
    else if (!is_numeric($p_size)) {
        echo ("Please Select Size !");
    }
    // qty 
    else if (empty($p_qty)) {
        echo ("Please Enter qty !");
    } else if (!is_numeric($p_qty)) {
        echo ("Wrong Select qty !");
    } else {

        date_default_timezone_set('Asia/colombo');
        $date = date('d-m-y h:i:s');

        $rs_1 = Database::search("SELECT * FROM `products_color` WHERE `products_id` = '" . $id . "' AND `color_id` = '" . $p_color . "' ");
        $data_1 = $rs_1->fetch_assoc();
        $color_id = $data_1["id"];

        $rs_2 = Database::search("SELECT * FROM `products_size` WHERE `products_id` = '" . $id . "' AND `size_id` = '" . $p_size . "' ");
        $data_2 = $rs_2->fetch_assoc();
        $size_id = $data_2["id"];

        $rs_3 = Database::search("SELECT * FROM `cart` WHERE 
        `user_id` = '" . $user["id"] . "' AND  
        `products_id` = '" . $id . "' AND  
        `products_color_id` = '" . $color_id . "' AND
        `products_size_id` = '" . $size_id . "' ");

        if ($rs_3->num_rows != 0) {
            echo ("Alredy This Iteam In your cart");
        } else {

            $rs_4 = Database::search("SELECT * FROM `products` WHERE `id` = '" . $id . "' ");
            $data_4 = $rs_4->fetch_assoc();

            if ($data_4["qty"] < $p_qty) {
                echo ("You can buy Max " . $data_4["qty"] .  "qty");
            } else {

                Database::iud("INSERT INTO `cart`(`user_id`,`products_id`,`add_date`,`qty`,`products_color_id`,`products_size_id`)
                VALUES('" . $user["id"] . "','" . $id . "','" . $date . "','" . $p_qty . "','" . $color_id . "','" . $size_id . "')");

                $new_qty = $data_4["qty"] - $p_qty;

                Database::iud("UPDATE `products` SET `qty` = '" . $new_qty . "' WHERE `id` =  '" . $id . "' ");

                echo ("success");
            }
        }



        // echo ("success");
    }
} else if (isset($_SESSION["admin"])) {
    echo ("Admin Cant Add Iteam Cart");
} else {
    echo ("login");
}
