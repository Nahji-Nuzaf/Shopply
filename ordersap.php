<?php
session_start();
?>

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

                    include "adminheader.php";
                    include "connectionshop.php";

                    $invoice_rs = Shopply::search("SELECT * FROM `invoice` ORDER BY `id` DESC");
                    $invoice_num = $invoice_rs->num_rows;



                    ?>

                    <div class="col-10 mt-2 btn-toolbar justify-content-end">
                        <div class="row">
                            <div class="col-12">
                                <p class="fw-bold">Total Orders : <?php echo $invoice_num?></p>
                                <p class="fw-bold">Pending Orders : 0</p>
                                <p class="fw-bold">Shipped Orders : <?php echo $invoice_num?></p>
                            </div>
                            <!-- <div class="col-12 mt-2">
                                <button class="btn btn-dark me-2"><i class="bi bi-plus-lg"></i> Add User</button>
                            </div> -->
                        </div>


                        <!--button class="btn btn-danger me-2"><i class="bi bi-filetype-pdf"></i> Export as PDF</button-->
                    </div>

                    <div class="col-lg-10 offset-1">

                        <div class="d-flex mt-3">
                            <div class="row">
                                <p class="fw-bold" style="font-size: 50px;">Order Management</p>
                            </div>
                        </div>
                        

                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="tnx">Order_Id</th>
                                    <th scope="col" class="tnx">Image</th>
                                    <th scope="col" class="tnx">Buyer</th>
                                    <th scope="col" class="tnx">Shipping Address</th>
                                    <th scope="col" class="tnx">Payment Type</th>
                                    <th scope="col" class="tnx">Paid</th>
                                    <th scope="col" class="tnx">Amount</th>
                                    <th scope="col" class="tnx">Action</th>
                                </tr>
                            </thead>

                            <?php


                            for ($i = 0; $i < $invoice_num; $i++) {
                                $invoiced = $invoice_rs->fetch_assoc();

                                $product = Shopply::search("SELECT * FROM `product` WHERE `product_id`='".$invoiced["product_product_id"]."'");
                                $pd = $product->fetch_assoc();

                                $proimg = Shopply::search("SELECT * FROM `product_img` WHERE `product_product_id`='" . $pd["product_id"] . "'");
                                $img = $proimg->fetch_assoc();

                                $user_rs = Shopply::search("SELECT * FROM `user` WHERE `email`='".$invoiced["user_email"]."'");
                                $user_data = $user_rs->fetch_assoc();

                                $user_address_rs = Shopply::search("SELECT * FROM `user_has_address` WHERE `user_email`='".$user_data["email"]."'");
                                $uad = $user_address_rs->fetch_assoc();

                            ?>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="text-warning-emphasis">#<?php echo $invoiced["order_id"]?></th>
                                        <td> <img src="<?php echo $img["img_path"]; ?>" style="height: 70px;" /></td>
                                        <td> <?php echo $user_data["fname"] ." ". $user_data["lname"]; ?> </td>
                                        <td> <?php echo $uad["address"]; ?> </td>
                                        <td class="fw-bold text-info"> Immediate Payment </td>
                                        <td class="fw-bold text-success"> Paid <img src="resources/check-mark.png" height="25px"/> </td>
                                        <td class="text-primary fw-bold"> $ <?php echo $pd["price"]; ?> </td>
                                        <td> <button class="btn btn-success">Shipped</button> </td>
                                        

                                        <?php
                                        
                                        // $us = Shopply::search("SELECT * FROM `status` WHERE `status_id`='".$ud["user_status_status_id"]."'");
                                        // $us_data = $us->fetch_assoc();

                                        ?>
                                        
                                        
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