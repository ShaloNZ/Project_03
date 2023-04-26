<?php
require "connection.php";

$c_id = $_GET["id"];

    $rs_1 = Database::search("SELECT * FROM `category_2` WHERE `category_1_id` = '" . $c_id . "'");
?>

    <?php
    for ($x = 0; $x < $rs_1->num_rows; $x++) {

        $data_1 = $rs_1->fetch_assoc();

    ?>



        <option value=" <?php echo ($data_1['id']) ?>"><?php echo ($data_1["name"]) ?></option>
    <?php
    }


