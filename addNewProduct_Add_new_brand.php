<?php

require "connection.php";

$brand = $_GET["text"];

if (empty($brand)) {
    echo ("Please Enter Brand");
} else {

    $rs_1 = Database::search("SELECT * FROM `brand` WHERE `name` = '" . $brand . "' ");

    if ($rs_1->num_rows != 0) {
        echo ("Alredy Have This Brand");
    } else {
        Database::iud("INSERT INTO `brand`(`name`)VALUES('" . $brand . "') ");
        echo ("success");
    }
}
