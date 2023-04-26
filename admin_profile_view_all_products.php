<?php
session_start();
require "connection.php";
$rs_1 = Database::search("SELECT * FROM `products`");
for ($x = 0; $rs_1->num_rows > $x; $x++) {
    $data_1 = $rs_1->fetch_assoc();
    $rs_2 = Database::search("SELECT * FROM `image` WHERE `products_id` = '" . $data_1["id"] . "'");
    $data_2 = $rs_2->fetch_assoc();
?>
    <div class="col-6 col-lg-3 mt-3">
        <div class="card">
            <img style="height: 400px; width: auto;" src="<?php echo ($data_2["name"]) ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="col-12">
                    <div class="row  g-1">
                        <div class="col-12">
                            <p class="card-title text-uppercase"><i class="bi bi-person-circle"></i>&nbsp;<?php echo ($data_1["title"]) ?></p>
                        </div>
                        <div class="col-12  d-grid"><button class="btn btn-primary" onclick="single_Product_view(<?php echo ($data_1['id']) ?>)"><i class="bi bi-eye"></i>&nbsp;View Products As A Cutomer</button></div>
                        <div class="col-12  d-grid"><button onclick="admin_profile_manage_products(<?php echo ($data_1['id']) ?>)" class=" btn btn-warning"><i class="bi bi-gear-wide-connected"></i>&nbsp;Manage Products</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
}
?>