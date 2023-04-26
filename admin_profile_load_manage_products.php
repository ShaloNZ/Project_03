<!doctype html>
<html lang="en">

<head>
    <title>Manage Products | ShaloM</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="icon" href="resources/logo_and_images/logo.webp" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="col-12">
        <?php include "admin_profile.php" ?>
    </div>
    <div class="container-fluid">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="row g-2">

                        <div class="col-12 text-center">
                            <h3 class="fw-bold text-uppercase">Manage Products</h3>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-10"> <input class="form-control" type="search" placeholder="Search Product" id="admin_products_search_text" /></div>
                                            <div class="col-2 d-grid"><button class="btn btn-primary" onclick="admin_search_products();"><i class="bi bi-search"></i>&nbsp;</button></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div onclick="admin__view_all_products();" class="All_hover col-lg-3 col-6"><label class="p-2" class="mt-3 ">View All Products</label></div>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="row" id="admin_search_products_load">
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>




    <script src="script.js"></script>
</body>

</html>