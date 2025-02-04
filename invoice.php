<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopply | Invoice</title>
    <link rel="icon" href="resources/Shopply Logo.png" />

    <link rel="stylesheet" href="bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css"/>

</head>

<body style="background-color: #FDDDE6;">

    <div class="container-fluid d-flex justify-content-center">
        <div class="row align-items-center mt-2">

            <?php

            session_start();
            require "connectionshop.php";

            if (isset($_SESSION["shopply"])) {
                $usermail = $_SESSION["shopply"]["email"];
                $oid = $_GET["id"];

                $total = 0;
                $subtotal = 0;
                $shipping = 0;

            ?>


                <div class="col-12 btn-toolbar justify-content-end">
                    <button class="btn btn-dark me-2"><i class="bi bi-printer-fill" onclick="printInvoice();"></i> Print</button>
                    <button class="btn btn-danger me-2"><i class="bi bi-filetype-pdf"></i> Export as PDF</button>
                </div>

            
                <div class="col-12 col-lg-10 offset-lg-1 mt-2" id="invoice">
                    <div class="row ">

                        <div class="col-12 offset-9 col-lg-2 align-self-start ms-2 logo" style="height: 65px;"></div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="text-start">
                                                <span class="fs-3 fw-bold text-warning" style="font-family: Vanilla;">SHOPPLY</span><br/>
                                                <span class="fs-6 fw-bold">Kensignton Garden, Colombo-5</span><br/>
                                                <span class="fs-6 fw-bold">+94 775196469</span><br/>
                                                <span class="fs-6 fw-bold">shopply@gmail.com</span><br/>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <span class="col-12 text-end fw-bold invoice1">INVOICE</span>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row" style="background-color: #FFD700;">

                                    <?php
                            
                                    $address_rs = Shopply::search("SELECT * FROM `user_has_address` WHERE `user_email`='".$usermail."'");
                                    $address_data =$address_rs->fetch_assoc();
                                    
                                    ?>

                                        <div class="col-5">
                                            <div class="text-start">
                                                <span class="fs-4 fw-bold" style="font-family: Lato-Balck;">BILLED TO :</span><br/>
                                                <span class="fs-6"><?php echo $_SESSION["shopply"]["fname"]." ".$_SESSION["shopply"]["lname"]; ?></span><br/>
                                                <span class="fs-6"><?php echo $_SESSION["shopply"]["mobile"];?></span><br/>
                                                <span class="fs-6"><?php echo $usermail;?></span><br/>
                                                <span class="fs-6"><?php echo $address_data["address"];?></span><br/>
                                            </div>
                                        </div>

                                        <?php
                                
                                        $invoice_rs = Shopply::search("SELECT * FROM `invoice` WHERE `order_id`='".$oid."'");
                                        $invoice_data = $invoice_rs->fetch_assoc();
                                        
                                        ?>

                                        <div class="col-7">
                                            <div class="text-end">
                                                <span class="fs-5 fw-bold" style="font-family: Lato-Balck;">Invoice No : <?php echo $invoice_data["id"]; ?></span><br/>
                                                <span class="fs-5"><?php echo $invoice_data["date"]; ?></span><br/>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 mt-3">

                                    <table class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th scope="col">#</th>
                                                <th scope="col">ORDER ID</th>
                                                <th scope="col">ITEM</th>
                                                <th scope="col">QUANTITY</th>
                                                <th scope="col">PRICE</th>
                                                <th scope="col">TOTAL</th>
                                            </tr>
                                        </thead>

                                        <?php
                                            $product_rs = Shopply::search("SELECT * FROM `product` WHERE `product_id`='".$invoice_data["product_product_id"]."'");
                                            $product_data = $product_rs->fetch_assoc();
                                        ?>

                                        <tbody class="table-group-divider text-center">
                                            <tr>
                                                <th scope="row">1</th>
                                                <td><?php echo $invoice_data["order_id"]; ?></td>
                                                <td><?php echo $product_data["title"]; ?></td>
                                                <td><?php echo $invoice_data["qty"]; ?></td>
                                                <td> $ <?php echo $product_data["price"]; ?></td>

                                                <?php $total =  ($product_data["price"] * $invoice_data["qty"]); ?>

                                                    <?php $subtotal = $total + ($product_data["price"] * $invoice_data["qty"]);?>

                                                <td> $ <?php echo $total ?> </td>

                                                <?php $shipping = ($product_data["shipping_cost"] * $invoice_data["qty"]);?>

                                                
                                                
                                            </tr>
                                            
                                            
                                        </tbody>

                                        <tfoot>
                                            
                                            <tr>
                                                <td colspan="4" class="border-0"></td>
                                                <td class="fs-5 text-center fw-bold">SUBTOTAL</td>
                                                <td class="text-center"> $ - </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="border-0"></td>
                                                <td class="fs-5 text-center fw-bold border-primary">Delivery Fee</td>
                                                <td class="text-center border-primary">  $ <?php echo $shipping ?> </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="border-0"></td>
                                                <td class="fs-5 text-center fw-bold border-primary text-primary">GRAND TOTAL</td>
                                                <td class="fs-5 text-center fw-bold border-primary text-primary"> $ <?php echo $total + $shipping ?></td>
                                            </tr>

                                        </tfoot>
                                    </table>
                                </div>

                                <div class="col-4 text-center tnx">
                                    <span class="fs-1 fw-bold text-danger">Thank You !</span>
                                </div>

                            <div class="col-12 mt-3 mb-3 border-0 border-start border-5 border-primary rounded" style="background-color: #e7f2ff;">
                                <div class="row">
                                    <div class="col-12 mt-3 mb-3">
                                        <label class="form-label fs-5 fw-bold">TERMS & CONDITIONS : </label>
                                        <br />
                                        <label class="form-label fs-6">Returns Accepted within 7 Days</label><br/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="border border-1 border-primary" />
                            </div>

                            <div class="col-12 text-center mb-3">
                                <label class="form-label fs-5 text-black-50 fw-bold">
                                    THANK YOU for doing Business with us !!
                                </label>
                            </div>

                                <div class="col-12 d-none d-lg-block bottom mt-3">
                                    <p class="text-center">&copy; 2023 Shopply.lk || All Rights Reserved</p>
                                </div>

                        
                    </div>
                </div>

            <?php
            }

            ?>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>