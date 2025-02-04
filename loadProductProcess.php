<?php

include "connection.php";

$pageno = 0;
$page = $_POST["p"];
// echo($page);

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM product WHERE title LIKE '%$search%'";
$rs = Shopply::search($q);
$num = $rs->num_rows;
// echo($num);

$results_per_page = 8;
$num_of_pages = ceil($num / $results_per_page);
// echo($num_of_pages);

$page_results = ($pageno - 1) * $results_per_page;
// echo($page_results);

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Shopply::search($q2);
$num2 = $rs2->num_rows;
// echo($num2);

if ($num2 == 0) {
    echo ("No Product Here....");
} else {
?>

    <div class="row d-flex  flex-wrap justify-content-center">

        <?php

        for ($x = 0; $x < $num2; $x++) {
            $searchdata = $rs2->fetch_assoc();

        ?>

            <div class="card col-12 mx-auto ms-3 col-lg-2 mt-2 mb-2" data-aos="fade-up" style="width: 18rem;">
                <?php
                $img_rs = Shopply::search("SELECT * FROM product_img WHERE product_product_id='" . $searchdata["product_id"] . "'");
                $img_data = $img_rs->fetch_assoc();
                ?>
                <img src="<?php echo $img_data["img_path"]; ?>" class="card-img-top  mt-2" style="height: 180px;" />
                <div class="card-body ms-0 m-0 ">
                    <h5 class="card-title fw-bold fs-6"><?php echo $searchdata["title"]; ?></h5>

                    <span class="card-text text-primary fw-bold">$ <?php echo $searchdata["price"]; ?> .00</span><br />
                    <span class="card-text text-warning fw-bold">In Stock</span><br />
                    <span class="card-text text-success fw-bold"><?php echo $searchdata["qty"]; ?> Items Available</span><br />

                    <div class="row mt-2">
                        <div class="col-12">
                            <a href="<?php echo "singleProductView.php?id=" . ($searchdata["product_id"]); ?>" class="btn btn-primary">Buy Now</a>
                            <a href="#" onclick="addToCart(<?php echo $searchdata['product_id']; ?>);" class="text-black"><img src="resources/otherimgs/cart (1).png" class="otherimgs ms-2" /></a>
                            <a href="#" onclick="addToWatchlist(<?php echo $searchdata['product_id'] ?>);"><img src="resources/otherimgs/wishlist.png" style="height: 30px;" class="ms-2" /></a>
                        </div>
                    </div>
                </div>
            </div>

        <?php


        }

        ?>

        <!-- card -->

        <!-- pagination -->
        <div class="d-flex justify-content-center mt-5">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" <?php


                                                                if ($pageno <= 1) {
                                                                    echo ("#");
                                                                } else {
                                                                ?> onclick="loadProduct(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                                }


                                                                                                                    ?>>Previous</a></li>




                    <?php
                    for ($y = 1; $y <= $num_of_pages; $y++) {
                        if ($y == $pageno) {
                    ?>
                            <li class="page-item active"><a class="page-link" onclick="loadProduct(<?php echo $y ?>);"><?php echo $y ?></a></li>

                        <?php
                        } else {
                        ?>
                            <li class="page-item"><a class="page-link" onclick="loadProduct(<?php echo $y ?>);"><?php echo $y ?></a></li>

                    <?php
                        }
                    }
                    ?>



                    <li class="page-item"><a class="page-link" <?php


                                                                if ($pageno >= $num_of_pages) {
                                                                    echo ("#");
                                                                } else {
                                                                ?> onclick="loadProduct(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                                }


                                                                                                                    ?>>Next</a></li>
                </ul>
            </nav>
        </div>

        <!-- pagination -->

    </div>
    <?php

}

?>