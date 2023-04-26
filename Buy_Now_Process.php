<?php

session_start();
require "connection.php";

$id = $_POST["p_id"];
$p_color = $_POST["color"];
$p_size = $_POST["size"];
$p_qty = $_POST["qty"];
$order_id = uniqid();
date_default_timezone_set('Asia/colombo');
$date = date('d-m-y h:i:s');

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];

    if (!is_numeric($id)) {
        echo ("2");
    }
    // color
    else if (!is_numeric($p_color)) {
        echo ("3");
    }
    // size
    else if (!is_numeric($p_size)) {
        echo ("4");
    }
    // qty 
    else if (empty($p_qty)) {
        echo ("5");
    } else if (!is_numeric($p_qty)) {
        echo ("6");
    } else {
        $rs_1 = Database::search("SELECT * FROM `address` WHERE `user_id` = '" . $user["id"] . "' ");
        if ($rs_1->num_rows == 0) {
            echo ("setAddress");
        } else {
            $data_1 = $rs_1->fetch_assoc();
            $rs_2 = Database::search("SELECT * FROM `city` WHERE `id` = '" . $data_1["city_id"] . "' ");
            $data_2 = $rs_2->fetch_assoc();

            $rs_5 = Database::search("SELECT * FROM `products` WHERE `id` = '" . $id . "' ");
            $data_5 = $rs_5->fetch_assoc();

            $rs_6 = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "' ");
            $data_6 = $rs_6->fetch_assoc();

            if ($data_5["qty"] < $p_qty) {
                echo ("You can buy Max " . $data_5["qty"] .  "qty");
            } else {

                // Buy Now
                $merchant_secret = "MzA0ODEzNzAyMjA4MTUxNTAyMDMzMzc1MzgwMDE1MjQwMDQ0ODQ=";
                $merchant_id = 1221044;
                $currency = "LKR";
                $amount =  ($data_5["price"] * $p_qty);

                $hash = strtoupper(
                    md5(
                        $merchant_id .
                            $order_id .
                            number_format($amount, 2, '.', '') .
                            $currency .
                            strtoupper(md5($merchant_secret))
                    )
                );

                $array = [];

                $array["order_id"] = $id;
                $array["item_name"] = $data_5["title"];
                $array["amount"] = $amount;
                $array["size"] = $p_size;
                $array["color"] = $p_color;
                $array["qty"] = $p_qty;

                //
                $array["user_id"] = $data_6["id"];
                $array["first_name"] = $data_6["f_name"];
                $array["last_name"] = $data_6["l_name"];
                $array["email"] = $data_6["email"];
                $array["phone"] = $data_6["mobile"];
                $array["delivery_address_line_1"] = $data_1["line1"];
                $array["delivery_address_line_2"] = $data_1["line2"];;
                $array["delivery_city"] = $data_2["name"];
                $array["delivery_country"] = "Sri Lanka";
                //
                $array["currency"] = $currency;
                $array["merchant_id"] = $merchant_id;
                $array["order_id"] = $order_id;
                $array["hash"] = $hash;

                $jsonOnj = json_encode($array);

                echo ($jsonOnj);
            }
        }
    }
} else {
    echo ("1");
}
