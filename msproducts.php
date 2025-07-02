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

<body onload="loadChart2();">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <div class="row">

                    <?php
                    include "connectionshop.php";
                    ?>

                    <div class="col-12 mt-4 btn-toolbar justify-content-end">
                        <button class="btn btn-dark me-2"><i class="bi bi-printer-fill" onclick="printreport();"></i> Print</button>
                        <button class="btn btn-danger me-2"><i class="bi bi-filetype-pdf"></i> Export as PDF</button>
                    </div>

                    <div class="col-lg-10 offset-1 mt-5" id="printr">

                        <div class="d-flex justify-content-center">
                            <div class="row align-items-center">
                                <p class="fw-bold mt-2 invoice1" style="font-size: 50px;">Most Sold Products Report</p>
                            </div>
                        </div>

                        <div class="col-lg-10 mx-auto">
                            <div class="mt-2 chart" style="height: 500px;">
                                <!-- <h4 class="text-center">Most Sold Prodcuts</h4> -->
                                <!-- <p>Print</p> -->
                                <canvas id="myChart3"></canvas>
                            </div>
                        </div>

                        <!-- <div class="col-12 text-center mb-3">
                            <label class="form-label fs-5 text-black-50 fw-bold">
                                THANK YOU for doing Business with us !!
                            </label>
                        </div>

                        <div class="col-12 bottom mt-3">
                            <p class="text-center">&copy; 2023 Shopply.lk || All Rights Reserved</p>
                        </div> -->

                    </div>

                </div>
            </div>

        </div>
    </div>


    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>