
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
            
            include "header.php";

            ?>


            <div class="col-12">
                <div class="row">

                    <div class="col-12 col-lg-2 mt-4 offset-lg-1 text-center">
                        <h2 class="fw-bold mgpr">Manage Products</h2>
                        <hr/>
                        <div class="col-12 mt-2">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search" aria-label="Username">
                                <span class="input-group-text"><i class="bi bi-search"></i></span>
                            </div>
                        </div>
                        <hr/>
                        <div class="col-12">
                            <div>
                                <div class="col-4 mb-2 align-self-start">
                                    <a class="text-decoration-none " data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        My Shop
                                    </a>
                                </div>
                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                        <p>Personal Dashboard</p>
                                        <p>Business Analytics</p>
                                        <p>Transactions</p>
                                                
                                    </div>
                                </div>

                                <div class="col-5 ms-1 align-self-start">

                                    <p><a href="myProducts.php">My Products</a></p>
                                    <p class="me-3">My Products</p>
                                    <p class="me-3">Customers</p>
                                    <p class="me-4">Messages</p>
                                    <p class="me-5">Settings</p>

                                </div>
                            </div>
                                
                        </div>
                    </div>

                    <div class="col-12 col-lg-8 mt-4 mb-3 border-start">
                        <div class="row">

                            <div class="col-12 ms-4">
                                <p class="fw-bold mb-0" style="font-size: 30px;">Add Product.</p>
                                <p style="font-size: 13px;">Enter Product Details Below</p>
                                <hr class="col-12"/>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="row ms-4">

                                    <div class="col-12">
                                        <p class="fw-bold mb-0" style="font-size: 20px;">Description.</p>
                                    </div>

                                    <div class="col-12 mb-1">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" class="form-control" id="proname"/>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
                                        <textarea class="form-control" rows="2" id="prodesc"></textarea>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label">Product Condition</label>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check form-check-inline mx-5">
                                                    <input class="form-check-input" type="radio" id="b" name="c" checked />
                                                    <label class="form-check-label" for="b">Brandnew</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="u" name="c" />
                                                    <label class="form-check-label" for="u">Used</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label">Product Colour</label>
                                            </div>

                                            <div class="col-12">
                                                <div class="input-group mt-2 mb-2">
                                                    <input type="text" class="form-control" placeholder="Add new Colour" id="clr"/>
                                                    
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
                                        <select class="form-select text-center" id="procat" onchange="loadBrands();">
                                            <option value="0">Select Category</option>

                                            <?php

                                                $categories = Shopply::search("SELECT * FROM `category`");
                                                $cat_num = $categories->num_rows;

                                                for($x=0; $x < $cat_num; $x++){
                                                    $cat_data = $categories->fetch_assoc();

                                                    ?>
                                                        <option value="<?php echo $cat_data["id"]?>"><?php echo $cat_data["category_name"]?></option>
                                                        
                                                    <?php
                                                }
                                                
                                            ?>

                                        </select>
                                    </div>

                                    <div class="col-6 mb-2">
                                        <label class="form-label">Product Brand</label>
                                        <select class="form-select text-center" id="probrand" onchange="loadModels();">
                                            <option value="0">Select Product Brand</option>
                                            <?php

                                                $brands = Shopply::search("SELECT * FROM `brand`");
                                                $brand_num = $brands->num_rows;

                                                for($x=0; $x < $brand_num; $x++){
                                                    $brand_data = $brands->fetch_assoc();

                                                    ?>
                                                        <option value="<?php echo $brand_data["brand_id"]?>"><?php echo $brand_data["brand_name"]?></option>
                                                        
                                                    <?php
                                                }
                                                
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <label class="form-label">Product Model</label>
                                        <select class="form-select text-center" id="promodel">
                                            <option value="0">Select Product Model</option>
                                            <?php

                                                $models = Shopply::search("SELECT * FROM `model`");
                                                $model_num = $models->num_rows;

                                                for($x=0; $x < $model_num; $x++){
                                                    $model_data = $models->fetch_assoc();

                                                    ?>
                                                        <option value="<?php echo $model_data["model_id"]?>"><?php echo $model_data["model_name"]?></option>
                                                        
                                                    <?php
                                                }
                                                
                                            ?>
                                        </select>
                                    </div>

                                    <hr/>

                                    <div class="col-12">
                                        <p class="fw-bold mb-0" style="font-size: 20px;">Inventory.</p>
                                    </div>

                                    <div class="col-6 mb-1">
                                        <label class="form-label">Quantity</label>
                                        <input type="number" value="0" min="0" class="form-control" id="qty"/>
                                    </div>

                                    <div class="col-6 mb-2">
                                        <label class="form-label">Product Dimensions</label>
                                        <input type="text" class="form-control" id="prodimension"/>
                                    </div>

                                    <hr/>

                                    <div class="col-12">
                                        <p class="fw-bold mb-0" style="font-size: 20px;">Selling Type.</p>
                                    </div>

                                    <div class="col-12 mb-5">
                                        <label class="form-label">Buying Format</label>
                                        <select class="form-select text-center" id="sellformat">
                                            <option value="0">Select Buying Format</option>
                                            <?php

                                                $bform = Shopply::search("SELECT * FROM `selling_type`");
                                                $form_num = $bform->num_rows;

                                                for($x=0; $x < $form_num; $x++){
                                                    $bform_data = $bform->fetch_assoc();

                                                    ?>
                                                        <option value="<?php echo $bform_data["selltype_id"]?>"><?php echo $bform_data["sell_type"]?></option>
                                                        
                                                    <?php
                                                }
                                                
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

                                            <div class="col-3 mb-1 label">
                                                <img src="resources/box.png" class="img-fluid" style="width: 250px;" id="i0"/>
                                            </div>
                                            <div class="col-3 mb-1 label">
                                                <img src="resources/box.png" class="img-fluid" style="width: 250px;" id="i1"/>
                                            </div>
                                            <div class="col-3 mb-1 label">
                                                <img src="resources/box.png" class="img-fluid" style="width: 250px;" id="i2"/>
                                            </div>
                                            <div class="col-3 mb-1 label">
                                                <img src="resources/box.png" class="img-fluid" style="width: 250px;" id="i3"/>
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
                                                <select class="form-select text-center" id="ship">
                                                    <option value="0">Select Category</option>
                                                    <?php

                                                        $shipping = Shopply::search("SELECT * FROM `shipping`");
                                                        $ship_num = $shipping->num_rows;

                                                        for($x=0; $x < $ship_num; $x++){
                                                            $shipping_data = $shipping->fetch_assoc();

                                                            ?>
                                                                <option value="<?php echo $shipping_data["shipping_id"]?>"><?php echo $shipping_data["method_name"]?></option>
                                                                
                                                            <?php
                                                        }
                                                        
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <label class="form-label">Shipping Cost</label>
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text">$</span>
                                                    <input type="text" class="form-control" id="shipcost"/>
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
                                                    <input type="text" class="form-control" id="cost"/>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check form-check-inline mx-3">
                                                    <input class="form-check-input" type="radio" id="ip" name="a" checked />
                                                    <label class="form-check-label" for="ip">Immediate Payment</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="cod" name="a" />
                                                    <label class="form-check-label" for="cod">Cash On Delivery</label>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>

                                    <hr class="mt-3"/>

                                    <span>Note : <p>7% of the Total Amount will be taken as the Processing Fee</p></span>

                                    <div class="col-12">
                                        <div class="row">

                                            <div class="col-4 align-self-start">
                                                <button type="button" class="btn btn-light border">Discard</button>
                                            </div>
                                            <div class="col-3 ms-4">
                                                <button type="button" class="btn btn-outline-primary">Schedule</button>
                                            </div>
                                            <div class="col-4 d-grid">
                                                <button type="button" class="btn btn-primary border" onclick="addProduct();">Add Product</button>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>


</html>

<?php

}else{
    header("location:signin.php");
}

?>