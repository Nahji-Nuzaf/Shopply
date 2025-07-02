<?php

session_start();

require "connectionshop.php";

?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SHOPPLY | Mobiles</title>
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

            <div class="col-12 col-md-10 mx-auto">
                <div class="row border-bottom mt-3" style="height: 55px;">

                    <div class="col-12 ms-3">
                        <div class="row">

                            <div class="col-12 col-lg-1 ms-5 mt-1" style="text-align: center;">
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item ms-3"><span><a class="text-decoration-none text-black" href="advancedSearch.php">Advanced</a></span></li>
                                </ul>
                            </div>
                            <div class="col-12 col-lg-5 ms-5 mb-3">
                                <input type="text" class="form-control sbox" placeholder="Search..." id="search" />
                            </div>
                            <div class="col-12 col-lg-2 ms-3 mb-3 d-grid">
                                <button class="btn btn-outline-primary fw-bold btn2" onclick="basicSearch(0);">Search</button>
                            </div>


                            <div class="col-lg-2 col-md-12  ms-5 mt-1">
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item"><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Messages"><a href="msg2.php" class="text-black"><i class="bi bi-chat-dots" style="font-size: 20px;"></i></a></span></li>
                                    <li class="list-inline-item ms-1"><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Wishlist"><a href="wishlist.php" class="text-black"><i class="bi bi-suit-heart" style="font-size: 20px;"></i></a></span></li>
                                    <li class="list-inline-item ms-1"><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Cart"><a href="cart.php" class="text-black"><i class="bi bi-cart" style="font-size: 20px;"></i></a></span></li>
                                    <li class="list-inline-item"><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="User Profile"><a href="userprofile.php" class="text-black"><i class="bi bi-person" style="font-size: 20px;"></i></a></span></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <hr />
                </div>
            </div>

            <div class="col-12">
                <div class="row">

                    <!-- filter -->
                    <div class="col-12 col-lg-2 offset-lg-1 my-3 border border-primary rounded" style="background-color: #FFFFCC;">
                        <div class="row">
                            <div class="col-12 mt-3">
                                <div class="row">

                                    <div class="col-12 mb-2">
                                        <p class="form-label text-center fw-bold fs-5">Filter Products</p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row ">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Search..." id="search">
                                                <span class="input-group-text"><i class="bi bi-search"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <ol class="col-12" style="list-style: none;">
                                        <div class="row">

                                            <hr class="col-10 offset-1 mt-2" />

                                            <div class="col-12">
                                                <li class="fw-bold">Upload Time</li>

                                                <ul>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="radio" name="r1" id="new">
                                                        <label class="form-check-label" for="n">
                                                            Newest to oldest
                                                        </label>
                                                    </div>
                                                </ul>
                                                <ul>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="r1" id="old">
                                                        <label class="form-check-label" for="o">
                                                            Oldest to newest
                                                        </label>
                                                    </div>
                                                </ul>
                                            </div>

                                            <hr class="col-10 offset-1 mt-2" />

                                            <div class="col-12">
                                                <li class="fw-bold">Quantity</li>

                                                <ul>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="r2" id="high">
                                                        <label class="form-check-label" for="h">
                                                            High to low
                                                        </label>
                                                    </div>
                                                </ul>
                                                <ul>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="r2" id="low">
                                                        <label class="form-check-label" for="l">
                                                            Low to high
                                                        </label>
                                                    </div>
                                                </ul>
                                            </div>

                                            <hr class="col-10 offset-1 mt-2" />

                                            <div class="col-12">
                                                <li class="fw-bold">Condition</li>

                                                <ul>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="r3" id="brand">
                                                        <label class="form-check-label" for="b">
                                                            Brand New
                                                        </label>
                                                    </div>
                                                </ul>
                                                <ul>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="r3" id="used">
                                                        <label class="form-check-label" for="u">
                                                            Used
                                                        </label>
                                                    </div>
                                                </ul>
                                            </div>

                                            <hr class="col-10 offset-1 mt-2" />

                                            <div class="col-12">
                                                <li class="fw-bold">Buying Format</li>

                                                <ul>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="radio" name="r4" id="bn">
                                                        <label class="form-check-label" for="n">
                                                            Buy Now
                                                        </label>
                                                    </div>
                                                </ul>
                                                <ul>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="r4" id="au">
                                                        <label class="form-check-label" for="o">
                                                            Auction
                                                        </label>
                                                    </div>
                                                </ul>
                                                <ul>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="r4" id="ex">
                                                        <label class="form-check-label" for="o">
                                                            Exchange
                                                        </label>
                                                    </div>
                                                </ul>
                                            </div>

                                            <hr class="col-10 offset-1 mt-2" />

                                            <div class="col-12">
                                                <li class="fw-bold">Pricing</li>

                                                <div class="mx-auto mt-1">
                                                    <div class=" input-group mb-2 mt-2">
                                                        <span class="input-group-text">$</span>
                                                        <input type="text" placeholder="Min" class="form-control" id="mincost" />
                                                    </div>

                                                    <p class="text-center">To</p>

                                                    <div class="input-group mb-2 mt-2">
                                                        <span class="input-group-text">$</span>
                                                        <input type="text" placeholder="Max" class="form-control" id="maxcost" />
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </ol>

                                    <div class="col-12 text-center mt-3 mb-3">
                                        <div class="row g-2">
                                            <div class="col-12 col-lg-6 d-grid">
                                                <button class="btn btn-primary fw-bold" onclick="sort(0);">Sort</button>
                                            </div>
                                            <div class="col-12 col-lg-6 d-grid">
                                                <button class="btn btn-warning fw-bold" onclick="clearSort();">Clear</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- filter -->

                    <!--product names-->

                    <div class="col-12 col-lg-9 mt-5">

                        <div class="row">

                            <?php

                            $categories = Shopply::search("SELECT * FROM `category`");
                            $cat_num = $categories->num_rows;
                            $cat_data = $categories->fetch_assoc();

                            $product_rs = Shopply::search("SELECT * FROM `product` WHERE `category_id`='" . $cat_data["id"] . "' AND `status_status_id`='1' ORDER BY `datetime_added` DESC LIMIT 4 OFFSET 0");
                            $product_num = $product_rs->num_rows;

                            for ($x = 0; $x < $product_num; $x++) {

                                $product_data = $product_rs->fetch_assoc();

                            ?>

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

                            <?php

                            }

                            ?>

                        </div>
                    </div>
                    <!--product names-->

                </div>
            </div>

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

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>


</body>




</html>