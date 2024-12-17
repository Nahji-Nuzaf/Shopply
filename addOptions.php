<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SHOPPLY | Admin</title>
    <link rel="icon" href="resources/Shopply Logo.png" />

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php
            include "adminheader.php";
            include "connectionshop.php";

            //$rs = Shopply::search("SELECT * FROM `category`");
            //$catnum  = $rs->num_rows;

            ?>


            <div class="col-lg-10 offset-1 mt-5">
                <div class="row">

                    <!--div class="col-12">
                        <?php
                        //for ($i = 0; $i < $catnum; $i++) {
                            //$cat = $rs->fetch_assoc();
                        ?>
                            <div class=" col-4 border" style="display: inline;">
                                <p class="fw-bold fs-4 mx-auto"> <?php //echo $cat["category_name"] ?></p>
                            </div>
                            
                        <?php
                        //}

                        ?>
                    </div-->

                    <div class="col-6 mt-3">
                        <h1 class="fs-4">Add Category</h1>
                        <div class="input-group mb-3 mt-1">
                            <input type="text" class="form-control" placeholder="Enter Category" aria-describedby="button-addon2" id="newcat">
                            <button class="btn btn-warning" type="button" id="button-addon2" onclick="ncat();"><i class="bi bi-plus-lg"></i> Add</button>
                        </div>
                    </div>

                    <div class="col-6 mt-3">
                        <h1 class="fs-4">Add Brand</h1>
                        <div class="input-group mb-3 mt-1">
                            <input type="text" class="form-control" placeholder="Enter Brand" aria-describedby="button-addon2" id="newbarnd">
                            <button class="btn btn-warning" type="button" id="button-addon2" onclick="nbrand();"><i class="bi bi-plus-lg"></i> Add</button>
                        </div>
                    </div>
                    <div class="col-6 mx-auto">
                        <h1 class="fs-4">Add Model</h1>
                        <div class="input-group mb-3 mt-1">
                            <input type="text" class="form-control" placeholder="Enter Model" aria-describedby="button-addon2" id="newmodel">
                            <button class="btn btn-warning" type="button" id="button-addon2" onclick="nmodel();"><i class="bi bi-plus-lg"></i> Add</button>
                        </div>
                    </div>


                </div>
            </div>



        </div>
    </div>


    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>