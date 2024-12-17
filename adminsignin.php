
<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shopply | Admin</title>
    <link rel="icon" href="resources/Shopply Logo.png" />

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

</head>

<body class="main-body vh-100">

    <div class="container-fluid d-flex justify-content-center">
        <div class="row align-content-center">

            <div class="logo" style="height: 80px;"></div>

            <div>
                <p class="fw-bold text-center" style="font-size: 15px;">Shopply Admin Account</p>
            </div>

            <!--adminsigninbox-->

            <div class="col-12" id="sellersignin">

                <div class="row">

                    <div class="col-12 col-lg-6 bg3 mx-auto" style="height: 550px;">

                        <div class="row">
                            <div class="col-12 box1">

                                <div class="row">
                                    <div class="col-12 ms-3">
                                        <p class="fw-bold mt-0 mb-0 ms-4" style="font-size: 30px;">Admin of the Family.</p>
                                        <p class="ms-4" style="font-size: 13px;">Sign In to continue</p>
                                    </div>
                                </div>

                                <?php

                                $adminemail = "";
                                $adminpassword = "";

                                if (isset($_COOKIE["ademail"])) {
                                    $adminemail = $_COOKIE["ademail"];
                                }

                                if (isset($_COOKIE["adpassword"])) {
                                    $adminpassword = $_COOKIE["adpassword"];
                                }

                                ?>


                                <div class="row">
                                    <div class="col-12 mt-3 ms-3">

                                        <div class="col-10 ms-4 mb-2">
                                            <label class="form-label">E-mail Address</label>
                                            <input type="email" class="form-control" id="ademail" value="<?php echo $adminemail ?>"/>
                                        </div>

                                        <div class="col-10 ms-4 mb-2">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" id="adpassword" value="<?php echo $adminpassword ?>"/>
                                        </div>

                                        <div class="col-10 ms-4 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="rememberme">
                                                <label class="form-check-label" for="rememberme" style="font-size: 15px;">
                                                    Remember Me
                                                </label>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="row">

                                                <div class="col-4 col-md-4 d-grid ms-4">
                                                    <button type="button" class="btn btn-primary" onclick="adminsignin();">Sign In</button>
                                                </div>

                                                <div class="col-4 col-md-4 offset-2 text-end">
                                                    <span><a href="#" class="text-decoration-none text-danger" onclick="forgotpassword();">Forgot Password ?</a></span>
                                                </div>

                                                <div class="col-12">
                                                    <span class="col-10 offset-2">Or</span>
                                                    <p class="ms-4">Sign In with
                                                        <a href="#" class="text-black"><i class="bi bi-facebook ms-4"></i></a>
                                                        <a href="#" class="text-black"><i class="bi bi-google ms-1"></i></a>
                                                        <a href="#" class="text-black"><i class="bi bi-linkedin ms-1"></i></a>
                                                        <a href="#" class="text-black"><i class="bi bi-twitter ms-1"></i></a>
                                                    </p>
                                                </div>

                                                <div class="col-12 text-center mt-4">
                                                    <span class="fw-bold" style="font-size:15px;">Want to LogIn as a <a href="signin.php" class="text-decoration-none text-primary">User ?</a></span>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <!--adminsigninbox-->

        </div>
    </div>
    </div>



    <script src="script.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>