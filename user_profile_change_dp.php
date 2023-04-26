<?php

session_start();
require "connection.php";

$image = $_FILES["image"];

if ($_SESSION["user"]) {
    $user = $_SESSION["user"];

    $rs_1 = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "' ");
    $data_1 = $rs_1->fetch_assoc();

    if (empty($_FILES["image"])) {
        echo ("Please Select A Picture");
    } else  if ($image["type"] == "png") {
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


    $new_path = "./user_dp/" . $data_1["user_name"] . " " . uniqid() . $image_type;
    move_uploaded_file($image["tmp_name"], $new_path);

    $rs_3 = Database::iud("UPDATE `user` SET `user_dp`='" . $new_path . "' WHERE `id` = '" . $user["id"] . "' ");

    echo ("success");
}
