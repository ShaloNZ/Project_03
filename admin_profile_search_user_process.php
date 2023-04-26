<?php
require "connection.php";

$text = $_GET["id"];

if (empty($text)) {
    echo ("Please Enter Search Word");
} else if (strlen($text) > 50) {
    echo ("User Name must have LESS THAN 50 characters!");
} else if (!preg_match("/[a-zA-z]/", $text)) {
    echo ("Search Text must have Include charecters!");
} else {

    $rs_1 = Database::search("SELECT * FROM `user` WHERE `user_name` LIKE  '" . $text . "' OR `email` LIKE  '" . $text . "'");
    $data_1 = $rs_1->fetch_assoc();

    if ($rs_1->num_rows == 1) {

?>
        <div class="col-6 col-lg-3 mt-3">
            <div class="card">
                <img style="height: 200px; width: auto;" src="<?php echo ($data_1["user_dp"]) ?>" class="card-img-top" alt="...">
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
    //
    else {

        echo ("no");
    }
}
