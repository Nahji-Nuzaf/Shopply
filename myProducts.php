<?php

session_start();

require "connectionshop.php";

if(isset($_SESSION["shopply"])){

    $email = $_SESSION["shopply"]["email"];

    $pageno;

?>

    <!DOCTYPE html>

    <html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shopply | My Products</title>
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

                                                    <hr class="col-10 offset-1 mt-2"/>

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

                                                    <hr class="col-10 offset-1 mt-2"/>

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

                                                    <hr class="col-10 offset-1 mt-2"/>

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

                                                    <hr class="col-10 offset-1 mt-2"/>

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

                                                    <hr class="col-10 offset-1 mt-2"/>

                                                    <div class="col-12">
                                                        <li class="fw-bold">Pricing</li>
                                                        
                                                        <div class="mx-auto mt-1">
                                                            <div class=" input-group mb-2 mt-2">
                                                                <span class="input-group-text">$</span>
                                                                <input type="text" placeholder="Min" class="form-control" id="mincost"/>
                                                            </div>
                                                        
                                                            <p class="text-center">To</p>

                                                            <div class="input-group mb-2 mt-2">
                                                                <span class="input-group-text">$</span>
                                                                <input type="text" placeholder="Max" class="form-control" id="maxcost"/>
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

                        <!--body-->

                        <div class="col-12 col-lg-8 mx-auto mt-3 mb-3">
                            <div class="row" id="sort">

                                <div class="col-12 col-lg-12 mb-3 rounded border border-primary" style="background-color: #FFFFE5;">
                                    <div class="row">
                                        <div class="col-lg-4 text-center mt-3 mb-1">
                                            <span class="fw-bold fs-6">Search product Using Keywords</span>
                                            <p><a href="#">Terms & Conditions</a></p>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group mt-3 mb-1">
                                                <input type="text" class="form-control" placeholder="Search" aria-label="Username">
                                                <span class="input-group-text"><i class="bi bi-search"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 d-grid">
                                            <div class="mt-3 mb-1 mx-auto">
                                                <button class="btn btn-primary fw-bold" style="border-radius: 7px;">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php

                                $product_rs1 = Shopply::search("SELECT * FROM `product` WHERE `user_email`='".$email."'");
                                $product_num1 = $product_rs1->num_rows;
                                
                                if($product_num1 == 0){
                                    ?>
                                    
                                    <!--empty view-->
                                        <div class="col-12">
                                            <div class="row mt-5">
                                                <center><div class="col-12"><img src="resources/shopping-cart.png" style="height: 250px;"/></div></center>
                                                <div class="col-12 text-center mb-2 mt-2">
                                                    <span class="form-label fs-3 fw-bold" >
                                                        My Product is Empty
                                                    </span>
                                                    <p class="form-label mt-1" >
                                                        Looks like you haven't added any Products To sell.
                                                    </p>
                                                </div>
                                                <div class="offset-lg-4 col-12 col-lg-4 mb-4 d-grid ">
                                                    <a href="addProduct.php" class="text-decoration-none text-center">
                                                        <img src="resources/shopping-cart.png" style="height: 30px;"/>
                                                        Add Products.
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <!--empty view-->

                                    <?php
                                }else{
                                    ?>
                                    
                                    <!--product view-->

                                        <div class="col-12 col-lg-12 mb-3 rounded border border-primary" style="background-color: #FFFFE5;">
                                            <div class="row">

                                                <?php

                                                if (isset($_GET["page"])) {
                                                    $pageno = $_GET["page"];
                                                } else {
                                                    $pageno = 1;
                                                }
                                                
                                                $product_rs = Shopply::search("SELECT * FROM `product` WHERE `user_email`='".$email."'");
                                                $product_num = $product_rs->num_rows;

                                                $results_per_page = 6;
                                                $number_of_pages = ceil($product_num / $results_per_page);

                                                $page_results = ($pageno - 1) * $results_per_page;
                                                $selected_rs = Shopply::search("SELECT * FROM `product` WHERE `user_email`='".$email."'
                                                LIMIT ".$results_per_page." OFFSET ".$page_results."");

                                                $selected_num = $selected_rs->num_rows;

                                                ?>
                                                
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

                                                    <!--card-->

                                                    <?php

                                                    for ($x = 0; $x < $selected_num; $x++) {
                                                        $selected_data = $selected_rs->fetch_assoc();
                                                    ?>
                                                        <tbody>
                                                            <tr>
                                                                <?php

                                                                $product_img_rs = Shopply::search("SELECT * FROM `product_img` WHERE 
                                                                                    `product_product_id`='" . $selected_data["product_id"] . "'");
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
                                                                        <button class="btn btn-primary btn3" onclick="sendId(<?php echo $selected_data['product_id']; ?>);">Update</button>
                                                                        
                                                                        <button class="btn btn-warning mt-2" style="color: white;">Delete</button>
                                                                    </div>
                                                                    
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                        <!--card-->

                                                    

                                                    <?php
                                                    }

                                                    ?>
                                                </table>

                                            </div>
                                        </div>
                                    <!--product view-->
                                    
                                    <?php
                                }
                                ?>

                                
                                

                            </div>
                        </div>

                        

                        

                    </div>
                </div>
                <?php include "footer.php"?>
            </div>
            
        </div>


        <script src="bootstrap.js"></script>
        <script src="script.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </body>

    </html>

<?php

}else{
    header("location:signin.php");
}
?>