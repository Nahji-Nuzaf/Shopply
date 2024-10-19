<?php

session_start();
require "connectionshop.php";

if (isset($_SESSION["shopply"])) {

    $email = $_SESSION["shopply"]["email"];

    $total = 0;
    $subtotal = 0;
    $shipping = 0;

?>

    <!DOCTYPE html>

    <html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shopply | cart</title>
        <link rel="icon" href="resources/Shopply Logo.png" />

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />

    </head>


    <body >

        <div class="container-fluid">
            <div class="row">

                <?php
                include "header.php";
                ?>

                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-lg-11 mb-5 mt-3 offset-lg-1">
                            <div class="row">
                                <div class="col-12">
                                    <p class="fw-bold mb-0" style="font-size: 45px;">YOUR CART</p>
                                </div>
                                <hr class="mb-5" />
                            </div>

                            <div class="row">

                                <?php
                                $cart_rs = Shopply::search("SELECT * FROM `cart` WHERE `user_email`='" . $email . "'");
                                $cart_num = $cart_rs->num_rows;

                                if ($cart_num == 0) {
                                ?>

                                    <!--empty view-->
                                    <div class="col-12">
                                        <div class="row">
                                            <center>
                                                <div class="col-12"><img src="resources/shopping-cart.png" style="height: 250px;" /></div>
                                            </center>
                                            <div class="col-12 text-center mb-2 mt-2">
                                                <span class="form-label fs-3 fw-bold">
                                                    Your Cart is Empty
                                                </span>
                                                <p class="form-label mt-1">
                                                    Looks like you haven't added any items to your cart
                                                </p>
                                            </div>
                                            <div class="offset-lg-4 col-12 col-lg-4 mb-4 d-grid ">
                                                <a href="index.php" class="text-decoration-none text-center">
                                                    <img src="resources/shopping-cart.png" style="height: 30px;" />
                                                    Start Shopping
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--empty view-->

                                <?php
                                } else {
                                ?>

                                    <!--products-->
                                    <div class="col-12 col-lg-8  border-end">

                                        <table class="table ">
                                            <thead>
                                                <tr>

                                                    <th scope="col">Image</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Action</th>

                                                </tr>
                                            </thead>

                                            <?php
                                            for ($x = 0; $x < $cart_num; $x++) {
                                                $cart_data = $cart_rs->fetch_assoc();

                                                $product_rs = Shopply::search("SELECT * FROM `product` WHERE 
                                                            `product_id`='" . $cart_data["product_product_id"] . "'");
                                                $product_data = $product_rs->fetch_assoc();

                                                $total = $total + ($product_data["price"] * $cart_data["qty"]);

                                                $ship = 0;
                                                $ship = $product_data["shipping_cost"];
                                                $shipping = $shipping + $ship;

                                                //$shipping = ($product_data["shipping_cost"] * $cart_data["qty"]);

                                                $seller_rs = Shopply::search("SELECT * FROM `user` WHERE `email`='" . $product_data["user_email"] . "'");
                                                $seller_data = $seller_rs->fetch_assoc();
                                                $seller = $seller_data["fname"] . " " . $seller_data["lname"];
                                            ?>

                                                <tbody>
                                                    <tr class="">

                                                        <?php
                                                        $img = array();

                                                        $images_rs = Shopply::search("SELECT * FROM `product_img` WHERE `product_product_id`='" . $cart_data["product_product_id"] . "'");
                                                        $images_data = $images_rs->fetch_assoc();
                                                        ?>

                                                        <td><img src="<?php echo $images_data["img_path"] ?>" class="img-fluid rounded-start" style="height: 100px;" /></td>
                                                        <td>
                                                            <div class="col-12">
                                                                <h5><?php echo $product_data["title"]; ?></h5>
                                                            </div>
                                                            <div class="col-12">
                                                                <p><b>Seller :</b> <?php echo $seller ?></p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <!-- <div class="col-3">
                                                                <div class="row">
                                                                    <div class="wrapper">
                                                                        <span class="minus"><a href="" class="text-decoration-none" onclick='qty_inc();'>-</a></span>
                                                                        <span class="num" id="qty_input">01</span>
                                                                        <span class="plus"><a href="" class="text-decoration-none" onclick='qty_dec();'>+</a></span>
                                                                    </div>
                                                                </div>
                                                            </div> -->

                                                            <div class="d-flex align-items-center gap-2">
                                                                <button class="btn btn-primary btn-sm" onclick="decrementCartQty(<?php echo $cart_data['cart_id'] ?>);">-</button>
                                                                <input type="number" id="qty<?php echo $cart_data['cart_id'] ?>" class="form-control form-control-sm text-center" style="max-width: 100px;" value="<?php echo $cart_data["qty"] ?>" disabled>
                                                                <button class="btn btn-primary btn-sm" onclick="incrementCartQty(<?php echo $cart_data['cart_id'] ?>);">+</button>
                                                            </div>

                                                        </td>
                                                        <td>
                                                            <div class="col-12">
                                                                <h5>$<?php echo $product_data["price"]; ?></h5>
                                                            </div>
                                                            <div class="col-12">
                                                                <p><b>Shipping :</b> $<?php echo $product_data["shipping_cost"]; ?></p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-2 align-self-start">
                                                                <div class="row">
                                                                    <a href="<?php echo "singleProductView.php?id=" . ($product_data["product_id"]); ?>"><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Buy Now"><img src="resources/otherimgs/shopping-bag.png" style="height: 27px;" /></span></a>
                                                                    <a href="#" onclick="removeFromCart(<?php echo $cart_data['cart_id']; ?>);"><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Remove"><img src="resources/otherimgs/delete.png" class="mt-3" style="height: 23px;" /></span></a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>




                                            <?php

                                            }

                                            ?>
                                        </table>



                                        <div class="col-12">
                                            <div class="row ">
                                                <span>Have a coupon? Enter coupon code</span>

                                                <div class="col-12 mt-2">
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <input type="text" placeholder="coupon code" class="form-control" />
                                                        </div>

                                                        <button type="button" class="col-2 btn btn-warning border" style="color: white;">Apply</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--products-->


                                    <!--cart summery-->
                                    <div class="col-12 col-lg-3 ms-5 shadow p-3 mb-5 bg-body-tertiary rounded border-1 border-rounded">
                                        <h2>CART TOTALS</h2>
                                        <hr />
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <span class="fs-6 fw-bold">Items (<?php echo $cart_num; ?>)</span>
                                            </div>

                                            <div class="col-6 text-end mb-3">
                                                <span class="fs-6 fw-bold">$ <?php echo $total; ?></span>
                                            </div>

                                            <div class="col-6 mb-3">
                                                <span class="fs-6 fw-bold">Discounts</span>
                                            </div>

                                            <div class="col-6 text-end mb-3">
                                                <span class="fs-6 fw-bold">0 %</span>
                                            </div>

                                            <div class="col-6">
                                                <span class="fs-6 fw-bold">Shipping</span>
                                            </div>

                                            <div class="col-6 text-end">
                                                <span class="fs-6 fw-bold">$ <?php echo $shipping; ?></span>
                                            </div>
                                            <div>
                                                <hr />
                                            </div>

                                            <div class="col-6">
                                                <span class="fs-6 fw-bold">Total</span>
                                            </div>

                                            <div class="col-6 text-end">
                                                <span class="fs-6 fw-bold">$ <?php echo $total + $shipping; ?></span>
                                            </div>
                                        </div>

                                        <div class="row mt-5">
                                            <div class="col-12 d-grid">
                                                <button type="button" class="btn btn-outline-dark btn2 border" style="color: white;" onclick="checkOut();">Proceed to Checkout</button>
                                            </div>

                                            <div class="col-12 mt-3 text-decoration-none">
                                                <a href="index.php" class="text-decoration-none text-center">
                                                    <p> <img src="resources/less-than-symbol.png" style="height: 20px;" /> Continue shopping</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--cart summery-->

                                <?php

                                }

                                ?>

                            </div>

                        </div>

                    </div>

                </div>
                <?php include "footer.php"; ?>
            </div>



        </div>

        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script>
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl)
            })
        </script>

    </body>

    </html>

<?php

}else{
    header("location:signin.php");
}

?>