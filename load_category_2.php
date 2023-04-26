<?php

require "connection.php";

$gender_id = $_GET["id"];


$rs_1 = Database::search("SELECT * FROM `category_2` WHERE `category_1_id` = '" . $gender_id . "' ");


for ($x = 0; $rs_1->num_rows > $x; $x++) {

    $data_1 = $rs_1->fetch_assoc();
?>

    <div class="All_hover col-12"><a class="d-grid text-decoration-none" href="products_list_view.php?id=<?php echo ($data_1['id']) ?>"><text class="p-2"><?php echo ($data_1["name"]); ?></text></a></div>

    <!-- <div class="All_hover p-2" onclick="select_products(<?php echo ($data_1['id']); ?>)"><text class="p-2"><?php echo ($data_1["name"]); ?></text></div> -->


<?php
}
