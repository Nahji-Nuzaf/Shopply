<?php

session_start();
require "connectionshop.php";

$email = $_SESSION["shopply"]["email"];

$search = $_POST["s"];
$time = $_POST["t"];
$qty = $_POST["q"];
$condition = $_POST["c"];

$query = "SELECT * FROM `product` WHERE `user_email`='" . $email ."'";

if (!empty($search)) {
    $query .= " AND `title` LIKE '%" . $search . "%'";
}

if ($condition != "0") {
    $query .= " AND `condition_condition_id`='" . $condition . "'";
}

if ($time != "0") {
    if ($time == "1") {
        $query .= " ORDER BY `datetime_added` DESC";
    } else if ($time == "2") {
        $query .= " ORDER BY `datetime_added` ASC";
    }
}

if ($qty != "0") {
    if ($qty == "1") {
        $query .= " ORDER BY `qty` DESC";
    } else if ($qty == "2") {
        $query .= " ORDER BY `qty` ASC";
    }
}

if ($time != "0" && $qty != "0") {
    if ($qty == "1") {
        $query .= " , `qty` DESC";
    } else if ($qty == "2") {
        $query .= " , `qty` ASC";
    }
}

?>

<div class="offset-1 col-10 text-center">
    <div class="row justify-content-center">

        <?php

        if ("0" != $_POST["page"]) {
            $pageno = $_POST["page"];
        } else {
            $pageno = 1;
        }

        $product_rs = Shopply::search($query);
        $product_num = $product_rs->num_rows;

        $results_per_page = 2;
        $number_of_pages = ceil($product_num / $results_per_page);

        $page_results = ($pageno - 1) * $results_per_page;
        $selected_rs = Shopply::search($query . " LIMIT " . $results_per_page . " 
                                            OFFSET " . $page_results . " ");

        $selected_num = $selected_rs->num_rows;

        ?>
        <div class="col-12 col-lg-12 mb-3 rounded border border-primary" style="background-color: #FFFFE5;">
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <?php

                for ($x = 0; $x < $selected_num; $x++) {
                    $selected_data = $selected_rs->fetch_assoc();

                ?>
                    <!--card-->
                    <tbody>
                        <tr>
                            <?php

                            $product_img_rs = Shopply::search("SELECT * FROM `product_img` WHERE `product_product_id`='" . $selected_data["product_id"] . "'");
                            $product_img_data = $product_img_rs->fetch_assoc();

                            ?>
                            <th scope="row"><?php echo $selected_data["product_id"]; ?></th>
                            <td><img src="<?php echo $product_img_data["img_path"]; ?>" class="img-fluid rounded-start" style="height: 75px;"/></td>
                            <td><?php echo $selected_data["title"]; ?></td>
                            <td>$ <?php echo $selected_data["price"]; ?></td>
                            <td><?php echo $selected_data["qty"]; ?></td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="<?php echo $selected_data["product_id"]; ?>" onchange="changeStatus(<?php echo $selected_data['product_id']; ?>);" <?php if ($selected_data["status_status_id"] == 2) { ?> checked <?php } ?> />
                                    <label class="form-check-label fw-bold text-info" for="<?php echo $selected_data["product_id"]; ?>">
                                    <?php if ($selected_data["status_status_id"] == 2) { ?>
                                            Activate Product
                                    <?php } else {
                                    ?>
                                            Deactivate Product
                                    <?php
                                    } ?>
                                    </label>
                                </div>
                            </td>
                            
                            <td>
                                <div class="col-12 col-lg-12 d-grid">
                                    <button class="btn btn-primary" onclick="sendId(<?php echo $selected_data['product_id']; ?>);">Update</button>
                                    <button class="btn btn-warning mt-2">Delete</button>
                                </div>
                            </td>                                        
                            
                        </tr>

                    </tbody>
            </table>
        <!--card-->

        <?php
        }

        ?>

            </div>
        </div>


    </div>
</div>

<div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-lg justify-content-center">
            <li class="page-item">
                <a class="page-link" <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    ?>
                                                    onclick="sort(<?php echo ($pageno - 1) ?>);"
                                                    <?php
                                                } ?>
                                                aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <?php

            for ($y = 1; $y <= $number_of_pages; $y++) {
                if ($y == $pageno) {
            ?>
                    <li class="page-item active">
                        <a class="page-link" onclick="sort(<?php echo ($y); ?>);"><?php echo $y; ?></a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="page-item">
                        <a class="page-link" onclick="sort(<?php echo ($y); ?>);"><?php echo $y; ?></a>
                    </li>
            <?php
                }
            }

            ?>

            <li class="page-item">
                <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                    ?>
                                                    onclick="sort(<?php echo ($pageno + 1) ?>);"
                                                    <?php
                                                } ?>
                                                aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>