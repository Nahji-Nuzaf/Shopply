<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

</head>

<body>

    <div class="container-fluid" style="height: 65px;">

        <div class="col-12">
            <div class="row header1">

                <div class="col-9 col-lg-2 mt-2 align-self-start ms-2 logo" style="height: 45px;"></div>

                <!--navbar items-->

                <!--largesc-->
                <div class="col-6 mx-auto mt-3 align-self-start navs">
                    <div class="row">
                        <ul class="ull">
                            <li class="lii"><a class="options" href="index.php">Home</a></li>
                            <li class="lii"><a class="options" href="#">Top Sellers</a></span></li>
                            <li class="lii"><a class="options" href="#">Super Deals</a></span></li>
                            <li class="lii"><a class="options" href="#">Best Products</a></span></li>
                            <li class="lii"><a class="options" href="sellersignin.php">Become a Seller</a></li>
                        </ul>
                    </div>
                </div>
                <!--largesc-->

                <!--smmdsc-->
                <div class="col-1 navsm">

                    <button class="btn btn-primary ms-5" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Options</button>

                    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Options</h5>
                        </div>
                        <div class="offcanvas-body">
                            <ul >
                                <li class="lii"><a class="options" href="index.php">Home</a></li>
                                <li class="lii"><a class="options" href="#">Super Deals</a></li>
                                <li class="lii"><a class="options" href="#">Sellers</a></span></li>
                                <li class="lii"><a class="options" href="myProducts.php">My Products</a></span></li>
                                <li class="lii"><a class="options" href="addProduct.php">Add Product</a></span></li>
                                <li class="lii"><a class="options" href="adminsignin.php">Admin</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--smmdsc-->

                <!--navbar items-->

                <!--about profile-->

                <div class="col-12 col-md-3 mx-auto mt-3 profile">
                    <div class="row">
                        <center>

                            <?php

                            if (isset($_SESSION["shopply"])) {
                                $session_data = $_SESSION["shopply"];
                                $email = $_SESSION["shopply"]["email"];

                                $profile_img_rs = Shopply::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "'");

                                if ($profile_img_rs->num_rows == 1) {

                                    $profile_img_data = $profile_img_rs->fetch_assoc();

                            ?>
                                    <img src="<?php echo $profile_img_data["path"]; ?>"  height="33px" style="clip-path: circle(30px);" class="rounded-circle" />
                                <?php

                                } else {
                                ?>
                                    <img src="resources/userprofile.svg" style="width: 35px;" class="rounded-circle" />
                                <?php
                                }


                                ?>

                                <span class="text-lg-start"><b>Welcome </b>
                                    <?php echo $session_data["fname"] . " " . $session_data["lname"]; ?>
                                </span> &nbsp;&nbsp;&nbsp;
                                <span class="text-lg-start fw-bold boxes" onclick="signout();"><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Sign Out"><img src="resources/otherimgs/logout_6807166.png" height="30px" /></span></span> | &nbsp;
                                <span class="text-lg-start fw-bold boxes"><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Notifications"><img src="resources/notification.png" height="16px" /></span></span> &nbsp;
                                <!--<span class="text-lg-start fw-bold boxes"><a class="text-decoration-none" href="cart.php"><img src="resources/shopping-cart (1).png" height="20px"/></a></span> &nbsp;-->
                                <span class="text-lg-start fw-bold boxes"><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="More"><a class="text-decoration-none" href="purchaseHistory.php"><span><img src="resources/more.png" style="height: 16px;" /></span></span></a></span> &nbsp;


                            <?php

                            } else {
                            ?>

                                <a href="signin.php" class="text-decoration-none text-warning fw-bold">Sign In or Register</a>
                            <?php
                            }

                            ?>

                        </center>
                    </div>
                </div>

                <!--about profile-->

            </div>

        </div>

    </div>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>

    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
</body>

</html>