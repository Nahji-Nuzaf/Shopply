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
                                <p class="fw-bold mt-2 invoice1" style="font-size: 50px;">Purchase Report</p>
                            </div>
                        </div>

                        <table class="table table-hover table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="tnx">#</th>
                                    <th scope="col" class="tnx">Image</th>
                                    <th scope="col" class="tnx">Product</th>
                                    <th scope="col" class="tnx">Amount</th>
                                    <th scope="col" class="tnx">Buyer</th>
                                    <th scope="col" class="tnx">Seller</th>
                                    <th scope="col" class="tnx">Date & Time</th>
                                    <th scope="col" class="tnx">Invoice</th>
                                </tr>
                            </thead>

                            <?php

                            $invoice_rs = Shopply::search("SELECT * FROM `invoice`");
                            $num = $invoice_rs->num_rows;


                            for ($i = 0; $i < $num; $i++) {
                                $invoice_data = $invoice_rs->fetch_assoc();

                                $product_rs = Shopply::search("SELECT * FROM `product` WHERE `product_id`='" . $invoice_data["product_product_id"] . "'");
                                $product_data = $product_rs->fetch_assoc();

                                $seller_rs = Shopply::search("SELECT * FROM `user` WHERE `email`='" . $product_data["user_email"] . "'");
                                $seller_data = $seller_rs->fetch_assoc();
                                $seller = $seller_data["email"];

                                $image_rs = Shopply::search("SELECT * FROM `product_img` WHERE `product_product_id`='" . $invoice_data["product_product_id"] . "'");
                                $image_data = $image_rs->fetch_assoc();

                            ?>
                                <tbody>
                                    <tr>
                                        <th scope="row"></th>
                                        <td> <img src="<?php echo $image_data["img_path"] ?>" class="img-fluid rounded-start" style="height: 70px;" /> </td>

                                        <td>
                                            <h5 style="color: green;"><?php echo $product_data["title"]; ?></h5>
                                        </td>

                                        <td>
                                            <div class="col-12">
                                                <h5 style="color: blue;"> $ <?php echo $invoice_data["amount"]; ?></h5>
                                            </div>
                                            <div class="col-12">
                                                <p class="mb-2"><b>Price :</b> $<?php echo $product_data["price"]; ?></p>
                                                <p><b>Shipping :</b> $<?php echo $product_data["shipping_cost"]; ?></p>
                                            </div>
                                        </td>

                                        <td class="fw-bold"> <?php echo $invoice_data["user_email"]; ?> </td>

                                        <td> <?php echo $seller ?> </td>

                                        <td> <?php echo $invoice_data["date"]; ?> </td>

                                        <td>
                                            <div class="col-2 mx-auto">
                                                <div class="row">
                                                    <a href="<?php //echo "invoice.php?id=" . ($invoice_data["product_product_id"]) + "&qty=" + ($invoice_data["qty"]); 
                                                                ?>"><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="View Invoice"><img src="resources/otherimgs/eye.png" style="height: 27px;" /></span></a>
                                                    <a href="#"><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Download Invoice"><img src="resources/otherimgs/download (1).png" class="mt-3" style="height: 23px;" /></span></a>
                                                </div>
                                            </div>
                                        </td>

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