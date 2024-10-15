<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SHOPPLY</title>
    <link rel="icon" href="resources/Shopply Logo.png" />

    <link rel="stylesheet" href="bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css"/>

</head>

<body class="main-body">

    <div class="container-fluid vh-100">
        <div class="row mx=0">

            <!--signInbox-->

            <div class="col-12" id="signinbox">
                <div class="row">

                    <div class="col-10 col-lg-6 mt-5 offset-1 bg2">

                        <div class="row">
                            <div class="col-12">

                                <div class="col-12 col-lg-4 align-self-start ms-3 mt-4 logo" style="height: 60px;"></div>

                                <div class="row">
                                    <p class="col-5 offset-4 text-center mt-5 fw-bold" style="font-size: 70px;">Welcome</p>
                                    <p class="col-6 offset-6 fw-bold align-self-start" style="font-size: 40px;">Sign In to continue Access</p>
                                </div>

                                <div class="col-4 text-center ms-3 text2">
                                    <p class="fw-bold" style="font-size: 20px;">www.Shopply.com</p>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-lg-4 mt-5 bg3">

                        <div class="row">
                            <div class="col-12 box1">

                                <div class="row">
                                    <div class="col-12 ms-3">
                                        <p class="fw-bold mt-0 mb-0 ms-4" style="font-size: 30px;">Sign In to Shopply.</p>
                                        <p class="ms-4" style="font-size: 13px;">Enter Your Details Below</p>
                                    </div>
                                </div>

                                <?php
                                
                                    $email = "";
                                    $password = "";

                                    if(isset($_COOKIE["email"])){
                                        $email = $_COOKIE["email"];
                                    }

                                    if(isset($_COOKIE["password"])){
                                        $password = $_COOKIE["password"];
                                    }

                                ?>

                                <div class="row">
                                    <div class="col-12 mt-3 ms-3">

                                        <div class="col-10 ms-4 mb-2">
                                            <label class="form-label">E-mail Address</label>
                                            <input type="email" class="form-control" id="email" value="<?php echo $email ?>"/>
                                        </div>

                                        <div class="col-10 ms-4 mb-2">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password" value="<?php echo $password ?>"/>
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
                                                    <button type="button" class="btn btn-primary btn2" onclick="signin();">Sign In</button>
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

                                                <div class="col-12 text-center mt-5">
                                                    <span class="fw-bold" style="font-size:15px;">New to Shopply? <a href="signup.php" class="text-decoration-none text-primary">Join Now</a></span>
                                                </div>

                                                <div class="col-12 text-center mt-1">
                                                    <span class="fw-bold" style="font-size:15px;">Join as an <a href="adminsignin.php" class="text-decoration-none text-primary">Admin</a></span>
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

            <!--signInbox-->
        </div>

        <!--resetpasswordbox-->

        <div class="col-12 d-flex justify-content-center">
            <div class="row align-content-center">
                <div class="col-12 d-none" id="restpasswordbox">

                    <div class="logo mb-2" style="height: 100px;"></div>

                    <div class="bg3 mt-5 resetbox ">

                        <center><img src="resources/warning.png" class="text-center" style="height: 100px;"/></center>
                        <p class="mt-4 text-center fw-bold" style="font-size: 19px;">Enter the verification code we sent to your E-mail</p>

                        <div class="col-12">
                            <div class="row mx-auto">

                                <div class="col-12 mb-2">
                                    <label class="form-label">Verification Code</label>
                                    <input type="email" class="form-control" id="verifycode"/>
                                </div>

                                <div class="col-12 mb-2">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="npass"/>
                                        <button class="btn btn-outline-secondary" type="button" id="npassb" onclick="showPassword();">
                                            <i class="bi bi-eye-fill"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="col-12 mb-2">
                                    <label class="form-label">Confirm New Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="cnpass"/>
                                        <button class="btn btn-outline-secondary" type="button" id="cnpassb" onclick="showPassword1();">
                                            <i class="bi bi-eye-fill"></i>
                                        </button>   
                                    </div>
                                </div>

                                <div class="col-4 col-md-12 mt-2 d-grid">
                                    <button type="button" class="btn btn-primary btn2" onclick="resetpassword();">Reset Password</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--resetpasswordbox--> 

        <!--homemodel-->

        <!--div class="modal" tabindex="-1" id="hm">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <a href="index.php"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>
                    <a href="userprofile.php"><button type="button" class="btn btn-primary">Save changes</button></a>
                </div>
                </div>
            </div>
        </div-->

        <!--homemodel-->

    </div>
    
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>