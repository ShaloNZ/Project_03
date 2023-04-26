<?php

require("connection.php");
session_start();

$id = $_GET["id"];

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];

    if (empty($id)) {
        echo ("error");
    } else {
        Database::search("DELETE FROM `cart` WHERE `user_id` = '" . $user["id"] . "' AND `id`='" . $id . "' ");

        echo ("success");
    }
} else {
    echo ("login");
}
