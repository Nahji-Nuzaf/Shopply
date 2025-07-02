<?php

session_start();
require "connectionshop.php";
include "header.php";



if (isset($_GET["id"])) {

    $pid = $_GET["id"];



    $product_rs = Shopply::search("SELECT product.product_id,product.price,product.qty,product.description,
    product.title,product.datetime_added,product.shipping_cost,product.color_name,product.product_dimension,
    product.category_id,product.model_has_brand_id,product.status_status_id,
    product.condition_condition_id,product.user_email,product.selling_type_selltype_id,product.payment_method_pm_id,product.shipping_shipping_id,model.model_name AS mname,
    brand.brand_name AS bname FROM `product` INNER JOIN `model_has_brand` ON 
    model_has_brand.id=product.model_has_brand_id INNER JOIN `brand` ON 
    brand.brand_id=model_has_brand.brand_brand_id INNER JOIN `model` ON 
    model.model_id=model_has_brand.model_model_id INNER JOIN `selling_type` ON selling_type.selltype_id=product.selling_type_selltype_id
    WHERE product.product_id='" . $pid . "'");

    $product_num = $product_rs->num_rows;

    if ($product_num == 1) {
        $product_data = $product_rs->fetch_assoc();

?>

        <!DOCTYPE html>

        <html>

        <head>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Shopply | <?php echo $product_data["title"]; ?></title>
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

                            <div class="col-12 d-flex justify-content-center">
                                <div class="row align-items-center">
                                    <nav aria-label="breadcrumb" class="">
                                        <ol class="breadcrumb my-auto">
                                            <li class="breadcrumb-item"><a class="text-decoration-none" href="index.php">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Category</li>
                                            <li class="breadcrumb-item active" aria-current="page">Single Product View</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>

                            <div class="col-12 col-lg-10 mx-auto mt-3">
                                <div class="row">

                                    <div class="col-lg-9" style="padding: 10px;">
                                        <div class="row">


                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-12">

                                                        <?php

                                                        $img_rs = Shopply::search("SELECT * FROM `product_img` WHERE `product_product_id` = '" . $pid . "'");
                                                        $img_num = $img_rs->num_rows;
                                                        $img_list = array();
                                                        $img_data = $img_rs->fetch_assoc();

                                                        ?>
                                                        <div class="mainImg" id="mainImg"><img src="<?php echo $img_data["img_path"]; ?>" width="100%" class="img-thumbnail mt-1 mb-1" id="product-img" /></div>
                                                        <?php

                                                        if ($img_num != 0) {

                                                        ?>

                                                            <ul class="list-unstyled list-inline">
                                                                <li class="list-inline-item">
                                                                    <div class="row">
                                                                        <?php

                                                                        for ($y = 1; $y < $img_num; $y++) {
                                                                            $img_data2 = $img_rs->fetch_assoc();
                                                                            $img_list2[$y] = $img_data2["img_path"];

                                                                        ?>

                                                                            <div class="col-4">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="small-img-row">

                                                                                            <div class="mainImg" id="mainImg"><img src="<?php echo $img_list2[$y]; ?>" width="100%" height="100px" class="img-thumbnail mt-1 mb-1 small-img" /></div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        <?php
                                                                        }

                                                                        ?>

                                                                    </div>
                                                                </li>
                                                            </ul>

                                                        <?php

                                                        } else {
                                                        ?>

                                                            <div class="mainImg" id="mainImg"><img src="<?php echo $img_data["img_path"]; ?>" width="100%" class="img-thumbnail mt-1 mb-1" /></div>
                                                            <div class="small-img-row">
                                                                <div class="small-img-col" id="mainImg"><img src="<?php echo $img_data["img_path"]; ?>" class="img-thumbnail mt-1 mb-1" /></div>
                                                                <div class="small-img-col" id="mainImg"><img src="<?php echo $img_data["img_path"]; ?>" class="img-thumbnail mt-1 mb-1" /></div>
                                                                <div class="small-img-col" id="mainImg"><img src="<?php echo $img_data["img_path"]; ?>" class="img-thumbnail mt-1 mb-1" /></div>
                                                            </div>

                                                        <?php

                                                        }

                                                        ?>

                                                    </div>
                                                </div>
                                            </div>

                                            <!--singleproductview-->

                                            <div class="col-12 col-lg-5 order-3">
                                                <div class="row">
                                                    <div class="col-12">

                                                        <?php

                                                        $price = $product_data["price"];
                                                        $add = ($price / 100) * 10;
                                                        $old_price = $price + $add;


                                                        ?>


                                                        <div class="row ">
                                                            <div class="col-8 my-3">
                                                                <span class="fs-1 fw-bold text-success"><?php echo $product_data["title"]; ?></span>
                                                            </div>

                                                            <div class="col-4 my-auto text-end">

                                                                <span class="badge">
                                                                    <i class="bi bi-star-fill text-warning fs-5"></i>
                                                                    <i class="bi bi-star-fill text-warning fs-5"></i>
                                                                    <i class="bi bi-star-fill text-warning fs-5"></i>
                                                                    <i class="bi bi-star-fill text-warning fs-5"></i>
                                                                    <i class="bi bi-star-fill text-warning fs-5"></i>
                                                                    &nbsp;&nbsp;&nbsp;
                                                                </span>
                                                            </div>
                                                        </div>


                                                        <div class="row ">
                                                            <div class="col-12">
                                                                <span class="fs-2 text-dark fw-bold">$<?php echo $price; ?></span>
                                                                &nbsp;&nbsp;
                                                                <span class="fs-6 text-danger fw-bold oldp" style="text-decoration: line-through;">$<?php echo $old_price; ?></span>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12 my-2">
                                                                <span class="fs-6 text-primary"><b><img src="resources/shipped.png" style="height: 25px;" /></b>&nbsp;&nbsp; 7 Day Shipping Policy</span><br />
                                                                <span class="fs-6 text-primary"><b><img src="resources/check-mark.png" style="height: 25px;" /></b>&nbsp;&nbsp; In Stock</span>
                                                            </div>
                                                        </div>

                                                        <hr />

                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row">
                                                                    <div class="col-12 my-2">
                                                                        <div class="row g-2">

                                                                            <div class="col-12 mb-2">
                                                                                <div class="row">
                                                                                    <div class="col-4">
                                                                                        <span class="text-black-75 fw-bold fs-5">Colours : </span>
                                                                                    </div>
                                                                                    <div class="col-7 my-auto"><?php echo $product_data["color_name"]; ?></div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="border border-1 border-secondary rounded overflow-hidden float-left mt-1 position-relative product-qty">
                                                                                <div class="col-12">
                                                                                    <span class="text-black-75 fw-bold fs-6">Quantity : </span>
                                                                                    <input type="text" class="border-0 fs-5 fw-bold text-start" style="outline: none;" pattern="[0-9]" value="1" onkeyup='check_value(<?php echo $product_data["qty"]; ?>);' id="qty_input" />

                                                                                    <div class="position-absolute qty-buttons">
                                                                                        <div class="justify-content-center d-flex flex-column align-items-center border border-1 border-secondary qty-inc">
                                                                                            <i class="bi bi-caret-up-fill text-primary fs-5" onclick='qty_inc(<?php echo $product_data["qty"]; ?>);'></i>
                                                                                        </div>
                                                                                        <div class="justify-content-center d-flex flex-column align-items-center border border-1 border-secondary qty-dec">
                                                                                            <i class="bi bi-caret-down-fill text-primary fs-5" onclick='qty_dec();'></i>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                            <span style="font-size: 13px;">Hurry ! We have only <?php echo $product_data["qty"]; ?> Products In Stock</span>
                                                                            <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                                                                <div class="progress-bar bg-info w-75"></div>
                                                                            </div>

                                                                            <hr />

                                                                            <div class="row">
                                                                                <div class="col-12 mt-3">
                                                                                    <div class="row">
                                                                                        <div class="col-5 text-center mt-2 mb-2 d-grid" style="color:white">
                                                                                            <button type="submit" class="btn btn-primary btn2" onclick="buynow(<?php echo $pid; ?>);">Buy Now</button>
                                                                                        </div>
                                                                                        <div class="col-5 text-center mt-2 mb-2 d-grid">
                                                                                            <a href="#" style="border-radius: 20px;" class="btn btn-warning" onclick="addToCart(<?php echo $product_data['product_id']; ?>);">Add To Cart</a>
                                                                                        </div>
                                                                                        <div class="col-2 mt-2 mb-2 text-center">
                                                                                            <li class="list-inline-item ms-1"><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Add to Wishlist"><a href="#" onclick="addToWatchlist(<?php echo $product_data['product_id'] ?>);"><img src="resources/otherimgs/wishlist.png" style="height: 40px;" /></a></span></li>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-12 mt-3">
                                                                                    <div class="row">

                                                                                        <div class="col-12">
                                                                                            <p class="mb-2 text-black-75" style="font-size: 20px;">Approved Payment Methods.</p>
                                                                                        </div>
                                                                                        <div class="col-12">
                                                                                            <div class="row">
                                                                                                <div class="offset-0 offset-lg-2 col-2 mx-auto pm pm1"></div>
                                                                                                <div class="col-2 mx-auto pm pm2"></div>
                                                                                                <div class="col-2 mx-auto pm pm3"></div>
                                                                                                <div class="col-2 mx-auto pm pm4"></div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <!--singleproductview-->

                                        </div>
                                    </div>


                                    <div class="col-12 col-lg-3">
                                        <div class="row">

                                            <div class="col-12 border shadow rounded mb-3">
                                                <div class="row">

                                                    <div class="col-6 mt-3">
                                                        <span class="fs-6 fw-bold">Ship To</span>
                                                    </div>

                                                    <?php

                                                    $user_details = Shopply::search("SELECT * FROM `user` 
                                                    INNER JOIN `country_code` ON country_code.cc_id=user.country_code_cc_id 
                                                    INNER JOIN `country` ON country.country_id=user.country_country_id WHERE `email`='" . $email . "'");

                                                    $user_data = $user_details->fetch_assoc();

                                                    ?>


                                                    <div class="col-6 mt-3 text-end">
                                                        <span class="fs-6 text-black-75"><img src="resources/location.png" class="mb-1" style="height: 20px;" />&nbsp;&nbsp;<?php echo $user_data["country_name"]; ?></span>
                                                    </div>

                                                    <div class="col-11 mx-auto">
                                                        <hr />
                                                    </div>


                                                    <div class="col-8">
                                                        <span class="fs-6 fw-bold"><img src="resources/credit-cards-payment.png" style="height: 20px;" />&nbsp;&nbsp;Shipping Cost &nbsp;&rarr;</span>
                                                    </div>

                                                    <div class="col-4 text-end">
                                                        <span class="fs-5 fw-bold text-danger my-auto">$<?php echo $product_data["shipping_cost"]; ?></span>
                                                    </div>

                                                    <div class="col-11 mx-auto">
                                                        <hr />
                                                    </div>

                                                    <div class="col-6">
                                                        <span class="fs-6 fw-bold"><img src="resources/shipped.png" style="height: 23px;" />&nbsp;&nbsp;Delivery &nbsp;&rarr;</span>
                                                    </div>

                                                    <div class="col-6 text-end">
                                                        <span class="fs-6">Within 7 Days</span>
                                                    </div>

                                                    <div class="col-11 mx-auto">
                                                        <hr />
                                                    </div>

                                                    <div class="col-6">
                                                        <span class="fs-6 fw-bold"><img src="resources/return.png" style="height: 20px;" />&nbsp;&nbsp;Returns &nbsp;&rarr;</span>
                                                    </div>

                                                    <div class="col-6 text-end">
                                                        <span class="fs-6">Accepted within 30 Days</span>
                                                    </div>

                                                    <div class="col-11 mx-auto">
                                                        <hr />
                                                    </div>

                                                    <div class="col-7 mb-3">
                                                        <span class="fs-6 fw-bold">Return Shipping &nbsp;&rarr;</span>
                                                    </div>

                                                    <div class="col-5 text-end mb-3">
                                                        <span class="fs-6">Buyer Pays for shipping</span>
                                                    </div>

                                                </div>
                                            </div>

                                            <hr />

                                            <div class="col-12 border shadow rounded">
                                                <div class="row">
                                                    <?php

                                                    $seller_rs = Shopply::search("SELECT * FROM `user`
                                                INNER JOIN `country_code` ON country_code.cc_id=user.country_code_cc_id 
                                                INNER JOIN `country` ON country.country_id=user.country_country_id 
                                                WHERE `email`='" . $product_data["user_email"] . "'");

                                                    $seller_data = $seller_rs->fetch_assoc();
                                                    $seller = $seller_data["fname"] . " " . $seller_data["lname"];

                                                    ?>
                                                    <div class="col-12 mb-2">
                                                        <p class="form-label text-center fw-bold fs-5">Seller Information</p>
                                                    </div>

                                                    <div class="col-4 mb-3">
                                                        <span class="fs-6 fw-bold">Seller &nbsp;&rarr;</span>
                                                    </div>

                                                    <div class="col-8 text-end mb-3">
                                                        <span class="fs-5"><?php echo $seller; ?></span>
                                                    </div>

                                                    <div class="col-6 mb-3">
                                                        <span class="fs-6 fw-bold">Seller From &nbsp;&rarr;</span>
                                                    </div>

                                                    <div class="col-6 text-end mb-3">
                                                        <span class="fs-6 "><?php echo $seller_data["country_name"] ?></span>
                                                    </div>

                                                    <div class="col-6 mb-3">
                                                        <span class="fs-6 fw-bold">Sold &nbsp;&rarr;</span>
                                                    </div>

                                                    <div class="col-6 text-end mb-3">
                                                        <span class="fs-6 ">100 Items</span>
                                                    </div>

                                                    <div class="col-12 mb-3">
                                                        <a href="#"><span class="fs-6">Save Seller</span></a>
                                                    </div>

                                                    <div class="col-12 mb-3">
                                                        <a href="#"><span class="fs-6">Visit Store</span></a>
                                                    </div>

                                                    <div class="col-12 mb-3">
                                                        <a href="#"><span class="fs-6">Contact Seller</span></a>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <hr />

                                    <div class="col-12 mb-2 d-flex justify-content-center">
                                        <div class="row align-itmes-center">

                                            <div class="col-6">
                                                <div class="row">
                                                    <a class="fs-5 text-decoration-none text-end fw-bold-50 boxes" onclick="changeView();">Description</a>&nbsp;&nbsp;&nbsp;

                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="row">
                                                    <a class="fs-5 text-decoration-none fw-bold-50 boxes" onclick="changeView();" style="color: black;">Reviews</a>

                                                </div>
                                            </div>

                                            <hr />

                                            <!--description-->

                                            <?php

                                            $desc_rs = Shopply::search("SELECT * FROM `product` 
                                        INNER JOIN `selling_type` ON selling_type.selltype_id=product.selling_type_selltype_id 
                                        INNER JOIN `condition` ON condition.condition_id=product.condition_condition_id 
                                        WHERE `product_id`='" . $pid . "';");

                                            $desc_data = $desc_rs->fetch_assoc();

                                            ?>

                                            <div class="col-12" id="descriptionbox">

                                                <center>
                                                    <p><?php echo $product_data["description"]; ?></p>
                                                    <div class="row">

                                                        <div class="col-5">
                                                            <span class="fs-4 fw-bold text-black-75">DIMENSIONS</span>
                                                            <p class="fs-6"><?php echo $product_data["product_dimension"]; ?></p>
                                                        </div>
                                                        <div class="col-5">
                                                            <span class="fs-4 fw-bold text-black-75">DETAILS</span>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <p class="fs-6 fw-bold">Colours</p>
                                                                        </div>

                                                                        <div class="col-6 ">
                                                                            <p class="fs-6"><?php echo $product_data["color_name"]; ?></p>
                                                                        </div>

                                                                        <div class="col-6">
                                                                            <p class="fs-6 fw-bold">Condition</p>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <p class="fs-6"><?php echo $desc_data["condition_name"]; ?></p>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <p class="fs-6 fw-bold">Buying Format</p>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <p class="fs-6"><?php echo $desc_data["sell_type"]; ?></p>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <p class="fs-6 fw-bold">Weight</p>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <p class="fs-6">234g</p>
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>
                                                </center>
                                            </div>

                                            <!--description-->

                                            <!--reviews-->

                                            <?php

                                            $feed_rs = Shopply::search("SELECT * FROM `feedback` WHERE `product_product_id` ='" . $product_data["product_id"] . "'");
                                            $feed_num = $feed_rs->num_rows;
                                            $feed_data = $feed_rs->fetch_assoc();


                                            ?>

                                            <?php

                                            if ($feed_num > 0) {


                                                for ($i = 0; $i < $feed_data["id"]; $i++) {


                                                    $review_rs = Shopply::search("SELECT * FROM `user` WHERE `email`='" . $feed_data["user_email"] . "'");
                                                    $review_data = $review_rs->fetch_assoc();

                                                    $img_rs = Shopply::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $review_data["email"] . "'");
                                                    $img_data = $img_rs->fetch_assoc();


                                            ?>

                                                    <div class="col-12 mt-2 mb-2 mx-auto d-none" id="reviewbox">
                                                        <div class="row">
                                                            <div class="col-2">
                                                                <img src="<?php echo $img_data["path"] ?>" height="70px" class="mt-3 ms-4 mx-auto" />
                                                            </div>
                                                            <div class="col-8">
                                                                <div class="row">
                                                                    <div class="col-5 fw-bold text-primary-emphasis fs-4 align-self-start">
                                                                        <p><?php echo $review_data["fname"] . " " . $review_data["lname"] ?></p>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <p>Overall Rating</p>
                                                                    </div>
                                                                    <div class="col-3 text-black-50">
                                                                        <p><?php echo $feed_data["date"] ?></p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-8 align-self-start">
                                                                        <p><?php echo $feed_data["feedback"] ?></p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-6 align-self-start">
                                                                        <p class="col-2 text-black-50" style="display: inline;">Like</p>
                                                                        <p class="col-2 ms-2 text-black-50" style="display: inline;">Dislike</p>
                                                                        <p class="col-2 ms-2 text-black-50" style="display: inline;">Reply</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                <?php

                                                }
                                            } else {

                                                ?>

                                                <div class="col-12 mt-2 d-none" id="reviewbox">
                                                    <div class="row">
                                                        <center>
                                                            <div class="col-11 "><img src="resources/customer-review.png" style="height: 250px;" /></div>
                                                        </center>
                                                        <div class="col-12 text-center mb-2 mt-2">
                                                            <span class="form-label fs-3  fw-bold">
                                                                No Reviews Yet !!
                                                            </span>
                                                            <p class="form-label mt-1">
                                                                Looks like there is no reviews yet !!
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php

                                            }

                                            ?>





                                            <hr />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-10 mx-auto">
                                        <span class="fs-3 fw-bold" style="font-family: Vanilla;">RELATED PRODUCTS</span>
                                        <hr />
                                    </div>
                                </div>
                            </div>

                            <div class="row d-flex  flex-wrap justify-content-center">

                                <?php

                                $related_rs = Shopply::search("SELECT * FROM `product` WHERE `category_id`='" . $product_data["category_id"] . "' LIMIT 3 ");
                                $related_num = $related_rs->num_rows;

                                for ($x = 0; $x < $related_num; $x++) {
                                    $related_data = $related_rs->fetch_assoc();
                                ?>

                                    <div class="card col-12 mx-auto ms-3 col-lg-2 mt-2 mb-2" data-aos="fade-up" style="width: 18rem;">
                                        <?php
                                        $img_rs = Shopply::search("SELECT * FROM product_img WHERE product_product_id='" . $related_data["product_id"] . "'");
                                        $img_data = $img_rs->fetch_assoc();
                                        ?>
                                        <img src="<?php echo $img_data["img_path"]; ?>" class="card-img-top  mt-2" style="height: 180px;" />
                                        <div class="card-body ms-0 m-0 ">
                                            <h5 class="card-title fw-bold fs-6"><?php echo $related_data["title"]; ?></h5>

                                            <span class="card-text text-primary fw-bold">$ <?php echo $related_data["price"]; ?></span><br />
                                            <span class="card-text text-warning fw-bold">In Stock</span><br />
                                            <span class="card-text text-success fw-bold"><?php echo $related_data["qty"]; ?> Items Available</span><br />

                                            <div class="row mt-2">
                                                <div class="col-12">
                                                    <a href="<?php echo "singleProductView.php?id=" . ($related_data["product_id"]); ?>" class="btn btn-primary">Buy Now</a>
                                                    <a href="#" onclick="addToCart(<?php echo $related_data['product_id']; ?>);" class="text-black"><img src="resources/otherimgs/cart (1).png" class="otherimgs ms-2" /></a>
                                                    <a href="#" onclick="addToWatchlist(<?php echo $related_data['product_id'] ?>);"><img src="resources/otherimgs/wishlist.png" style="height: 30px;" class="ms-2" /></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                <?php
                                }

                                ?>
                            </div>

                        </div>

                    </div>

                    <?php include "footer.php" ?>
                </div>

            </div>


            <script src="bootstrap.bundle.js"></script>
            <script src="script.js"></script>
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


            <script>
                var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
                var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                    return new bootstrap.Popover(popoverTriggerEl)
                })
            </script>
        </body>

        </html>

    <?php

    }

    ?>

<?php
}

?>