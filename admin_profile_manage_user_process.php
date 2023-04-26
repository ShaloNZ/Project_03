<?php
require "connection.php";
$user_id = $_GET["id"];

$rs_1 = Database::search("SELECT * FROM `user` WHERE `id` ='" . $user_id . "' ");
$data_1 = $rs_1->fetch_assoc();
?>
<div class="col-12 border border-2 border-warning">
    <div class="row">
        <?php
        if ($data_1["user_acc_status_id"] == 1) {
        ?>
            <div class="col-6">
                <h1 class="form-label fw-bold text-uppercase"><i class="bi bi-person-circle fs-1"></i>&nbsp;<?php echo ($data_1["user_name"]) ?></h1>
            </div>
        <?php
        } else {
        ?>
            <div class="col-6">
                <h1 class="form-label fw-bold text-danger text-uppercase"><i class="bi bi-x-lg fs-1"></i>&nbsp;<?php echo ($data_1["user_name"]) ?></h1>
                <label class="form-label fw-bold text-danger text-uppercase">Suspend Account</label>
            </div>
        <?php
        }
        ?>
        <div class="col-12">
            <div class="row g-3">
                <div class="col-3">
                    <div class="row">
                        <div class="col-lg-3 col-12 border border-1"><img style="height:300px;" src="<?php echo ($data_1["user_dp"]) ?>" /> </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12"><label>User Name</label></div>
                                <div class="col-12"><input class="form-control text-uppercase" value="&nbsp;<?php echo ($data_1["user_name"]) ?>" disabled /></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12"><label>Email Address</label></div>
                                <div class="col-12"><input class="form-control" value="&nbsp;<?php echo ($data_1["email"]) ?>" disabled /></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12"><label>Mobile Number</label></div>
                                <div class="col-12"><input class="form-control" value="&nbsp;<?php echo ($data_1["mobile"]) ?>" disabled /></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-2 text-center">
            <div class="row g-2">
                <div class="All_hover col-6 col-lg-3 border border-1"><label class="p-2">Delet User</label></div>
                <?php
                if ($data_1["user_acc_status_id"] == 1) {
                ?>
                    <div class="All_hover col-6 col-lg-3 border border-1"><label class="p-2">Suspend User Account</label></div>
                <?php
                } else {
                ?>
                    <div class="All_hover col-6 col-lg-3 border border-1"><label class="p-2">UnBlock User Account</label></div>
                <?php
                }
                ?>
                <div class="All_hover col-6 col-lg-3 border border-1"><label class="p-2">Send Message</label></div>
                <div class="All_hover col-6 col-lg-3 border border-1"><label class="p-2">User Activies</label></div>
                <!-- <div class="All_hover col-2"><label class="p-2">orders</label></div> -->
            </div>
        </div>
    </div>
</div>