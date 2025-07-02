<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SHOPPLY | Admin</title>
    <link rel="icon" href="resources/Shopply Logo.png" />

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <div class="row">

                    <?php
                    include "connectionshop.php";
                    ?>

                    <div class="col-12 mt-4 btn-toolbar justify-content-end">
                        <button class="btn btn-dark me-2"><i class="bi bi-printer-fill" onclick="printreport();"></i> Print</button>
                        <button class="btn btn-danger me-2"><i class="bi bi-filetype-pdf"></i> Export as PDF</button>
                    </div>

                    <div class="col-lg-10 offset-1 mt-5" id="printr">

                        <div class="d-flex justify-content-center">
                            <div class="row align-items-center">
                                <p class="fw-bold mt-2 invoice1" style="font-size: 50px;">Product Report</p>
                            </div>
                        </div>

                        <table class="table table-hover table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="tnx">#</th>
                                    <th scope="col" class="tnx">Image</th>
                                    <th scope="col" class="tnx">Product Name</th>
                                    <th scope="col" class="tnx">Price</th>
                                    <th scope="col" class="tnx">Quantity</th>
                                    <th scope="col" class="tnx">Owner Email</th>
                                    <th scope="col" class="tnx">Category</th>
                                    <th scope="col" class="tnx">Brand Name</th>
                                    <th scope="col" class="tnx">Status</th>

                                </tr>
                            </thead>

                            <?php

                            $rs = Shopply::search("SELECT * FROM `product`");
                            $num = $rs->num_rows;


                            for ($i = 0; $i < $num; $i++) {
                                $ud = $rs->fetch_assoc();


                                $img_rs = Shopply::search("SELECT * FROM product_img WHERE product_product_id='" . $ud["product_id"] . "'");
                                $img_data = $img_rs->fetch_assoc();

                                $cat_rs = Shopply::search("SELECT * FROM category WHERE id ='".$ud["category_id"]."'");
                                $cat_data = $cat_rs->fetch_assoc();

                                $brand_rs = Shopply::search("SELECT * FROM brand INNER JOIN model_has_brand ON brand_id = brand_brand_id INNER JOIN 
                                product ON model_has_brand.id ='".$ud["model_has_brand_id"]."' ");
                                $brand_data = $brand_rs->fetch_assoc();

                                $status_rs = Shopply::search("SELECT * FROM `status` WHERE status_id ='".$ud["status_status_id"]."'");
                                $status_data = $status_rs->fetch_assoc();
                

                            ?>
                                <tbody>
                                    <tr>

                                        <th scope="row"></th>
                                        <td> <img src="<?php echo $img_data["img_path"]; ?>" style="height: 70px;"/></td>
                                        <td class="fw-bold" style="color: green;"> <?php echo $ud["title"]; ?> </td>
                                        <td class="fw-bold" style="color: blue;"> $<?php echo $ud["price"]; ?> </td>
                                        <td> <?php echo $ud["qty"]; ?> </td>
                                        <td><?php echo $ud["user_email"]; ?> </td>
                                        <td><?php echo $cat_data["category_name"]; ?> </td>
                                        <td><?php echo $brand_data["brand_name"]; ?> </td>
                                        <td><?php echo $status_data["status_name"]; ?> </td>


                                        

                                    </tr>

                                </tbody>
                            <?php

                            }

                            ?>

                        </table>

                        <div class="col-12 text-center mb-3">
                            <label class="form-label fs-5 text-black-50 fw-bold">
                                THANK YOU for doing Business with us !!
                            </label>
                        </div>

                        <div class="col-12 bottom mt-3">
                            <p class="text-center">&copy; 2023 Shopply.lk || All Rights Reserved</p>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>


    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>