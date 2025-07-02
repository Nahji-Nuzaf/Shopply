<?php

session_start();

require "connectionshop.php";

if(isset($_SESSION["shopply"])){
    if(isset($_SESSION["product"])){

        ?>
                
            <!DOCTYPE html>

            <html>

                <head>

                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Shopply | Addproduct</title>
                    <link rel="icon" href="resources/Shopply Logo.png" />

                    <link rel="stylesheet" href="bootstrap.css" />
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
                    <link rel="stylesheet" href="style.css"/>

                </head>

                <body>

                    <div class="container-fluid">
                        <div class="row">

                            <?php
                            
                            $product = $_SESSION["product"];
                            ?>


                            <div class="col-12 mt-5">
                                <div class="row ">

                                    <div class="col-12 col-lg-10  border-start mx-auto">
                                        <div class="row">

                                            <div class="col-12 ms-4">
                                                <p class="fw-bold mb-0" style="font-size: 30px;">Update Product.</p>
                                                <p style="font-size: 13px;">Update Your Product Details Below</p>
                                                <hr class="col-12"/>
                                            </div>

                                            <div class="col-12 col-lg-6">
                                                <div class="row ms-4">

                                                    <div class="col-12">
                                                        <p class="fw-bold mb-0" style="font-size: 20px;">Description.</p>
                                                    </div>

                                                    <div class="col-12 mb-1">
                                                        <label class="form-label">Product Name</label>
                                                        <input type="text" class="form-control" id="proname" value="<?php echo $product["title"];?>"/>
                                                    </div>

                                                    <div class="col-12 mb-2">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
                                                        <textarea class="form-control" rows="2" id="prodesc" ><?php echo $product["description"];?></textarea>
                                                    </div>

                                                    <div class="col-12 mb-2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label class="form-label">Product Condition</label>
                                                            </div>

                                                            <?php
                                                            
                                                            if($product["condition_condition_id"] == 1 ){
                                                                ?>

                                                                    <div class="col-12">
                                                                        <div class="form-check form-check-inline mx-5">
                                                                            <input class="form-check-input" type="radio" id="b" name="c" checked disabled/>
                                                                            <label class="form-check-label" for="b">Brandnew</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio" id="u" name="c" disabled/>
                                                                            <label class="form-check-label" for="u">Used</label>
                                                                        </div>
                                                                    </div>

                                                                <?php

                                                            }else if($product["condition_condition_id"] == 2){
                                                                ?>
                                                                    <div class="col-12">
                                                                        <div class="form-check form-check-inline mx-5">
                                                                            <input class="form-check-input" type="radio" id="b" name="c" checked disabled/>
                                                                            <label class="form-check-label" for="b">Brandnew</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio" id="u" name="c" disabled/>
                                                                            <label class="form-check-label" for="u">Used</label>
                                                                        </div>
                                                                    </div>
                                                                
                                                                <?php
                                                            }

                                                            ?>

                                                        </div>
                                                    </div>

                                                    <div class="col-12 mb-2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label class="form-label">Product Colour</label>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="input-group mt-2 mb-2">
                                                                    <input type="text" class="form-control" placeholder="Add new Colour" value="<?php echo $product["color_name"];?>" id="clr" disabled/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr/>


                                                    <div class="col-12">
                                                        <p class="fw-bold mb-0" style="font-size: 20px;">Category.</p>
                                                    </div>

                                                    <div class="col-6 mb-2">
                                                        <label class="form-label">Product Category</label>
                                                        <select class="form-select text-center" disabled>

                                                            <?php

                                                                $categories = Shopply::search("SELECT * FROM `category` WHERE `id`='".$product["category_id"]."'");
                                                                $cat_data = $categories->fetch_assoc();
                                                                ?>
                                                                    <option><?php echo $cat_data["category_name"]?></option>
                                                                        
                                                                <?php

                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-6 mb-2">
                                                        <label class="form-label">Product Brand</label>
                                                        <select class="form-select text-center" disabled>
                                                            
                                                            <?php

                                                                $brands = Shopply::search("SELECT * FROM `brand` WHERE `brand_id` IN (SELECT `brand_brand_id` FROM `model_has_brand` WHERE `id` = '".$product["model_has_brand_id"]."')");
                                                                $brand_data = $brands->fetch_assoc();

                                                                ?>
                                                                    <option><?php echo $brand_data["brand_name"]?></option>
                                                                        
                                                                <?php
                                                                
                                                                
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-12 mb-2">
                                                        <label class="form-label">Product Model</label>
                                                        <select class="form-select text-center" disabled>
                                                            
                                                            <?php

                                                                $models = Shopply::search("SELECT * FROM `model` WHERE `model_id` IN (SELECT `brand_brand_id` FROM `model_has_brand` WHERE `id` = '".$product["model_has_brand_id"]."')");
                                                                $model_data = $models->fetch_assoc();

                                                                ?>
                                                                    <option><?php echo $model_data["model_name"]?></option>
                                                                        
                                                                <?php

                                                            ?>
                                                        </select>
                                                    </div>

                                                    <hr/>

                                                    <div class="col-12">
                                                        <p class="fw-bold mb-0" style="font-size: 20px;">Inventory.</p>
                                                    </div>

                                                    <div class="col-6 mb-1">
                                                        <label class="form-label">Quantity</label>
                                                        <input type="number"  min="0" class="form-control" id="qty" value="<?php echo $product["qty"];?>"/>
                                                    </div>

                                                    <div class="col-6 mb-2">
                                                        <label class="form-label">Product Dimensions</label>
                                                        <input type="text" class="form-control" id="prodimension" value="<?php echo $product["product_dimension"];?>" disabled/>
                                                    </div>

                                                    <hr/>

                                                    <div class="col-12">
                                                        <p class="fw-bold mb-0" style="font-size: 20px;">Selling Type.</p>
                                                    </div>

                                                    <div class="col-12 mb-5">
                                                        <label class="form-label">Buying Format</label>
                                                        <select class="form-select text-center" disabled>
                                                            
                                                            <?php

                                                                $bform = Shopply::search("SELECT * FROM `selling_type` WHERE `selltype_id`='".$product["selling_type_selltype_id"]."'");
                                                                $bform_data = $bform->fetch_assoc();
                                                                    

                                                                ?>
                                                                    <option><?php echo $bform_data["sell_type"]?></option>
                                                                        
                                                                <?php
                                                                
                                                                
                                                            ?>
                                                        </select>
                                                    </div>


                                                </div>
                                            </div>

                                            <div class="col-12 col-lg-6">
                                                <div class="row ms-4">

                                                    <div class="col-12">
                                                        <p class="fw-bold mb-2" style="font-size: 20px;">Product Images.</p>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="row ms-2 mb-1">


                                                            <?php
                                                                $img = array();
                                                                $img [0] = "resources/box.png";
                                                                $img [1] = "resources/box.png";
                                                                $img [2] = "resources/box.png";
                                                                $img [3] = "resources/box.png";
                                                                $img_rs = Shopply::search("SELECT * FROM `product_img` WHERE `product_product_id`='" . $product["product_id"] . "'");
                                                                $img_num = $img_rs->num_rows;
                                                                for ($x = 0; $x < $img_num; $x++) {
                                                                    $img_data = $img_rs->fetch_assoc();
                                                                    $img[$x] = $img_data["img_path"];
                                                                }
                                                            ?>

                                                            <div class="col-3 mb-1 mx-auto label">
                                                                <img src="<?php echo $img[0];?>" class="img-fluid" style="width: 250px;" id="i0"/>
                                                            </div>
                                                            <div class="col-3 mb-1 label mx-auto">
                                                                <img src="<?php echo $img[1];?>" class="img-fluid" style="width: 250px;" id="i1"/>
                                                            </div>
                                                            <div class="col-3 mb-1 label mx-auto">
                                                                <img src="<?php echo $img[2];?>" class="img-fluid" style="width: 250px;" id="i2"/>
                                                            </div>
                                                            <div class="col-3 mb-1 label mx-auto">
                                                                <img src="<?php echo $img[3];?>" class="img-fluid" style="width: 250px;" id="i3"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-1">
                                                            <input type="file" class="d-none" id="imageuploader" multiple />
                                                            <label for="imageuploader" class="col-12 btn btn-primary" onclick="changeProductImage();">Upload Images</label>
                                                        </div>
                                                        
                                                    </div>

                                                    <hr/>

                                                    <div class="col-12">
                                                        <p class="fw-bold mb-2" style="font-size: 20px;">Shipping and Delivery.</p>
                                                    </div>

                                                    <div class="col-12 mb-2">
                                                        <div class="row">
                                                            
                                                            <div class="col-12 mb-2">
                                                                <label class="form-label">Shipping Methods</label>
                                                                <select class="form-select text-center" disabled>
                                                                    
                                                                    <?php

                                                                        $shipping = Shopply::search("SELECT * FROM `shipping` WHERE `shipping_id`='".$product["shipping_shipping_id"]."'");
                                                                        $shipping_data = $shipping->fetch_assoc();

                                                                        ?>
                                                                            <option value="<?php echo $shipping_data["shipping_id"]?>"><?php echo $shipping_data["method_name"]?></option>
                                                                                
                                                                        <?php

                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 mb-2">
                                                                <label class="form-label">Shipping Cost</label>
                                                                <div class="input-group mb-2">
                                                                    <span class="input-group-text">$</span>
                                                                    <input type="text" class="form-control" id="shipcost" value="<?php echo $product["shipping_cost"];?>"/>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    

                                                    <hr/>

                                                    <div class="col-12">
                                                        <p class="fw-bold mb-2" style="font-size: 20px;">Approved Payment Methods.</p>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="offset-0 offset-lg-2 col-2 mx-auto pm pm1"></div>
                                                            <div class="col-2 mx-auto pm pm2"></div>
                                                            <div class="col-2 mx-auto pm pm3"></div>
                                                            <div class="col-2 mx-auto pm pm4"></div>
                                                        </div>
                                                    </div>

                                                    <hr/>
                                                    
                                                    <div class="col-12">
                                                        <p class="fw-bold mb-2" style="font-size: 20px;">Pricing.</p>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="row">

                                                            <div class="col-12">
                                                                <label class="form-label">Cost Per Item</label>
                                                            </div>
                                                            <div class="offset-0 col-12">
                                                                <div class="input-group mb-2 mt-2">
                                                                    <span class="input-group-text">$</span>
                                                                    <input type="text" class="form-control" id="cost" value="<?php echo $product["price"];?>"/>
                                                                </div>
                                                            </div>

                                                            <?php
                                                            
                                                            if($product["payment_method_pm_id"] == 1){
                                                                ?>
                                                                    <div class="col-12">
                                                                        <div class="form-check form-check-inline mx-3">
                                                                            <input class="form-check-input" type="radio" id="ip" name="a" checked disabled/>
                                                                            <label class="form-check-label" for="ip">Immediate Payment</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio" id="cod" name="a" disabled/>
                                                                            <label class="form-check-label" for="cod">Cash On Delivery</label>
                                                                        </div>
                                                                    </div>

                                                                <?php
                                                            }else if($product["payment_method_pm_id"] == 2){
                                                                ?>
                                                                
                                                                    <div class="col-12">
                                                                        <div class="form-check form-check-inline mx-3">
                                                                            <input class="form-check-input" type="radio" id="ip" name="a" checked disabled/>
                                                                            <label class="form-check-label" for="ip">Immediate Payment</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio" id="cod" name="a" disabled/>
                                                                            <label class="form-check-label" for="cod">Cash On Delivery</label>
                                                                        </div>
                                                                    </div>
                                                                
                                                                <?php
                                                            }
                                                            ?>

                                                        </div>
                                                    </div>

                                                    <hr class="mt-3"/>

                                                    <div class="col-12">
                                                        <div class="row">

                                                            <div class="col-4 align-self-start">
                                                                <button type="button" class="btn btn-light border" style="color: white;">Discard</button>
                                                            </div>
                                                            <div class="col-3 ms-4">
                                                                <button type="button" class="btn btn-outline-primary">Schedule</button>
                                                            </div>
                                                            <div class="col-4 d-grid">
                                                                <button type="button" class="btn btn-primary border" onclick="updateProduct();">Update Product</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php include "footer.php"?>    
                        </div>
                        
                    </div>

                    
                    <script src="bootstrap.js"></script>
                    <script src="script.js"></script>
                </body>


            </html>
        
        <?php

    }else{
        ?>
            <script>
                alert("Please select a product");
                window.location = "myProducts.php";
            </script>

        <?php
    }

}else{
    echo("You have to login first");
    ?>
        <script>
            alert("You have to login first");
            window.location = "signin.php";
        </script>

    <?php
}



?>