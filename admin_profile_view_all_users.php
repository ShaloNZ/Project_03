<?php
session_start();
require "connection.php";
$rs_1 = Database::search("SELECT * FROM `user`");
for ($x = 0; $rs_1->num_rows > $x; $x++) {
    $data_1 = $rs_1->fetch_assoc();
?>
    <div class="col-6 col-lg-3 mt-3">
        <div class="card">
            <img style="height: 300px; width: auto;" src="<?php echo ($data_1["user_dp"]) ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="col-12">
                    <div class="row  g-1">
                        <div class="col-12">
                            <p class="card-title text-uppercase"><i class="bi bi-person-circle"></i>&nbsp;<?php echo ($data_1["user_name"]) ?></p>
                        </div>
                        <div class="col-12">
                            <p class="card-title"><?php echo ($data_1["email"]) ?></p>
                        </div>
                        <div class="col-12 d-grid"><button class="btn btn-primary"><i class="bi bi-envelope"></i>&nbsp;Send Message</button></div>
                        <div class="col-12  d-grid"><button class="btn btn-warning" onclick="admin_profile_manage_user(<?php echo ($data_1['id']) ?>);"><i class="bi bi-gear-wide-connected"></i>&nbsp;Manage User</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
}
?>