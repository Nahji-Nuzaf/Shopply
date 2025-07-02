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
            ?>

            <div class="col-12">
                <div class="row">

                    <div class="col-12 col-lg-10 align-self-start mb-3 mt-3 offset-lg-1">
                        <div class="row">
                            <div class="col-12">
                                <p class="fw-bold mb-0 fs-1"  style="font-family: Gothamss;">Get your Reports here.</p>
                            </div>
                            <hr />
                        </div>
                    </div>

                    <div class="col-12 col-lg-10 mb-3 mt-3 offset-lg-1">
                        <div class="row">

                            <div class="card mx-auto shadow" style="width: 18rem;">
                                <img src="resources/reports/get-stock-reports.jpg" class="card-img-top mt-2" height="180px" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Stock Report</h5>
                                    <p class="card-text">Generate your Stock Report here.</p>
                                    <a href="stocks.php" class="btn btn-primary">Generate</a>
                                </div>
                            </div>

                            <div class="card mx-auto shadow" style="width: 18rem;">
                                <img src="resources/reports/maxresdefault.jpg" class="card-img-top mt-2" height="180px" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Products Report</h5>
                                    <p class="card-text">Generate your Products Report here.</p>
                                    <a href="products.php" class="btn btn-primary">Generate</a>
                                </div>
                            </div>

                            <div class="card mx-auto shadow" style="width: 18rem;">
                                <img src="resources/reports/Mageworx-Magento-2-Extended-Sales-Orders-Grid-Extension.jpg" class="card-img-top" height="180px" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Order History Report</h5>
                                    <p class="card-text">Generate your all kind of Order Report here.</p>
                                    <a href="orders.php" class="btn btn-primary">Generate</a>
                                </div>
                            </div>

                            

                            <div class="card mx-auto shadow" style="width: 18rem;">
                                <img src="resources/reports/Reports dashboard design concept.jpg" class="card-img-top mt-2" height="180px" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Users</h5>
                                    <p class="card-text">Generate your Annual User Report here.</p>
                                    <a href="users.php" class="btn btn-primary">Generate</a>
                                </div>
                            </div>

                            <div class="card mx-auto mt-3 shadow" style="width: 18rem;">
                                <img src="resources/reports/Report Design Builder.jpg" class="card-img-top mt-2" height="180px" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Most Sold Products</h5>
                                    <p class="card-text">Generate Most Sold products Report here.</p>
                                    <a href="msproducts.php" class="btn btn-primary">Generate</a>
                                </div>
                            </div>

                            <div class="card mx-auto mt-3 shadow" style="width: 18rem;">
                                <img src="resources/reports/Report Design Builder.jpg" class="card-img-top mt-2" height="180px" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Sales Income</h5>
                                    <p class="card-text">Generate your Annual Income Report here.</p>
                                    <a href="#" class="btn btn-primary">Generate</a>
                                </div>
                            </div>

                            <div class="card mx-auto mt-3 shadow" style="width: 18rem;">
                                <img src="resources/reports/purchasereportname.png" class="card-img-top mt-2" height="180px" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Purchase Reports</h5>
                                    <p class="card-text">Generate Purchased Product Reports here.</p>
                                    <a href="purchaseReport.php" class="btn btn-primary">Generate</a>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>

        </div>

    </div>
    

</body>

</html>