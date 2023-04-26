<?php

session_start();
require "connection.php";

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
    $rs_1 = Database::search("SELECT * FROM `user` WHERE `id` ='" . $user["id"] . "' ");
    $data_1 = $rs_1->fetch_assoc();
?>
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <hr />
            </div>
            <div class="col-6">
                <h1 class="form-label fw-bold text-uppercase text-warning"><i class="bi bi-person-circle fs-1"></i>&nbsp;My Profile</h1>
            </div>
            <div class="col-12">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12"><label>User Name</label></div>
                            <div class="col-12"><input class="form-control text-uppercase" value="<?php echo ($data_1["user_name"]) ?>" disabled /></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12"><label>Email Address</label></div>
                            <div class="col-12"><input class="form-control" value="<?php echo ($data_1["email"]) ?>" disabled /></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12"><label>Mobile Number</label></div>
                            <div class="col-12"><input class="form-control" value="<?php echo ($data_1["mobile"]) ?>" disabled /></div>
                        </div>
                    </div>
                    <!-- <div class="col-12">
                        <div class="row">
                            <div class="col-12"><label>Password</label></div>
                            <div class="col-12"><input class="form-control" disabled /></div>
                        </div>
                    </div> -->
                    <!-- <div class="col-12 mb-2">
                        <div class="row g-2">
                            <div class="col-6 d-grid"> <button class="btn btn-success"><i class="bi bi-x-circle"></i>&nbsp;&nbsp;Clear Address</button></div>
                            <div class="col-6 d-grid"> <button class="btn btn-primary"><i class="bi bi-cloud-download-fill"></i>&nbsp;&nbsp;Save New Details</button></div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

<?php
} else {
    echo ("login");
}

?>