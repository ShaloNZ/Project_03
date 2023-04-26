<?php

require "connection.php";

$color = $_GET["text"];

if (empty($color)) {
    echo ("Please Enter Color");
} else {

    $rs_1 = Database::search("SELECT * FROM `color` WHERE `name` = '" . $color . "' ");

    if ($rs_1->num_rows != 0) {
        echo ("Alredy Have This Color");
    } else {
        Database::iud("INSERT INTO `color`(`name`)VALUES('" . $color . "') ");
        echo ("success");
    }
}
