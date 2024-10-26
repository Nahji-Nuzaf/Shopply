<?php

session_start();
require "connectionshop.php";

?>


<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SHOPPLY</title>
    <link rel="icon" href="resources/Shopply Logo.png" />

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>

<body>

    <div class="container-fluid">
        <div class="row">


            <?php
            include "header.php";
            ?>

            <!--basicSearch-->

            <div class="col-12 col-md-12 bsearch" style="background-color: #CF9FFF;">
                <div class="row border-bottom mt-3" style="height: 55px;">

                    <div class="col-12">
                        <div class="row">

                            <div class="col-12 col-lg-2 col-md-2 col-sm-2 mt-1" style="text-align: center;">
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item ms-3"><span><a class="text-decoration-none text-black" href="advancedSearch.php">Advanced</a></span></li>
                                </ul>
                            </div>
                            
                            <div class="col-12 col-lg-5 col-md-5 col-sm-2 ms-5 mb-3">
                                <input type="text" class="form-control sbox" placeholder="Search..." id="search"/>
                            </div>
                            <div class="col-12 col-lg-2 col-md-2 col-sm-2 ms-3 mb-3 d-grid">
                                <button class="btn btn-outline-primary fw-bold btn2" id="search" onclick="basicSearch(0);">Search</button>
                            </div>


                            <div class="col-lg-2 col-md-4 col-sm-4 ms-5 mt-1">
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item"><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Messages"><a href="purchaseHistory.php" class="text-black"><img src="resources/otherimgs/tooth-brush.png" class="otherimgs" /></a></span></li>
                                    <li class="list-inline-item ms-1"><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Wishlist"><a href="wishlist.php" class="text-black"><img src="resources/otherimgs/wishlist.png" class="otherimgs" /></a></span></li>
                                    <li class="list-inline-item ms-1"><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Cart"><a href="cart.php" class="text-black"><img src="resources/otherimgs/cart (1).png" class="otherimgs" /></a></span></li>
                                    <li class="list-inline-item"><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="User Profile"><a href="userprofile.php" class="text-black"><img src="resources/otherimgs/user.png" class="otherimgs" /></a></span></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <hr />
                </div>
            </div>
            <!--basicSearch-->

            <!--toast-->

            <div class="modal" tabindex="-1" id="hm">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Alert</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger" alert="role" id="alertmsg">

                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!--toast-->

            <div class="col-12 justify-content-center" id="basicSearchResult">
                <div class="row mb-3 mt-3">

                    <div class="col-10 offset-1">

                        <div class="row">

                            <!--catlg-->

                            <div class="col-lg-3 mx-auto mt-3 border-end catlg">

                                <p class="fw-bold fs-4 text-warning" style="font-family: 'Lato-Black';">Categories</p>

                                <?php

                                $categories = Shopply::search("SELECT * FROM `category`");
                                $cat_num = $categories->num_rows;

                                for ($x = 0; $x < $cat_num; $x++) {
                                    $cat_datas = $categories->fetch_assoc();

                                ?>
                                    <p style="font-size: 17px;"><a href="mobilephones.php" class="text-decoration-none text-dark "><?php echo $cat_datas["category_name"]; ?></a></p>

                                <?php
                                }

                                ?>

                            </div>

                            <!--catlg-->

                            <!--catmdsm-->

                            <div class="col-md-3 catsm">

                                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Categories</button>

                                <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Categories</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <?php


                                        $categories = Shopply::search("SELECT * FROM `category`");
                                        $cat_num = $categories->num_rows;

                                        for ($x = 0; $x < $cat_num; $x++) {
                                            $cat_datas = $categories->fetch_assoc();

                                        ?>
                                            <p style="font-size: 17px;"><a href="#" class="text-decoration-none text-dark "><?php echo $cat_datas["category_name"]; ?></a></p>

                                        <?php
                                        }

                                        ?>
                                    </div>
                                </div>

                            </div>

                            <!--catmdsm-->

                            <!--Carousel-->

                            <div class="col-12 col-lg-8 carouselsm">

                                <div id="carouselExampleCaptions" class="mx-auto carousel slide slider" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active" data-bs-interval="1000">
                                            <img src="resources/carousels/1.png" class="d-block poster-image-1">
                                            <div class="carousel-caption d-none d-md-block poster-caption">
                                                <i class="bi bi-apple poster-title"> </i>
                                                <h5 class="align-self-start"> iPhone 14 Series</h5>
                                                <p class="poster-text">Up to 10% OFF Voucher</p>
                                                <a class="text-decoration-none" href="#">Shop Now <i class="bi bi-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="carousel-item" data-bs-interval="1000">
                                            <img src="resources/carousels/2.png" class="d-block poster-image-1">
                                            <div class="carousel-caption d-none d-md-block poster-caption">
                                                <h5 class="align-self-start poster-text-1">Enhance Your Music Experience</h5>
                                                <button type="button" class="btn btn-warning mt-2">Buy Now</button>
                                            </div>
                                        </div>
                                        <div class="carousel-item" data-bs-interval="1000">
                                            <img src="resources/carousels/3.png" class="d-block poster-image-1">
                                            <div class="carousel-caption d-none d-md-block poster-caption-1">
                                                <h5 class="poster-title">Be Free......</h5>
                                                <p class="poster-text">Experience The Lowest Delivery Costs With Us</p>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>

                            </div>

                            <!--Carousel-->

                        </div>

                        <hr />

                        <!--Categories-->
                        <div class="row">
                            <div class="col-12">
                                <div class="row mb-2">

                                    <?php

                                    $categories = Shopply::search("SELECT * FROM `category`");

                                    $cat_num = $categories->num_rows;


                                    for ($y = 0; $y < $cat_num; $y++) {
                                        $cat_data = $categories->fetch_assoc();

                                    ?>

                                        <!--category names-->

                                        <div class="col-12">
                                            <img class="mb-4" style="height: 40px;" src="resources/minus.png" />
                                            <span class="set1"><?php echo $cat_data["category_name"]; ?></span>
                                        </div>
                                        <hr />

                                        <!--category names-->

                                        <!--product names-->

                                        <div class="row">

                                            <?php

                                            $product_rs = Shopply::search("SELECT * FROM `product` WHERE `category_id`='" . $cat_data["id"] . "' AND `status_status_id`='1' ORDER BY `datetime_added` DESC LIMIT 4 OFFSET 0");
                                            $product_num = $product_rs->num_rows;

                                            for ($x = 0; $x < $product_num; $x++) {

                                                $product_data = $product_rs->fetch_assoc();

                                            ?>

                                                <!--card-->
                                                
                                                <div class="col-6 col-md-3 mx-auto" data-aos="fade-up">

                                                    <div class="product-box mb-3">

                                                        <div class="product-inner-box position-relative">
                                                            <div class="icons position-absolute">
                                                                <a href="#" onclick="addToWatchlist(<?php echo $product_data['product_id'] ?>);" class="text-decoration-none text-dark"><i class="bi bi-heart-fill"></i></a>



                                                                <a href="<?php echo "singleProductView.php?id=" . ($product_data["product_id"]); ?>" class="text-decoration-none text-dark"><i class="bi bi-eye-fill"></i></a>
                                                            </div>

                                                            <div class="onsale position-absolute top-0 start-0">
                                                                <span class="badge rounded-0">-10%</span>
                                                            </div>

                                                            <?php

                                                            $img_rs = Shopply::search("SELECT * FROM `product_img` WHERE `product_product_id`='" . $product_data["product_id"] . "'");
                                                            $img_data = $img_rs->fetch_assoc();

                                                            ?>

                                                            <img src="<?php echo $img_data["img_path"] ?>" alt="product" class="img-fluid" />

                                                            <div class="cart-btn">
                                                                <button class="btn btn-dark btn1" onclick="addToCart(<?php echo $product_data['product_id']; ?>);">Add to Cart <i class="bi bi-cart"></i></button>
                                                            </div>
                                                        </div>

                                                        <div class="product-info">

                                                            <div class="product-name">
                                                                <h5 class="card-title fw-bold fs-3"><?php echo $product_data["title"]; ?></h5>
                                                                <span class="card-text text-primary fw-bold fs-4">$<?php echo $product_data["price"]; ?></span><br />
                                                                <span class="card-text text-warning fw-bold">In Stock</span><br />
                                                                <span class="card-text text-success fw-bold"><?php echo $product_data["qty"]; ?> Items Available</span><br />
                                                                <span class="badge">
                                                                    <i class="bi bi-star-fill text-warning fs-6"></i>
                                                                    <i class="bi bi-star-fill text-warning fs-6"></i>
                                                                    <i class="bi bi-star-fill text-warning fs-6"></i>
                                                                    <i class="bi bi-star-fill text-warning fs-6"></i>
                                                                    <i class="bi bi-star-fill text-warning fs-6"></i>
                                                                </span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <!--card-->

                                            <?php

                                            }

                                            ?>

                                        </div>

                                        <!--product names-->


                                    <?php
                                    }

                                    ?>

                                </div>

                            </div>
                        </div>

                        <!--Categories-->



                        <center class="mt-3"><button type="button" class="btn btn-primary">View All Products</button></center>

                        <hr />



                        <!--categories-->

                        <div class="row mt-4">
                            <div class="col-12">

                                <div class="row mb-2">
                                    <div class="col-12 rectangle">
                                        <img style="height: 40px;" src="resources/minus.png" />
                                        <span>Categories</span>
                                    </div>
                                    <div class="col-12">
                                        <span class="set1">Browse By Category</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--categories-->



                        <ul class="list-unstyled list-inline">

                            <li class="list-inline-item col-3 col-md-2 border border-1 border-secondary mb-1 ms-4 text-center">
                                <a href="#"><img src="resources/categorypics/iphone.png" class="img-cat mt-3 mb-1" style="height: 100px;" /></a>
                                <p>Phones</p>
                            </li>
                            <li class="list-inline-item col-3 col-md-2 border border-1 border-secondary mb-1 ms-4 text-center">
                                <a href="#"><img src="resources/categorypics/gaming.png" class="img-cat mt-3 mb-1" style="height: 100px;" /></a>
                                <p>Computers</p>
                            </li>
                            <li class="list-inline-item col-3 col-md-2 border border-1 border-secondary mb-1 ms-4 text-center">
                                <a href="#"><img src="resources/categorypics/sports.png" class="img-cat mt-3 mb-1" style="height: 100px;" /></a>
                                <p>Sportings</p>
                            </li>
                            <li class="list-inline-item col-3 col-md-2 border border-1 border-secondary mb-1 ms-4 text-center">
                                <a href="#"><img src="resources/categorypics/clothes.png" class="img-cat mt-3 mb-1" style="height: 100px;" /></a>
                                <p>Clothes</p>
                            </li>
                            <li class="list-inline-item col-3 col-md-2 border border-1 border-secondary mb-1 ms-4 text-center">
                                <a href="#"><img src="resources/categorypics/toys.png" class="img-cat mt-3 mb-1" style="height: 100px;" /></a>
                                <p>Toys</p>
                            </li>

                        </ul>
                        <hr />
                    </div>
                </div>
            </div>
            <?php include "footer.php" ?>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>