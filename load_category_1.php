<?php

require "connection.php";

$gender_id = $_GET["id"];


$rs_1 = Database::search("SELECT * FROM `category_1` WHERE `gender_id` = '" . $gender_id . "' ");

for ($x = 0; $rs_1->num_rows > $x; $x++) {

    $data_1 = $rs_1->fetch_assoc();
?>

    <div class="All_hover p-2 border-end border-1" onclick="select_category_1(<?php echo ($data_1['id']) ?>)"><text class="p-2"><?php echo ($data_1["name"]) ?></text></div>

<?php
}
?>
<?php
