<?php

require "connection.php";

$size = $_GET["text"];

if (empty($size)) {
    echo ("Please Enter Size");
} else {

    $rs_1 = Database::search("SELECT * FROM `size` WHERE `name` = '" . $size . "' ");

    if ($rs_1->num_rows != 0) {
        echo ("Alredy Have This Size");
    } else {
        Database::iud("INSERT INTO `size`(`name`)VALUES('" . $size . "') ");
        echo ("success");
    }
}
