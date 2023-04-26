<?php

require "connection.php";

$userName = $_POST["userName"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$password = $_POST["password"];


if (empty($userName)) {
    echo ("Please Enter Your UserName.!");
} else if (empty($email)) {
    echo ("Please Enter Your Email Address.!");
} else if (empty($mobile)) {
    echo ("Please Enter Your Mobile NUmber.!");
} else if (empty($password)) {
    echo ("Please Enter Your Password.!");
} else {

    $rs = Database::search("SELECT * FROM `admin` WHERE ( `user_name` = '" . $userName . "'  AND `email`='" . $email . "'AND 
    `mobile`='" . $mobile . "'AND `password`='" . $password . "') ");

    if ($rs->num_rows == 1) {

        $admin_new = $rs->fetch_assoc();

        session_start();
        $_SESSION["adminNew"] = $admin_new;

        echo ("success");
    } else {
        echo ("Invalid Enter Details");
    }
}
