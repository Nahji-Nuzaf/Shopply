<?php

session_start();
require "connectionshop.php";

if(isset($_SESSION["shopply"])){

?>

    <!DOCTYPE html>

        <html>

        <head>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Shopply | Wishlist</title>
            <link rel="icon" href="resources/Shopply Logo.png" />

            <link rel="stylesheet" href="bootstrap.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
            <link rel="stylesheet" href="style.css"/>

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
                                        <p class="fw-bold mb-0" style="font-size: 45px;">Wishlist.</p>
                                    </div>
                                    <hr/>
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
                                
                                $wishlist_rs = Shopply::search("SELECT * FROM `wishlist` WHERE `user_email`='".$_SESSION["shopply"]["email"]."'");
                                $wishlist_num = $wishlist_rs->num_rows;


                                if($wishlist_num == 0 ){
                                    ?>
                                    <!--empty view-->
                                        <div class="col-12 mt-2">
                                            <div class="row">
                                                <center><div class="col-11 ms-5"><img src="resources/no-task.png" style="height: 250px;"/></div></center>
                                                <div class="col-12 text-center mb-2 mt-2">
                                                    <span class="form-label fs-3 fw-bold" >
                                                        Your Wishlist is Empty
                                                    </span>
                                                    <p class="form-label mt-1" >
                                                        Looks like you haven't added any items to your Wishlist
                                                    </p>
                                                </div>
                                                <div class="offset-lg-4 col-12 col-lg-4 mb-4 d-grid ">
                                                    <a href="index.php" class="text-decoration-none text-center">
                                                        <img src="resources/shopping-cart.png" style="height: 30px;"/>
                                                        Start Shopping
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <!--empty view-->

                                    <?php
                                }else{

                                    for($x=0; $x < $wishlist_num; $x++){
                                        $wishlist_data = $wishlist_rs->fetch_assoc();
                                    ?>
                                    
                                        <!-- card -->
                                        <div class="card mb-3 mx-auto mt-3 col-12 col-lg-5">
                                            <div class="row">
                                                <div class="col-md-4 mt-4">

                                                    <?php
                                                        $img = array();

                                                        $images_rs = Shopply::search("SELECT * FROM `product_img` WHERE `product_product_id`='".$wishlist_data["product_product_id"]."'");
                                                        $images_data = $images_rs->fetch_assoc();
                                                    ?>

                                                    <img src="<?php echo $images_data["img_path"]; ?>" class="img-fluid rounded-start" style="height: 150px;"/>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <?php
                                                            $product_rs = Shopply::search("SELECT * FROM `product` WHERE `product_id`='".$wishlist_data["product_product_id"]."'");
                                                            $product_data = $product_rs->fetch_assoc();
                                                        ?>
                                                        <h5 class="card-title fw-bold"><?php echo $product_data["title"];?></h5>
                                                        <span class="card-text fw-bold text-primary">$<?php echo $product_data["price"];?></span><br />
                                                        <span class="card-text fs-6"><?php echo $product_data["description"];?></span><br />
                                                        <span class="card-text fw-bold text-success">Availability : <?php echo $product_data["qty"];?> Items left</span><br />

                                                        <ul class="list-unstyled list-inline mt-2">

                                                            <li class="list-inline-item ms-1"><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" 
                                                    data-bs-trigger="hover focus" data-bs-content="Buy Now"><a href="<?php echo "singleProductView.php?id=". ($product_data["product_id"]); ?>"><img src="resources/otherimgs/shopping-bag.png" style="height: 25px;"/></a></span></li>
                                                            <li class="list-inline-item ms-1"><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" 
                                                    data-bs-trigger="hover focus" data-bs-content="Add to Cart"><a href="#" onclick="addToCart(<?php echo $product_data['product_id'];?>);"><img src="resources/otherimgs/cart (1).png" style="height: 23px;"/></a></span></li>
                                                            <li class="list-inline-item ms-1"><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" 
                                                    data-bs-trigger="hover focus" data-bs-content="Remove"><a href="#" onclick='removeFromWatchlist(<?php echo $wishlist_data["wishlist_id"]; ?>);'><img src="resources/otherimgs/delete.png" style="height: 21px;"/></a></span></li>

                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- card -->

                                    <?php
                                    }
                                }
                                ?>

                            </div>

                        </div>

                    </div>
                <?php include "footer.php";?>
                </div>
                
            </div>

            <script src="bootstrap.bundle.js"></script>
            <script src="script.js"></script>

            <script>
                var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
                var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                    return new bootstrap.Popover(popoverTriggerEl)
                })
            </script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        </body>


    </html>


<?php

}else{
    header("location:signin.php");
}

?>
