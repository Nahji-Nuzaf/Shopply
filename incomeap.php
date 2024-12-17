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

            <div class="col-12">
                <div class="row">

                    <?php

                    include "adminheader.php";
                    include "connectionshop.php";

                    $rs = Shopply::search("SELECT * FROM `user`");
                    $num = $rs->num_rows;

                    ?>



                    <div class="col-lg-11">
                        <div class="row d-flex justify-content-end mt-4">

                            <div class="col-3">
                                <span>From :
                                    <input type="date" class="form-control" placeholder="Date From" id="from" />
                                </span>
                            </div>

                            <div class="col-3">
                                <span>To :
                                    <input type="date" class="form-control" placeholder="Date To" id="to" />
                                </span>
                            </div>

                        </div>
                        <div class="row d-flex justify-content-end mt-4">
                            <button class="btn btn-dark me-2 col-2" onclick="filterincome();">Filter</button>
                        </div>

                    </div>


                    <div class="col-lg-10 offset-1">

                        <div class="col-12 mt-4 btn-toolbar">
                            <button class="btn btn-dark me-2"><i class="bi bi-printer-fill" onclick="printreport();"></i> Print</button>
                            <button class="btn btn-danger me-2"><i class="bi bi-filetype-pdf"></i> Export as PDF</button>
                        </div>

                        <div class="d-flex mt-3"id="loadreport">
                            <div class="row">
                                <div class="col-12">
                                    <p class="fw-bold" style="font-size: 50px;">Income Document</p>
                                    <hr/>
                                    <p class="text-center fw-bold fs-2">Please Select the dates & tap filter</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- <div class="col-12 mb-5" id="loadreport">
                        </div> -->



                        <div class="col-12 bottom mt-3">
                            <p class="text-center">&copy; 2023 Shopply.lk || All Rights Reserved</p>
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