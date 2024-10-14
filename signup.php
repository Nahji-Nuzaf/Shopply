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

<body class="main-body d-md-block">

    <div class="container-fluid vh-100">
        <div class="row mx=0">

            <!--signUpbox-->

            <div class="col-12" id="signupbox">
                <div class="row">

                    <div class="col-10 col-lg-6 mt-5 offset-1 bg2">
                        <div class="row">
                            
                            <div class="col-12 col-lg-4 align-self-start ms-3 mt-4 logo" style="height: 60px;"></div>

                            <div class="col-12">
                                <div class="row">
                                    <p class="col-5 offset-4 text-center mt-5 fw-bold" style="font-size: 70px;">Welcome</p>
                                    <p class="col-6 offset-6 fw-bold align-self-start" style="font-size: 40px;">Register Now <i class="bi bi-arrow-bar-right"></i> to Explore SHOPPLY</p>
                                </div>
                            </div>
                            
                            <div class="col-4 text-center ms-3 text1">
                                <p class=" fw-bold" style="font-size: 20px;">www.Shopply.com</p>
                            </div>

                            
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 mt-5 bg3">

                        <div class="row">
                            <div class="col-12 ms-3">
                                <p class="fw-bold mt-4 mb-0 ms-4" style="font-size: 30px;">Create an Account.</p>
                                <p class="ms-4" style="font-size: 13px;">Enter Your Details Below</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 ms-3 mt-2">

                                <div class="row">

                                    <div class="row">
                                        <div class="col-5 ms-4">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="fname"/>
                                            <div class="msgbox">
                                                <span class="errors" id="fnamemsg"></span> 
                                            </div>
                                            
                                        </div>

                                        <div class="col-5 ms-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="lname"/>
                                            
                                            <span class="errors" id="lnamemsg"></span>
                                            
                                        </div>
                                    </div>

                                    <div class="col-10 ms-4">
                                        <label class="form-label">E-mail Address</label>
                                        <input type="email" class="form-control" id="email"/>
                                        
                                        <span class="errors" id="emailmsg"></span> 
                                        
                                    </div>

                                    <div class="row">

                                        <div class="col-5 ms-4">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password"/>
                                            
                                            <span class="errors" id="pwmsg"></span> 
                                            
                                        </div>
                                        

                                        <div class="col-5 ms-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" id="cpassword"/>
                                            
                                            <span class="errors" id="cpwmsg" ></span> 
                                            
                                        </div>

                                    </div>

                                    <div class="row mb-3">

                                        <div class="col-5 ms-4">
                                            <label class="form-label">Country</label>
                                            <select class="form-select text-center" id="country" onchange="loadCountrycode();">
                                                <option value="0">Select Country</option>

                                                <?php

                                                    require "connectionshop.php";

                                                    $country_rs = Shopply::search("SELECT * FROM `country`");
                                                    $country_num = $country_rs->num_rows;

                                                    for ($x = 0; $x < $country_num; $x++) {
                                                    $country_data = $country_rs->fetch_assoc();

                                                ?>
                                                    <option value="<?php echo $country_data["country_id"]; ?>"><?php echo $country_data["country_name"]; ?></option>
                                                <?php
                                                }

                                                ?>

                                            </select>
                                            <span class="errors" id="countrymsg"></span>
                                        </div>

                                        <div class="col-5 ms-3">
                                            <label class="form-label">Mobile</label>
                                            <div class="input-group">
                                                <select class="form-select" style="max-width: 76px;" id="cc">
                                                    <option value="0">CC</option>

                                                    <?php
                                                            
                                                        $country_code = Shopply::search("SELECT * FROM `country_code`");
                                                        $country_num = $country_code->num_rows;

                                                        for($y=0; $y < $country_num; $y++){
                                                        $cc_data = $country_code->fetch_assoc();

                                                    ?>
                                                                
                                                        <option value="<?php echo $cc_data['cc_id'];?>"><?php echo $cc_data["c_code"];?></option> 

                                                    <?php
                                                    }

                                                    ?>

                                                </select>
                                                <input type="text" class="form-control" aria-label="Text input with dropdown button" id="mobile"/>   
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-6 mb-1 d-grid mx-auto">
                                        <button type="button" class="btn btn-primary btn2" onclick="signUp();">Create Account</button>
                                    </div>

                                    <div class="col-12 text-center">
                                        <span class="col-12">Or</span>
                                        <p class="text-center">SignUp with
                                            <a href="#" class="text-black"><i class="bi bi-facebook ms-4"></i></a>
                                            <a href="#" class="text-black"><i class="bi bi-google ms-1"></i></a>
                                            <a href="#" class="text-black"><i class="bi bi-linkedin ms-1"></i></a>
                                            <a href="#" class="text-black"><i class="bi bi-twitter ms-1"></i></a>
                                        </p>
                                    </div>

                                    <div class="col-12 text-center">
                                        <span class="fw-bold" style="font-size:15px;">Already Registered? <a href="signin.php" onclick="changeSignup();" class="text-decoration-none text-primary">Sign In</a></span>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--signUpbox-->


        </div>
    </div>
    
    <script src="script.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>