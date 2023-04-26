<?php

require "connection.php";

$userName = $_POST["userName"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$password = $_POST["password"];
$r_password = $_POST["rpassword"];


// userName
if (empty($userName)) {
    echo ("Please enter your UserName");
} else if (strlen($userName) > 20) {
    echo ("User Name must have LESS THAN 20 characters!");
} else if (!preg_match("/[a-zA-z]/", $userName)) {
    echo ("UserName must have Include charecters!");
}
// email
elseif (empty($email)) {
    echo ("Please enter your Email address");
} else if (strlen($email) > 100) {
    echo ("User Name must have LESS THAN 20 characters!");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email address!");
}
// mobile
else if (empty($mobile)) {
    echo ("Please enter your Mobile Number!");
} else if (strlen($mobile) != 10) {
    echo ("Mobile Number must contain 10 characters!");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/", $mobile)) {
    echo ("Invalid Mobile Number!");
}
// password
elseif (empty($password)) {
    echo ("Please enter Your Password");
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo ("Password must have more than 5 charactors & less than 20 charactors..!!");
}
// r_password
elseif (empty($password)) {
    echo ("Please Re-enter Your Password");
} elseif ($r_password != $password) {
    echo ("Password Does Not Mactch!");
}
// next
else {

    $rs1 = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' ");
    $rs2 = Database::search("SELECT * FROM `user` WHERE `mobile`='" . $mobile . "' ");
    $rs3 = Database::search("SELECT * FROM `admin` WHERE `email`='" . $email . "' ");
    $rs4 = Database::search("SELECT * FROM `admin` WHERE `mobile`='" . $mobile . "' ");
    $rs5 = Database::search("SELECT * FROM `user` WHERE `user_name`='" . $userName . "' ");

    date_default_timezone_set('Asia/colombo');
    $date = date('d-m-y h:i:s');


    if ($rs1->num_rows != 0 || $rs3->num_rows != 0) {
        echo ("Alredy Use this Email Address");
    } else if ($rs2->num_rows != 0 || $rs4->num_rows != 0) {
        echo ("Alredy Use this Mobile Number");
    } elseif ($rs5->num_rows != 0) {
        echo ("Alredy Use this User Name Please Try Other One");
    } else {
        $rs4 = Database::iud("INSERT INTO `user`(`email`,`user_name`,`mobile`,`password`,`user_online_status`,`user_acc_status_id`,`register_date`)VALUES('" . $email . "','" . $userName . "','" . $mobile . "','" . $password . "','1','1','" . $date . "') ");

        echo ("success");
    }
}
