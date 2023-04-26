<?php
session_start();
require "connection.php";
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];

    $rs_1 = Database::search("SELECT * FROM `address` WHERE `user_id` = '" . $user["id"] . "' ");
    if ($rs_1->num_rows == 0) {
?>
        <div class="col-12">
            <div class="row g-3">
                <div class="col-12">
                    <hr />
                </div>
                <div class="col-12">
                    <h1 class="p-2 fw-bold text-uppercase"><i class="bi bi-envelope-at fs-1"></i></i> &nbsp;My Address</label>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-12"><label>Address Line 01</label></div>
                        <div class="col-12"><input class="form-control text-secondary text-uppercase" id="address_line_01" /></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-12"><label>Address Line 02</label></div>
                        <div class="col-12"><input class="form-control text-secondary text-uppercase" id="address_line_02" /></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-8"><label>Select New Province</label></div>
                        <div class="col-8">
                            <select class="form-select text-uppercase" id="id_set_new_provinces">
                                <?php
                                $rs_11 = Database::search("SELECT * FROM `province`");
                                for ($a = 0; $a < $rs_11->num_rows; $a++) {
                                    $data_11 = $rs_11->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($data_11['id']) ?>"><?php echo ($data_11["name"]) ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-4 d-grid"><button onclick="set_new_provinces()" class="btn btn-success">Set</button></div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-8"><label>Select New Distric</label></div>
                        <div class="col-8">
                            <select class="form-select text-uppercase" id="id_set_new_Distric">
                            </select>
                        </div>
                        <div class="col-4 d-grid"> <button onclick="set_new_Distric()" class="btn btn-success">Set</button></div>
                    </div>
                </div>


                <div class="col-12">
                    <div class="row">
                        <div class="col-8"><label>Select New City</label></div>
                        <div class="col-8">
                            <select class="form-select text-uppercase" id="id_set_new_City">
                            </select>
                        </div>
                        <!-- <div class="col-4 d-grid"> <button class="btn btn-success">Set</button></div> -->
                    </div>

                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-12"><label>Postal Code</label></div>
                        <div class="col-12"><input class="form-control" id="postal_code_address" /></div>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="row g-2">
                        <div class="col-12 d-grid"> <button onclick="Set_user_Address_first_time();" class="btn btn-primary"><i class="bi bi-cloud-download-fill"></i>&nbsp;&nbsp;Save New Details</button></div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else {
        $data_1 = $rs_1->fetch_assoc();
    ?>
        <div class="col-12">
            <div class="row g-3">
                <div class="col-12">
                    <hr />
                </div>
                <div class="col-12">
                    <h1 class="p-2 fw-bold text-uppercase"><i class="bi bi-envelope-at fs-1"></i></i> &nbsp;My Address</label>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-12"><label>Address Line 01</label></div>
                        <div class="col-12"><input class="form-control text-secondary text-uppercase" value="<?php echo ($data_1["line1"]) ?>" id="address_line_01" /></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-12"><label>Address Line 02</label></div>
                        <div class="col-12"><input class="form-control text-secondary text-uppercase" value="<?php echo ($data_1["line2"]) ?>" id="address_line_02" /></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-5">
                            <div class="row">
                                <div class="col-12"><label>City</label></div>
                                <?php
                                $rs_2 = Database::search("SELECT * FROM `city` WHERE `id`='" . $data_1["city_id"] . "'");
                                $data_2 = $rs_2->fetch_assoc();
                                ?>
                                <div class="col-12"><input class="form-control text-secondary text-uppercase" value="<?php echo ($data_2["name"]) ?>" disabled id="id_set_new_City_2" /></div>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="row">
                                <div class="col-8"><label>Select New City</label></div>
                                <div class="col-8">
                                    <select class="form-select text-uppercase" id="id_set_new_City">
                                    </select>
                                </div>
                                <!-- <div class="col-4 d-grid"> <button class="btn btn-success">Set</button></div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-5">
                            <div class="row">
                                <div class="col-12"><label>District</label></div>
                                <?php
                                $rs_3 = Database::search("SELECT * FROM `district` WHERE `id`='" . $data_2["district_id"] . "'");
                                $data_3 = $rs_3->fetch_assoc();
                                ?>
                                <div class="col-12"><input class="form-control text-secondary text-uppercase" value="<?php echo ($data_3["name"]) ?>" disabled /></div>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="row">
                                <div class="col-8"><label>Select New Distric</label></div>
                                <div class="col-8">
                                    <select class="form-select text-uppercase" id="id_set_new_Distric">
                                    </select>
                                </div>
                                <div class="col-4 d-grid"> <button onclick="set_new_Distric()" class="btn btn-success">Set</button></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-5">
                            <div class="row">
                                <div class="col-12"><label>Province</label></div>
                                <?php
                                $rs_4 = Database::search("SELECT * FROM `province` WHERE `id`='" . $data_3["province_id"] . "'");
                                $data_4 = $rs_4->fetch_assoc();
                                ?>
                                <div class="col-12"><input class="form-control text-secondary text-uppercase" value="<?php echo ($data_4["name"]) ?>" disabled /></div>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="row">
                                <div class="col-8"><label>Select New Province</label></div>
                                <div class="col-8">
                                    <select class="form-select text-uppercase" id="id_set_new_provinces">
                                        <?php
                                        $rs_11 = Database::search("SELECT * FROM `province`");
                                        for ($a = 0; $a < $rs_11->num_rows; $a++) {
                                            $data_11 = $rs_11->fetch_assoc();
                                        ?>
                                            <option value="<?php echo ($data_11['id']) ?>"><?php echo ($data_11["name"]) ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-4 d-grid"><button onclick="set_new_provinces()" class="btn btn-success">Set</button></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-12"><label>Postal Code</label></div>
                        <div class="col-12"><input class="form-control" value="<?php echo ($data_1["postal_code"]) ?>" id="postal_code_address" /></div>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="row g-2">
                        <div class="col-6 d-grid"> <button onclick="clear_data();" class="btn btn-success"><i class="bi bi-x-circle"></i>&nbsp;&nbsp;Clear Address</button></div>
                        <div class="col-6 d-grid"> <button onclick="Set_user_Address();" class="btn btn-primary"><i class="bi bi-cloud-download-fill"></i>&nbsp;&nbsp;Save New Details</button></div>
                    </div>
                </div>
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