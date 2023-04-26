<?php

require "connection.php";

$email = $_POST["email"];
$password = $_POST["password"];


if (empty($email)) {
    echo ("Please Enter Your Email Address.!");
} else if (empty($password)) {
    echo ("Please Enter Your Password.!");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE ( `email` = '" . $email . "'  AND `password`='" . $password . "') OR (`mobile`='" . $email . "') ");

    if ($rs->num_rows == 1) {

        $user = $rs->fetch_assoc();

        if ($user["user_acc_status_id"] != 1) {

            echo ("your account suspended Please Contact Us..! ");
        } else {

            session_start();
            $_SESSION["user"] = $user;

            echo ("success");
        }
    } else {
        $rs1 = Database::search("SELECT * FROM `admin` WHERE ( `email` = '" . $email . "'  AND `password`='" . $password . "')");

        if ($rs1->num_rows == 1) {

            $user1 = $rs1->fetch_assoc();

            session_start();
            $_SESSION["admin"] = $user1;

            echo ("success");
        } else {
            echo ("Invalid UserName Or Password");
        }
    }
}
