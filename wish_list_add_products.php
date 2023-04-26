<?php

require("connection.php");
session_start();

$id = $_GET["id"];

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];

    if (empty($id)) {
        echo ("error");
    } else {
        $rs_1 = Database::search("SELECT * FROM `wishlist` WHERE `user_id` = '" . $user["id"] . "' AND `products_id`='" . $id . "' ");

        if ($rs_1->num_rows != 0) {
            echo ("Alredy This Iteam In your WishList");
        } else {

            date_default_timezone_set('Asia/colombo');
            $date = date('d-m-y h:i:s');

            $rs_3 = Database::iud("INSERT INTO `wishlist`(`user_id`,`products_id`,`add_date`)
            VALUES('" . $user["id"] . "','" . $id . "','" . $date . "') ");

            echo ("success");
        }
    }
} else if (isset($_SESSION["admin"])) {
    echo ("Admin Cant Add Iteam WishList");
} else {
    echo ("You have to Login First Before Add Iteam in your WishList");
}
