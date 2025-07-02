<?php

session_start();
require "connectionshop.php";

if (isset($_SESSION["shopply"])) {
    $email = $_SESSION["shopply"]["email"];
    $fname = $_SESSION["shopply"]["fname"];
    $lname = $_SESSION["shopply"]["lname"];

?>
    <!DOCTYPE html>

    <html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shopply | Purchase History</title>
        <link rel="icon" href="resources/Shopply Logo.png" />

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />

    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <?php
                include "header.php";

                ?>

                <div class="col-12">
                    <div class="row">



                        <div class="col-12 col-lg-10 mb-3 mt-3 offset-lg-1">
                            <div class="row">
                                <div class="col-12">
                                    <p class="fw-bold mb-0" style="font-size: 45px;">Purchase History.</p>
                                </div>
                                <hr />
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-12">
                                <div class="row">
                                    <div class="offset-lg-2 col-12 col-lg-6 mb-3">
                                        <input type="text" class="form-control" placeholder="Search in Wishlist..." />
                                    </div>
                                    <div class="col-12 col-lg-2 mb-3 d-grid">
                                        <button class="btn btn-outline-primary">Search</button>
                                    </div>
                                </div>
                            </div>



                            <?php

                            $ph_rs = Shopply::search("SELECT * FROM `invoice` WHERE `user_email`='" . $email . "' ORDER BY `id` DESC");
                            $ph_num = $ph_rs->num_rows;

                            if ($ph_num == 0) {
                            ?>

                                <!--empty view-->
                                <div class="col-12 mt-2">
                                    <div class="row">
                                        <center>
                                            <div class="col-11 ms-5"><img src="resources/history.png" style="height: 250px;" /></div>
                                        </center>
                                        <div class="col-12 text-center mb-2 mt-2">
                                            <span class="form-label fs-3 fw-bold">
                                                No Purchase History
                                            </span>
                                            <p class="form-label mt-1">
                                                Chack Back after your next Shopping trip !!
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

                                <!-- card -->

                                <div class="col-12 mb-3 mx-auto mt-5 col-lg-10 border-start border-end">

                                    <table class="table ">
                                        <thead>
                                            <tr>

                                                <th scope="col">Image</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Order Id</th>
                                                <th scope="col">Invoice</th>
                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>

                                        <?php

                                        for ($i = 0; $i < $ph_num; $i++) {
                                            $ph_data = $ph_rs->fetch_assoc();

                                            $product_rs = Shopply::search("SELECT * FROM `product` WHERE `product_id`='" . $ph_data["product_product_id"] . "'");
                                            $product_data = $product_rs->fetch_assoc();

                                            $user_rs = Shopply::search("SELECT * FROM `user` WHERE `email`='" . $product_data["user_email"] . "'");
                                            $user_data = $user_rs->fetch_assoc();
                                            $seller = $user_data["fname"] . " " . $user_data["lname"];

                                        ?>

                                            <!-- feedback modal -->

                                            <div class="modal fade" tabindex="-1" id="fm<?php echo $ph_data['product_product_id'] ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-10">
                                                                            <h1 class="modal-title fs-4 fw-bold" id="exampleModalLabel"><i class="bi bi-chat-square-quote-fill"></i> Rate & Review</h1>
                                                                        </div>
                                                                        <div class="col-1 ms-4">
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <span class="text-black-50 ms-2" style="font-size: 15px;">Your Review will be posted on the internet publicly.</span>
                                                            </div>

                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <?php
                                                                
                                                                $img_rs = Shopply::search("SELECT * FROM `profile_image` WHERE `user_email`='".$email."'");
                                                                $img_data = $img_rs->fetch_assoc();
                                                                
                                                                ?>
                                                                <div class="col-3">
                                                                    <img src="<?php echo $img_data["path"]?>" height="70px" class="mt-3 ms-3" />
                                                                </div>
                                                                <div class="col-9">
                                                                    <div class="row">
                                                                        <span class="fw-bold fs-3 mt-2 ms-3"><?php echo $fname . $lname?></span>
                                                                        <span class="text-black-50 ms-3 mb-3" style="font-size: 15px;"><?php echo $email?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-4">
                                                                    <span class="fw-bold" style="font-size: 15px;">Overall Rating</span>
                                                                </div>
                                                                <div class="col-8">
                                                                    <div class="row ms-auto">
                                                                        <div class="col-4">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="or1">
                                                                                <label class="form-check-label" for="or1">
                                                                                    Good
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-5">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="or2">
                                                                                <label class="form-check-label" for="or2">
                                                                                    Not Bad
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-2">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="or3">
                                                                                <label class="form-check-label" for="or3">
                                                                                    Bad
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-12">
                                                                    <span class="fw-bold" style="font-size: 15px;">Describe Your Experience</span>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="mb-3">
                                                                            <textarea class="form-control" id="feed" rows="5"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="button" class="btn btn-warning" onclick="saveFeedback(<?php echo $ph_data['product_product_id'] ?>);">Post</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--feedback modal-->

                                            <tbody>
                                                <tr>

                                                    <?php
                                                    // $img = array();

                                                    $image_rs = Shopply::search("SELECT * FROM `product_img` WHERE `product_product_id`='" . $ph_data["product_product_id"] . "'");
                                                    $image_data = $image_rs->fetch_assoc();
                                                    ?>

                                                    <td><img src="<?php echo $image_data["img_path"] ?>" class="img-fluid rounded-start" style="height: 100px;" /></td>
                                                    <td>
                                                        <div class="col-12">
                                                            <h5 style="color: green;"><?php echo $product_data["title"]; ?></h5>
                                                        </div>
                                                        <div class="col-12">
                                                            <p><b>Seller :</b> <?php echo $seller ?></p>
                                                        </div>
                                                    </td>

                                                    <td><?php echo $ph_data["qty"]; ?></td>

                                                    <td>
                                                        <div class="col-12">
                                                            <h5 style="color: blue;"> $ <?php echo $ph_data["amount"]; ?></h5>
                                                        </div>
                                                        <div class="col-12">
                                                            <p class="mb-2"><b>Price :</b> $<?php echo $product_data["price"]; ?></p>
                                                            <p><b>Shipping :</b> $<?php echo $product_data["shipping_cost"]; ?></p>
                                                        </div>
                                                    </td>
                                                    <td># <?php echo $ph_data["order_id"]; ?></td>
                                                    <td>
                                                        <div class="col-2 align-self-start">
                                                            <div class="row">
                                                                <a href="<?php //echo "invoice.php?id=" . ($ph_data["product_product_id"]) + "&qty=" + ($ph_data["qty"]); 
                                                                            ?>"><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="View Invoice"><img src="resources/otherimgs/eye.png" style="height: 27px;" /></span></a>
                                                                <a href="#"><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Download Invoice"><img src="resources/otherimgs/download (1).png" class="mt-3" style="height: 23px;" /></span></a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-4">
                                                            <div class="row">
                                                                <button class="btn btn-outline-primary btn2" id="search" onclick="addFeedback(<?php echo $ph_data['product_product_id'] ?>);">Review</button>
                                                                <button class="btn btn-outline-primary mt-2 btn2" id="search">Remove</button>
                                                                <!-- <a href="#" onclick="addFeedback()"><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Review"><img src="resources/otherimgs/feedback.png" style="height: 27px;" /></span></a>
                                                                <a href="#" onclick="removeFromCart(<?php //echo $cart_data['cart_id']; 
                                                                                                    ?>);"><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Remove"><img src="resources/otherimgs/delete.png" class="mt-3" style="height: 23px;" /></span></a> -->
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>


                                        <?php

                                        }

                                        ?>


                                        <?php

                                        //}

                                        ?>
                                    </table>

                                </div>

                                <!-- card -->

                            <?php

                            }

                            ?>

                        </div>





                    </div>
                    <?php include "footer.php"; ?>
                </div>

            </div>

            <script src="bootstrap.bundle.js"></script>
            <script src="script.js"></script>
            <script src="bootstrap.js"></script>

            <script>
                var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
                var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                    return new bootstrap.Popover(popoverTriggerEl)
                })
            </script>

            <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
            <script>
                AOS.init();
            </script>
    </body>


    </html>

<?php

}else{
    header("location:signin.php");
}

?>