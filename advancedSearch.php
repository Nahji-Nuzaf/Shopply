<?php

session_start();
require "connectionshop.php";

if (isset($_SESSION["shopply"])) {

?>

    <!DOCTYPE html>

    <html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shopply | Advanced Search</title>
        <link rel="icon" href="resources/Shopply Logo.png" />

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />


    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <?php include "header.php"; ?>

                <div class="container-fluid">
                    <div class="row">

                        <div class="col-12 bg-body">
                            <div class="row">
                                <div class="offset-lg-1 col-12 col-lg-10">
                                    <div class="row">
                                        <div class="col-5 text-center">
                                            <P class="fs-1 fw-bold mt-3 pt-2">Advanced Search.</P>
                                            <span class="fw-bold text-primary pt-2">Enter One or more Parameters in the field below</span>
                                        </div>
                                    </div>
                                    <hr />
                                </div>
                            </div>
                        </div>

                        <div class="offset-lg-3 col-12 col-lg-6 rounded">
                            <div class="row">

                                <div class="col-12 col-lg-10 mt-2">
                                    <input type="text" class="form-control" placeholder="Type keyword to search..." id="t" />
                                </div>
                                <div class="col-12 col-lg-2 mt-2 d-grid">
                                    <button class="btn btn-primary" onclick="advancedSearch(0);">Search</button>
                                </div>

                                
                            </div>
                        </div>
                        <div class="col-lg-10 offset-lg-1">
                            <hr>
                        </div>


                        <div class="offset-lg-1 mt-2 col-12 col-lg-10 mb-3 bg-body">
                            <div class="row">

                                <div class="offset-lg-1 mt-2 col-12 col-lg-10">
                                    <div class="row">

                                        <div class="col-12">
                                            <div class="row">

                                                <div class="row">

                                                    <div class="row shadow">
                                                        <p class="fw-bold">Browse by Filtering Categories and related Options :</p>
                                                        <div class="col-12 col-lg-4 mb-3">

                                                            <select class="form-select" id="c1" onchange="loadBrands2();">
                                                                <option value="0">Select Category</option>

                                                                <?php

                                                                $categories = Shopply::search("SELECT * FROM `category`");
                                                                $cat_num = $categories->num_rows;

                                                                for ($x = 0; $x < $cat_num; $x++) {
                                                                    $cat_data = $categories->fetch_assoc();

                                                                ?>
                                                                    <option value="<?php echo $cat_data["id"] ?>"><?php echo $cat_data["category_name"] ?></option>

                                                                <?php
                                                                }

                                                                ?>

                                                            </select>

                                                        </div>

                                                        <div class="col-12 col-lg-4 mb-3">
                                                            <select class="form-select" id="b1" onchange="loadModels2();">
                                                                <option value="0">Select Brand</option>

                                                                <?php

                                                                $brands = Shopply::search("SELECT * FROM `brand`");
                                                                $brand_num = $brands->num_rows;

                                                                for ($x = 0; $x < $brand_num; $x++) {
                                                                    $brand_data = $brands->fetch_assoc();

                                                                ?>
                                                                    <option value="<?php echo $brand_data["brand_id"] ?>"><?php echo $brand_data["brand_name"] ?></option>

                                                                <?php
                                                                }

                                                                ?>

                                                            </select>
                                                        </div>

                                                        <div class="col-12 col-lg-4 mb-3">
                                                            <select class="form-select" id="m">
                                                                <option value="0">Select Model</option>

                                                                <?php

                                                                $models = Shopply::search("SELECT * FROM `model`");
                                                                $model_num = $models->num_rows;

                                                                for ($x = 0; $x < $model_num; $x++) {
                                                                    $model_data = $models->fetch_assoc();

                                                                ?>
                                                                    <option value="<?php echo $model_data["model_id"] ?>"><?php echo $model_data["model_name"] ?></option>

                                                                <?php
                                                                }

                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row shadow">
                                                        <div class="col-12 col-lg-12 mb-3">
                                                            <p class="fw-bold">Browse by Filtering Product Conditions :</p>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="col-12 mt-2 mb-2">
                                                                        <select class="form-select border border-top-0 border-start-0 border-end-0 border-2 border-dark" id="s">
                                                                            <option value="0">SORT BY</option>
                                                                            <option value="1">PRICE LOW TO HIGH</option>
                                                                            <option value="2">PRICE HIGH TO LOW</option>
                                                                            <option value="3">QUANTITY LOW TO HIGH</option>
                                                                            <option value="4">QUANTITY HIGH TO LOW</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <select class="form-select" id="c2">
                                                                        <option value="0">Select Condition</option>

                                                                        <?php

                                                                        $condition_rs = Shopply::search("SELECT * FROM `condition`");
                                                                        $condition_num = $condition_rs->num_rows;

                                                                        for ($x = 0; $x < $condition_num; $x++) {
                                                                            $condition_data = $condition_rs->fetch_assoc();
                                                                        ?>
                                                                            <option value="<?php echo $condition_data["condition_id"] ?>"><?php echo $condition_data["condition_name"] ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row shadow">
                                                        <p class="fw-bold">Browse by Filtering Product Prices :</p>
                                                        <div class="row justify-content-end">
                                                            <div class="col-lg-6">
                                                                <p>Max Price :</p>
                                                            </div>
                                                            <div class="col-12 col-lg-6 mb-3">
                                                                <input type="text" class="form-control" placeholder="Price From..." id="pf" />
                                                            </div>
                                                        </div>

                                                        <div class="row justify-content-end">
                                                            <div class="col-lg-6">
                                                                <p>Min Price :</p>
                                                            </div>
                                                            <div class="col-12 col-lg-6 mb-3">
                                                                <input type="text" class="form-control" placeholder="Price To..." id="pt" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- <div class="offset-lg-1 col-12 col-lg-10 bg-body rounded mb-3">
                                <div class="row"> -->
                                    <div class="offset-lg-1 col-12 col-lg-10" >
                                        <div class="row"  id="view_area">
                                            
                                            <div class="offset-3 col-6 mt-3 mb-5 text-center">
                                                <span class="h1 text-black-50 fw-bold">No Items Searched Yet...</span>
                                            </div>
                                        </div>
                                    </div>
                                <!-- </div>
                            </div> -->



                        </div>
                    </div>

                </div>
            </div>

            <?php include "footer.php"; ?>

        </div>
        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
    </body>

    </html>

<?php

}

?>