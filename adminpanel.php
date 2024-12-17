<?php

session_start();

require "connectionshop.php";

// $admin = 

if (isset($_SESSION["shopply"])) {
?>
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
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    </head>

    <body onload="loadChart();">

        <div class="container-fluid">
            <div class="row">

                <?php
                include "adminheader.php";

                // include "connectionshop.php";

                // $amount = 0;

                ?>

                <div class="col-lg-10 col-md-12 offset-lg-1">

                    <div class="row mt-3">

                        <div class="col-2 d-flex justify-content-center adminoptions shadow-lg">
                            <div class="row align-content -center">
                                <div class="col-12">
                                    <div class="text-center mt-3">
                                        <img src="resources/userProfile/profile.png" height="140px" />
                                        <p class="fw-bold fs-4 mt-2">Admin</p>
                                    </div>
                                    <ul class="adminprofile">
                                        <li class="mt-3"><a class="options" href="#"><i class="bi bi-house-door"></i>Dashboard</a></li>
                                        <li class="mt-3"><a class="options" href="#"><i class="bi bi-file-earmark-bar-graph"></i> Overviews</a></li>
                                        <li class="mt-3"><a class="options" href="#"><i class="bi bi-bar-chart-line"></i> Statistics</a></li>
                                        <li class="mt-3"><a class="options" href="#"><i class="bi bi-people"></i> Referals</a></li>
                                        <li class="mt-3"><a class="options" href="#"><i class="bi bi-credit-card"></i> Payment</a></li>
                                        <li class="mt-3"><a class="options" href="#"><i class="bi bi-envelope"></i> Messages</a></li>
                                        <li class="mt-3"><a class="options" href="#"><i class="bi bi-sliders"></i> Settings</a></li>
                                        <li class="mt-3"><a class="options" href="signup.php"><i class="bi bi-box-arrow-left"></i> Log Out</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-9 d-flex adminoptionso">

                            <div class="row">
                                <div class="col-12">

                                    <div class="row">

                                        <?php

                                        $auser = Shopply::search("SELECT * FROM `user`");
                                        $unum = $auser->num_rows;

                                        $apro = Shopply::search("SELECT * FROM `product`");
                                        $pnum = $apro->num_rows;

                                        $ainvoice = Shopply::search("SELECT * FROM `invoice`");
                                        $ainvoice_num = $ainvoice->num_rows;
                                        $ainvoice_data = $ainvoice->fetch_assoc();

                                        $amount_rs = Shopply::search("SELECT SUM(`amount`) FROM `invoice`");
                                        $amount_data = $amount_rs->fetch_assoc();

                                        $total_amount = implode(', ', $amount_data);

                                        $revenue_amount = $total_amount * 7 / 100;


                                        ?>

                                        <div class="col-2 adminpbox ms-4 shadow ">

                                            <h1 class="fw-bold fs-5  ms-2 mt-1" style="font-family: VanillaRavioli_Demo;">
                                                Total Users
                                            </h1>
                                            

                                            <p class="ms-2 mt-1 fw-bold text-primary fs-3"><?php echo ($unum); ?></p>

                                        </div>

                                        <div class="col-4 adminpbox ms-3 shadow ">
                                            <h1 class="fw-bold fs-5 ms-2 mt-1" style="font-family: VanillaRavioli_Demo;">
                                                Performance
                                            </h1>

                                            <span style="font-size: 8px;">Total Views</span>
                                            <div class="progress" role="progressbar" aria-label="Warning striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar progress-bar-striped bg-warning" style="width: 30%"></div>
                                            </div>

                                            <span style="font-size: 8px;">Total Views</span>
                                            <div class="progress" role="progressbar" aria-label="Danger striped example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar progress-bar-striped bg-danger" style="width: 70%"></div>
                                            </div>

                                        </div>


                                        <div class="col-5 adminpbox ms-3 shadow ">
                                            <div class="row mt-3">
                                                <h1 class="col-9 fw-bold fs-5 ms-2" style="font-family: VanillaRavioli_Demo;">
                                                    Total Income
                                                </h1>
                                                <div class="col-2">
                                                    <div class="spinner-grow text-primary" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </div>
                                            </div>


                                            <p class="ms-2 mt-1 fw-bold text-warning fs-3">$ <?php echo $total_amount ?></p>
                                        </div>

                                        <div class="col-3 adminpbox mt-2 ms-4 shadow ">
                                            <div class="row mt-3">

                                                <h1 class="col-8 fw-bold fs-5 ms-2" style="font-family: VanillaRavioli_Demo;">
                                                    Total Sellings
                                                </h1>


                                                <div class="col-2">
                                                    <div class="spinner-grow text-success" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </div>
                                            </div>



                                            <p class="ms-2 mt-1 fw-bold text-primary fs-3"><?php echo $ainvoice_num ?> Products</p>

                                        </div>

                                        <div class="col-3 adminpbox mt-2 ms-2 shadow ">
                                            <div class="row mt-3">
                                                <h1 class="col-8 fw-bold fs-5 ms-2" style="font-family: VanillaRavioli_Demo;">
                                                    Total Products
                                                </h1>

                                                <div class="col-2">
                                                    <div class="spinner-grow text-warning" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <p class="ms-2 mt-1 fw-bold text-primary fs-3"><?php echo ($pnum); ?></p>

                                        </div>

                                        <div class="col-5 adminpbox ms-4 mt-2 shadow ">
                                            <div class="row mt-3">
                                                <h1 class="col-9 fw-bold fs-5 ms-2" style="font-family: VanillaRavioli_Demo;">
                                                    Total Revenue
                                                </h1>

                                                <div class="col-2">
                                                    <div class="spinner-grow text-info" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </div>
                                            </div>


                                            <p class="ms-2 mt-1 fw-bold text-danger fs-3">$ <?php echo $revenue_amount ?> </p>
                                        </div>



                                    </div>


                                    <div class="row mt-3 ms-5">

                                        <!--chart-->
                                        <div class="col-6 soldpro shadow">
                                            <div class="mt-2 chart1 mx-auto">
                                                <h4 class="text-center text-secondary-emphasis" style="font-family: Gajkley;">Most Sold Prodcuts</h4>
                                                <canvas id="myChart" class="mt-5"></canvas>
                                            </div>
                                        </div>

                                        <div class="col-5 ms-3 likedpro shadow">
                                            <div class="col-10 mx-auto mt-2  chart">
                                                <h4 class="text-center text-secondary-emphasis" style="font-family: Gajkley;">Most Liked Prodcuts</h4>
                                                <canvas id="myChart2"></canvas>
                                            </div>
                                        </div>
                                        <!--chart-->

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>




            </div>

        </div>


        <?php
        //include "footer.php"
        ?>

        <script>
            window.addEventListener('load', loadChart3);
        </script>

        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl)
            })
        </script>

        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    </body>

    </html>

<?php


} else {

    // header ("location:adminsignin.php");

}

?>