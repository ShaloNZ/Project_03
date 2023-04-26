<?php
require "connection.php";
session_start();

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
    $rs_1 = Database::search("SELECT * FROM `orders` WHERE `user_id` ='" . $user["id"] . "' ");

    if ($rs_1->num_rows == 0) {
?>
        <div class="col-12">
            <hr />
        </div>
        <div class="col-6">
            <h1 class="form-label fw-bold text-uppercase text-danger"><i class="bi bi-gift-fill fs-1"></i>&nbsp;my orders </h1>
        </div>
        <div class="col-8 offset-2 border border-4 border-danger mt-5 mb-4 ">
            <div class="row">
                <div class=" col-10 offset-1 text-center mt-5 mb-5">
                    <div class="row">
                        <h2 class="text-black fw-bold">No Orders</h2>
                        <!-- <P>First add Iteams in Wish List</P> -->
                    </div>
                </div>
            </div>
        </div>

    <?php
    } else {
    ?>
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <hr />
                </div>
                <div class="col-6">
                    <h1 class="form-label fw-bold text-uppercase text-danger"><i class="bi bi-gift-fill fs-1"></i>&nbsp;my orders </h1>
                </div>
                <div class="col-6 mb-2 text-end mt-2">
                    <label class="form-label fw-bold fs-5"><?php echo ($rs_1->num_rows); ?> Orders</label>
                </div>
                <div class="col-12">
                    <hr />
                </div>
                <!-- <div class="col-12 text-end">
                    <label class="p-2 text-danger">Clear Order History&nbsp;<i class="bi bi-x-square-fill"></i></label>
                </div> -->
                <?php

                for ($x = 0; $x < $rs_1->num_rows; $x++) {
                    $data_1 = $rs_1->fetch_assoc();
                    $rs_2 = Database::search("SELECT * FROM `products` WHERE `id` = '" . $data_1["products_id"] . "'");
                    $data_2 = $rs_2->fetch_assoc();
                ?>
                    <div class="col-12 col-lg-4 mb-3 text-secondary">
                        <div class="card">
                            <div class="col-12">
                                <?php
                                $rs_3 = Database::search("SELECT * FROM `image` WHERE `products_id` = '" . $data_2["id"] . "'");
                                $data_3 = $rs_3->fetch_assoc();
                                ?>
                                <img style="height:500px;" src="<?php echo ($data_3["name"]) ?>" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="row g-2">
                                        <div class="col-12">
                                            <p class="card-title text-uppercase"><?php echo ($data_2["title"]) ?></p>
                                            <p class="card-title text-uppercase"><?php echo ($data_1["qty"]) ?> &nbsp;</p>
                                            <p class="card-title text-uppercase text-warning">LKR &nbsp;<?php echo ($data_2["price"]) ?></p>
                                            <p class="card-title text-uppercase">Buy Date :&nbsp;<?php echo ($data_1["buy_date"]) ?></p>
                                        </div>
                                        <div class="col-12 d-grid"><button class="btn btn-danger"><i class="bi bi-bag-heart-fill"></i>&nbsp;&nbsp;Delete Order History</button></div>
                                        <div class="col-12 mb-3"><a class="d-grid" href="invoice.php?id=<?php echo ($data_1['id']) ?>"><button class="btn btn-primary"><i class="bi bi-cash-coin"></i>&nbsp;&nbsp;Invoice</button></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>
            </div>
        </div>
    <?php
    }
    ?>

<?php
} else {
    echo ("login");
}

?>