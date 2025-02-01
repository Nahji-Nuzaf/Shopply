<?php

require "connectionshop.php";

$search_txt = $_POST["t"];
$category = $_POST["cat"];
$brand = $_POST["b"];
$model = $_POST["mo"];
$condition = $_POST["con"];
$from = $_POST["pf"];
$to = $_POST["pt"];
$sort = $_POST["s"];

$query = "SELECT * FROM `product`";
$status = 0;

if ($sort == 0) {

    if (!empty($search_txt)) {
        $query .= " WHERE `title` LIKE '%" . $search_txt . "%'";
        $status = 1;
    }

    if ($category != 0 && $status == 0) {
        $query .= " WHERE `category_id`='" . $category . "'";
        $status = 1;
    } else if ($category != 0 && $status != 0) {
        $query .= " AND `category_id`='" . $category . "'";
    }

    $pid = 0;
    if ($brand != 0 && $model == 0) {
        $modelHasBrand_rs = Shopply::search("SELECT * FROM `model_has_brand` WHERE `brand_brand_id`='" . $brand . "'");
        $modelHasBrand_num = $modelHasBrand_rs->num_rows;

        for ($x = 0; $x < $modelHasBrand_num; $x++) {
            $modelHasBrand_data = $modelHasBrand_rs->fetch_assoc();
            $pid = $modelHasBrand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`='" . $pid . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `model_has_brand_id`='" . $pid . "'";
        }
    }

    if ($brand == 0 && $model != 0) {

        $modelHasBrand_rs = Shopply::search("SELECT * FROM `model_has_brand` WHERE `model_model_id`='" . $model . "'");
        $modelHasBrand_num = $modelHasBrand_rs->num_rows;

        for ($x = 0; $x < $modelHasBrand_num; $x++) {
            $modelHasBrand_data = $modelHasBrand_rs->fetch_assoc();
            $pid = $modelHasBrand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`='" . $pid . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `model_has_brand_id`='" . $pid . "'";
        }
    }

    if ($brand != 0 && $model != 0) {

        $modelHasBrand_rs = Shopply::search("SELECT * FROM `model_has_brand` WHERE `model_model_id`='" . $model . "' AND `brand_brand_id`='" . $brand . "'");
        $modelHasBrand_num = $modelHasBrand_rs->num_rows;

        for ($x = 0; $x < $modelHasBrand_num; $x++) {
            $modelHasBrand_data = $modelHasBrand_rs->fetch_assoc();
            $pid = $modelHasBrand_data["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`='" . $pid . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `model_has_brand_id`='" . $pid . "'";
        }
    }

    if ($condition != 0 && $status == 0) {
        $query .= " WHERE `condition_condition_id`='" . $condition . "'";
        $status = 1;
    } else if ($condition != 0 && $status != 0) {
        $query .= " AND `condition_condition_id`='" . $condition . "'";
    }

    if (!empty($from) && empty($to)) {
        if ($status == 0) {
            $query .= " WHERE `price` >= '" . $from . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` >= '" . $from . "'";
        }
    } else if (empty($from) && !empty($to)) {
        if ($status == 0) {
            $query .= " WHERE `price` <= '" . $to . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` <= '" . $to . "'";
        }
    } else if (!empty($from) && !empty($to)) {
        if ($status == 0) {
            $query .= " WHERE `price` BETWEEN '" . $from . "' AND '" . $to . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` BETWEEN '" . $from . "' AND '" . $to . "'";
        }
    }
} else if ($sort == 1) {

    if (!empty($search_txt)) {
        $query .= " WHERE `title` LIKE '%" . $search_txt . "%' ORDER BY `price` ASC";
        $status = 1;
    }
} else if ($sort == 2) {

    if (!empty($search_txt)) {
        $query .= " WHERE `title` LIKE '%" . $search_txt . "%' ORDER BY `price` DESC";
        $status = 1;
    }
} else if ($sort == 3) {

    if (!empty($search_txt)) {
        $query .= " WHERE `title` LIKE '%" . $search_txt . "%' ORDER BY `qty` ASC";
        $status = 1;
    }
} else if ($sort == 4) {

    if (!empty($search_txt)) {
        $query .= " WHERE `title` LIKE '%" . $search_txt . "%' ORDER BY `qty` DESC";
        $status = 1;
    }
}

?>

<!-- <div class="row"> -->
    <!-- <div class="offset-lg-1 col-12 col-lg-10 text-center">
        <div class="row justify-content-center"> -->

        <div class="row d-flex  flex-wrap justify-content-center">


            <?php

            if ("0" != $_POST["page"]) {
                $pageno = $_POST["page"];
            } else {
                $pageno = 1;
            }

            $product_rs = Shopply::search($query);
            $product_num = $product_rs->num_rows;

            $results_per_page = 5;
            $number_of_pages = ceil($product_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;
            $selected_rs = Shopply::search($query . " LIMIT " . $results_per_page . " 
                                            OFFSET " . $page_results . " ");

            $selected_num = $selected_rs->num_rows;

            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();

                $product_img_rs = Shopply::search("SELECT * FROM `product_img` WHERE `product_product_id`='" . $selected_data["product_id"] . "'");
                $product_img_data = $product_img_rs->fetch_assoc();

            ?>

                <!--product names-->


                    <!-- <div class="col-12 mx-auto">
                        <div class="card col-12 col-lg-12 mt-2 mb-2" style="width: 18rem;">
                            <div class="product-box mb-3">
                                <div class="product-inner-box position-relative">
                                    <div class="icons position-absolute">
                                        <a href="#" onclick="addToWatchlist(<?php echo $product_data['product_id'] ?>);" class="text-decoration-none text-dark"><i class="bi bi-heart-fill"></i></a>
                                        <a href="<?php echo "singleProductView.php?id=" . ($product_data["product_id"]); ?>" class="text-decoration-none text-dark"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="onsale position-absolute top-0 start-0">
                                        <span class="badge rounded-0">-29%</span>
                                    </div>
                                    <img src="<?php echo $product_img_data["img_path"]; ?>" alt="product" class="img-fluid" />
                                    <div class="cart-btn">
                                        <button class="btn btn-dark btn1" onclick="addToCart(<?php echo $product_data['product_id']; ?>);">Add to Cart <i class="bi bi-cart"></i></button>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-name">
                                        <h5 class="card-title fw-bold fs-3"><?php echo $selected_data["title"]; ?></h5>
                                        <span class="card-text text-primary fw-bold fs-4">$<?php echo $selected_data["price"]; ?></span><br />
                                        <span class="card-text text-warning fw-bold">In Stock</span><br />
                                        <span class="card-text text-success fw-bold"><?php echo $selected_data["qty"]; ?> Items Available</span><br />
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
                    </div> -->

                    <div class="card col-12 mx-auto ms-3 col-lg-5 mt-2 mb-2" data-aos="fade-up" style="width: 18rem;">
                        <?php
          //              $img_rs = Shopply::search("SELECT * FROM product_img WHERE product_product_id='" . $searchdata["product_id"] . "'");
                        //$img_data = $img_rs->fetch_assoc();
                        ?>
                        <img src="<?php echo $product_img_data["img_path"]; ?>" class="card-img-top  mt-2" style="height: 180px;" />
                        <div class="card-body ms-0 m-0 ">
                            <h5 class="card-title fw-bold fs-6"><?php echo $selected_data["title"]; ?></h5>

                            <span class="card-text text-primary fw-bold">$ <?php echo $selected_data["price"]; ?> .00</span><br />
                            <span class="card-text text-warning fw-bold">In Stock</span><br />
                            <span class="card-text text-success fw-bold"><?php echo $selected_data["qty"]; ?> Items Available</span><br />

                            <div class="row mt-2">
                                <div class="col-12">
                                    <a href="<?php echo "singleProductView.php?id=" . ($product_data["product_id"]); ?>" class="btn btn-primary">Buy Now</a>
                                    <a href="#" onclick="addToCart(<?php echo $product_data['product_id']; ?>);" class="text-black"><img src="resources/otherimgs/cart (1).png" class="otherimgs ms-2" /></a>
                                    <a href="#" onclick="addToWatchlist(<?php echo $product_data['product_id'] ?>);"><img src="resources/otherimgs/wishlist.png" style="height: 30px;" class="ms-2" /></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!--product names-->

            <?php
            }

            ?>

        </div>
    </div>

    <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if ($pageno <= 1) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="advancedSearch(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                    } ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php

                for ($y = 1; $y <= $number_of_pages; $y++) {
                    if ($y == $pageno) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="advancedSearch(<?php echo ($y); ?>);"><?php echo $y; ?></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" onclick="advancedSearch(<?php echo ($y); ?>);"><?php echo $y; ?></a>
                        </li>
                <?php
                    }
                }

                ?>

                <li class="page-item">
                    <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="advancedSearch(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                    } ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

</div>