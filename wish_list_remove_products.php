<?php

require("connection.php");
session_start();

$id = $_GET["id"];

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];

    if (empty($id)) {
        echo ("error");
    } else {
        Database::search("DELETE FROM `wishlist` WHERE `user_id` = '" . $user["id"] . "' AND `products_id`='" . $id . "' ");

        echo ("success");
    }
} else {
    echo ("login");
}
