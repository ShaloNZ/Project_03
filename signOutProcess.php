<?php

session_start();

if (isset($_SESSION["user"]) || ($_SESSION["admin"])) {

    $_SESSION["user"] = null;
    $_SESSION["admin"] = null;
    $_SESSION["adminNEw"] = null;
    session_destroy();

    echo ("success");
} else {
    echo ("Some Thing Went Wrong");
}
