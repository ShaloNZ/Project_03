<?php

require "connection.php";

$p_id = $_GET["id"];

if (!is_numeric($p_id) || empty($p_id)) {
    echo ("error");
} else {
    $rs_1 = Database::search("SELECT * FROM `city` WHERE `district_id` = '" . $p_id . "'");
?>
    <?php
    for ($x = 0; $x < $rs_1->num_rows; $x++) {
        $data_1 = $rs_1->fetch_assoc();
    ?>
        <option value=" <?php echo ($data_1['id']) ?>"><?php echo ($data_1["name"]) ?></option>
<?php
    }
}
