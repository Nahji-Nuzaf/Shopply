<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shopply | Seller</title>
    <link rel="icon" href="resources/Shopply Logo.png" />

    <link rel="stylesheet" href="bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css"/>

</head>

<body class="main-body vh-100">

    <div class="container-fluid d-flex justify-content-center">
        <div class="row align-content-center">

            <div class="logo" style="height: 80px;"></div>

            <div>
               <p class="fw-bold text-center" style="font-size: 15px;">Shopply seller Account</p>
            </div>

            <!--sellersignupbox-->
           
            <div class="col-12" id="sellersignup">
                <div class="row">

                    <div class="col-12 col-lg-4 bg3 mx-auto" style="height: 570px;">

                        <div class="row">
                            <div class="col-12 ms-3">
                                <p class="fw-bold mt-4 mb-0 ms-4" style="font-size: 30px;">Become a Shopply Seller.</p>
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

                                    <div class="col-10 ms-4">
                                        <label class="form-label">Gender</label>
                                        <div class="input-group mb-2">
                                            <select class="form-select"  id="gender">
                                                <option value="0">Select Gender</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>  
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-6 col-md-6 mb-1 d-grid mx-auto">
                                        <button type="button" class="btn btn-primary" onclick="signUp();">Create Account</button>
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
                                        <span class="fw-bold" style="font-size:15px;">Already a Seller? <a href="adminsignin.php" onclick="changeSignup();" class="text-decoration-none text-primary">Sign In</a></span>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--sellersignupbox-->

        </div>
    </div>

</body>


</html>