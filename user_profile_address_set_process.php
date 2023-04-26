<?php

$line_1 = $_POST["line_01"];
$line_2 = $_POST["line_02"];
$city_1 = $_POST["city"];
$post_code = $_POST["post_code"];
$city_2 = $_POST["city_2"];

session_start();
require "connection.php";
$user = $_SESSION["user"];

// Line 01
if (empty($line_1) || empty($line_2)) {
    echo ("Please enter your Address line");
} else if (strlen($line_1) > 100) {
    echo ("Address Line 1 must have LESS THAN 100 characters!");
} else if (strlen($line_1) < 2) {
    echo ("Postal Code must have more than 5 Number ");
} // Line 02
else if (strlen($line_2) > 100) {
    echo ("Address Line 1 must have LESS THAN 100 characters!");
} // Post code
elseif (empty($post_code)) {
    echo ("Please enter Your Post Code");
} else if (!is_numeric($post_code)) {
    echo ("Invalid Postal Code");
} else if (strlen($post_code) > 8) {
    echo ("Invalid Postal Code");
} else if (strlen($post_code) < 3) {
    echo ("Invalid Postal Code");
}
// 
else {
    if (is_numeric($city_1)) {
        $new_city = $city_1;
    } else {
        $new_city = $city_2;
        $rs_1 = Database::search("SELECT * FROM `city` WHERE `name` = '" . $new_city . "' ");
        $data_1 = $rs_1->fetch_assoc();
        $new_city = $data_1["id"];
    }
    $rs_2 = Database::search("SELECT * FROM `address` WHERE `user_id` = '" . $user["id"] . "' ");
    $data_2 = $rs_2->fetch_assoc();

    if ($rs_2->num_rows != 0) {
        $rs_3 = Database::search("SELECT* FROM `address` WHERE `line1` = '" . $line_1 . "' AND `line2` = '" . $line_2 . "'
        AND `postal_code`=  '" . $post_code . "' AND `city_id`='" . $new_city . "' AND `user_id` = '" . $user["id"] . "' ");

        if ($rs_3->num_rows == 0) {
            Database::iud("UPDATE `address` SET `line1`= '" . $line_1 . "',`line2`='" . $line_2 . "'
            ,`postal_code`='" . $post_code . "',`city_id`='" . $new_city . "' WHERE `user_id` = '" . $user["id"] . "' ");

            echo ("success");
        } else {
            echo ("success");
        }
    } else {
        Database::iud("INSERT INTO `address`(`line1`,`line2`,`postal_code`,`city_id`,`user_id`)
        VALUES('" . $line_1 . "','" . $line_2 . "','" . $post_code . "','" . $new_city . "','" . $user["id"] . "')");

        echo ("success");
    }
}
