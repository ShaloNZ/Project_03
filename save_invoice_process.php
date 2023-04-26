<?php

session_start();
require "connection.php";

$user_id = $_POST["user_id"];
$p_id = $_POST["p_id"];
$order_id = $_POST["order_id"];
$amount = $_POST["p_amount"];
$qty = $_POST["p_qty"];
$size = $_POST["p_size"];
$color = $_POST["p_color"];

if ($_SESSION = "user") {

    $product_rs = Database::search("SELECT * FROM `products` WHERE `id`='" . $p_id . "'");
    $product_data = $product_rs->fetch_assoc();

    $current_qty = $product_data["qty"];
    $new_qty = $current_qty - $qty;

    Database::iud("UPDATE `products` SET `qty`='" . $new_qty . "' WHERE `id`='" . $p_id . "'");

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `orders`(`user_id`,`products_id`,`buy_date`,`price`,`qty`,`invoice_id`,`color_id`,`size_id`) VALUES 
    ('" . $user_id . "','" . $p_id . "','" . $date . "','" . $amount . "','" . $qty . "','" . $order_id . "','" . $color . "','" . $size . "')");


    $rs_1 = Database::search("SELECT * FROM `orders` ORDER BY `id` DESC ");
    $data_1 = $rs_1->fetch_assoc();

    echo ($data_1["id"]);
}
