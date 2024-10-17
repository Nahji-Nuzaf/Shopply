<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SHOPPLY | User profile</title>
    <link rel="icon" href="resources/Shopply Logo.png" />

    <link rel="stylesheet" href="bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css"/>

</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 bg-black" style="height: 55px;">
                <div class="row">
                    <div class="col-12">
                        <div class="col-12 col-lg-2 align-self-start ms-2 mb-2 logo" style="height: 45px;"></div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-1 mb-1 d-flex justify-content-center">
                <div class="row align-content-center">

                    <span>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">My Account</a></li>
                                <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                            </ol>
                        </nav>
                    </span>

                </div>
            </div>

            <hr/>

            <?php 
            
            session_start();

            
            require "connectionshop.php";

            if(isset($_SESSION["shopply"])){

                $email = $_SESSION["shopply"]["email"];

                $user_details = Shopply::search("SELECT * FROM `user` 
                INNER JOIN `country_code` ON country_code.cc_id=user.country_code_cc_id 
                INNER JOIN `country` ON country.country_id=user.country_country_id WHERE `email`='".$email."'");

                $gender_details = Shopply::search("SELECT `gender_gender_id` FROM `user` INNER JOIN `gender` ON gender.gender_id=user.gender_gender_id WHERE `email`='".$email."'");

                $image_rs = Shopply::search("SELECT * FROM `profile_image` WHERE `user_email`='".$email."'");

                $cimage_rs = Shopply::search("SELECT * FROM `cover_img` WHERE `user_email`='".$email."'");

                $address_rs = Shopply::search("SELECT * FROM `user_has_address` WHERE `user_email`='".$email."'");

                $external_data_rs = Shopply::search("SELECT * FROM `external_links` WHERE `user_email`='".$email."'");

                $user_data = $user_details->fetch_assoc();
                $gender_data = $gender_details->fetch_assoc();
                $image_data = $image_rs->fetch_assoc();
                $cimage_data = $cimage_rs->fetch_assoc();
                $address_data = $address_rs->fetch_assoc();
                $external_data = $external_data_rs->fetch_assoc();

            ?>

                <div class="col-10 offset-1">
                    <div class="row">   

                        <div class="col-12">
                            <div class="row mx-auto">

                                <div class="col-12">
                                    <div class="row">

                                        <?php
                                            if(empty($cimage_data["cimg_path"])){
                                        ?>
                                            <img src="resources/shopply_coverimg.jpg" class="mt-3" style="height: 130px;"/>

                                        <?php
                                        }else{
                                        ?>
                                            <img src="<?php echo $cimage_data["cimg_path"];?>" class="mt-1" style="height: 130px;"/>
                                        <?php
                                        }

                                        ?>

                                        <div class="col-1 img2 offset-lg-11">
                                            <div class="row">
                                                <input type="file" class="d-none" id="profileImage2"/>
                                                <label for="profileImage2" class="img2 mt-3"><i class="bi bi-pencil-square"></i></label>
                                            </div>
                                        </div>
                                    

                                    </div>
                                </div>

                                <div class="col-md-3 userdiv bg-body shadow">

                                    <div class="p-3 mb-2">
                                
                                        <div class="align-items-center text-center d-flex flex-column">

                                            <?php
                                                if(empty($image_data["path"])){
                                                ?>
                                                    <img src="resources/userprofile.svg" class="rounded mt-3" height="130px" style="clip-path: circle();"/>
                                                <?php
                                                }else{
                                                ?>
                                                    <img src="<?php echo $image_data["path"];?>" class="rounded mt-5" height="130px" style="clip-path: circle(70px);"/>
                                                <?php
                                                }

                                                ?>

                                                <br/>

                                            <?php

                                            ?>
                                                <span class="fw-bold"><?php echo $user_data["fname"]."_".$user_data["lname"];?></span>
                                                <span><?php echo $email ?></span>
                                                    
                                            <?php

                                            ?>

                                            <input type="file" class="d-none" id="profileImage"/>
                                            <label for="profileImage" class="btn btn-primary mt-3 btn2">Change Image</label>
                                        </div>

                                        <div class="col-12 mt-5 text-center">
                                            <div class="row">
                                                <div class="col-4">
                                                    <img src="resources/userProfile/friend.png" style="width: 30px;"/>
                                                    <span>Followers</span>
                                                </div>

                                                <div class="col-4">
                                                    <img src="resources/userProfile/order.png" style="width: 30px;"/>
                                                    <span>Products</span>
                                                </div>

                                                <div class="col-4">
                                                    <img src="resources/userProfile/stars.png" style="width: 30px;"/>
                                                    <span>Ratings</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 text-center">
                                            <div class="row mt-4">
                                                
                                                <span class="fw-bold" id="regdate">Joined Date</span>
                                                <p><?php echo $user_data["joined_date"];?></p>
                                                
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-md-9  border-start border-end p-3 mb-2 mx-auto shadow-lg userdiv2">

                                    <div class="col-10 mx-auto mt-1">
                                        <div class="row">

                                            <div class="col-12 mb-2">
                                                <p class="fw-bold mb-0" style="font-size: 30px;">My Profile.</p>
                                                <p style="font-size: 13px;">Enter Your Details Below</p>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">

                                                    <div class="col-6 mb-1">
                                                        <label class="form-label">First Name</label>
                                                        <input type="text" class="form-control" id="fname" value="<?php echo $user_data["fname"];?>"/>
                                                    </div>

                                                    <div class="col-6 mb-1">
                                                        <label class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" id="lname" value="<?php echo $user_data["lname"];?>"/>
                                                    </div>

                                                    <div class="col-12 mb-1">
                                                        <label class="form-label">E-mail Address</label>
                                                        <input type="text" class="form-control" id="email" value="<?php echo $user_data["email"];?>" readonly/>
                                                    </div>

                                                    <div class="col-6 mb-1">
                                                        <label class="form-label">Password</label>
                                                        <input type="password" class="form-control" id="password" value="<?php echo $user_data["password"];?>"/>
                                                    </div>

                                                    <div class="col-6 mb-1">
                                                        <label class="form-label">Retype Password</label>
                                                        <input type="password" class="form-control" id="cpassword" value="<?php echo $user_data["confirm_password"];?>"/>
                                                    </div>

                                                    <div class="col-12 mb-1">
                                                        <label for="exampleFormControlTextarea1" class="form-label">About You</label>
                                                        <input type="text" class="form-control" id="bio" value="<?php echo $user_data["about_u"];?>"/>
                                                        
                                                    </div>

                                                    <div class="col-6 mb-1">
                                                        <label class="form-label">Country</label>
                                                        <input type="text" class="form-control" value="<?php echo $user_data["country_name"];?>" readonly/>
                                                    </div>

                                                    <div class="col-6 mb-1">
                                                        <label class="form-label">Mobile</label>
                                                        <div class="input-group">
                                                            <input type="text" style="max-width: 76px;" class="form-control" value="<?php echo $user_data["c_code"];?>" readonly/>
                                                            <input type="text" class="form-control" aria-label="Text input with dropdown button" value="<?php echo $user_data["mobile"];?>"  id="mobile"/>   
                                                        </div>
                                                    </div>

                                                    <?php

                                                        if(empty($address_data["address"])){
                                                            ?>
                                                                <div class="col-12 mb-1">
                                                                    <label class="form-label">Address</label>
                                                                    <input type="text" class="form-control" id="address" placeholder="Include your State and City"/>
                                                                </div>
                                                            <?php
                                                        }else{
                                                            ?>
                                                                <div class="col-12 mb-1">
                                                                    <label class="form-label">Address</label>
                                                                    <input type="text" class="form-control" id="address" placeholder="Include your State and City" value="<?php echo $address_data["address"];?>"/>
                                                                </div>
                                                            <?php
                                                        }

                                                    ?>

                                                    <div class="col-6 mb-1">
                                                        <label class="form-label">Gender</label>
                                                        <select class="form-control" id="gender">
                                                            <option value="0">Select Your Gender</option>

                                                            <?php

                                                                $gender_rs =  Shopply::search("SELECT * FROM `gender`");
                                                                $n = $gender_rs->num_rows;
                                                            
                                                                for ($x=0; $x < $n; $x++) { 
                                                                    $gender_details = $gender_rs->fetch_assoc();
                                                                    ?>
                                                                        <option value="<?php echo $gender_details["gender_id"]; ?>"><?php echo $gender_details["gender_name"]; ?></option>
                                                                    <?php
                                                                
                                                                }

                                                            ?>

                                                        </select>
                                                    </div>

                                                    <?php

                                                        if(empty($address_data["postal_code"])){
                                                            ?>
                                                                <div class="col-6 mb-3">
                                                                    <label class="form-label">Postal Code</label>
                                                                    <input type="text" class="form-control" id="p_code"/>
                                                                </div>
                                                            <?php
                                                        }else{
                                                            ?>
                                                                <div class="col-6 mb-3">
                                                                    <label class="form-label">Postal Code</label>
                                                                    <input type="text" class="form-control" id="p_code" value="<?php echo $address_data["postal_code"];?>"/>
                                                                </div>
                                                            <?php
                                                        }

                                                    ?>
                                                
                                                </div>
                                            </div>

                                            <div class="col-12 mb-2">
                                                <p class="fw-bold mb-0" style="font-size: 30px;">External Links</p>
                                                <p style="font-size: 13px;">Promote Your Business</p>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">


                                                    <?php

                                                        if(empty($external_data["fb_link"])){
                                                            ?>
                                                                <div class="col-6 mb-1">
                                                                    <label class="form-label">Facebook Link :</label>
                                                                    <input type="text" class="form-control" id="fblink"/>
                                                                </div>
                                                            <?php
                                                        }else{
                                                            ?>
                                                                <div class="col-6 mb-1">
                                                                    <label class="form-label">Facebook Link :</label>
                                                                    <input type="text" class="form-control" id="fblink" value="<?php echo $external_data["fb_link"];?>"/>
                                                                </div>
                                                            <?php
                                                        }

                                                    ?>

                                                    <?php

                                                    if(empty($external_data["ig_link"])){
                                                        ?>
                                                            <div class="col-6 mb-1">
                                                                <label class="form-label">Instagram Link :</label>
                                                                <input type="text" class="form-control" id="iglink"/>
                                                            </div>
                                                        <?php
                                                    }else{
                                                        ?>
                                                            <div class="col-6 mb-1">
                                                                <label class="form-label">Instagram Link :</label>
                                                                <input type="text" class="form-control" id="iglink" value="<?php echo $external_data["ig_link"];?>"/>
                                                            </div>
                                                        <?php
                                                    }

                                                    ?>

                                                    <div class="col-6 offset-6 mt-2 mb-1 d-grid" >
                                                        <div class="row">
                                                            <button type="button" style="color: white;" class="col-4 btn btn-warning btn2">Cancel</button>
                                                            <button type="button" class="col-6 ms-5 btn btn-primary btn2" onclick="updateProfile();">Save Changes</button>
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
                </div>

            <?php

            }else{
            
                header("location:signin.php");
            }
            
            
            ?>
            <?php include "footer.php"?>

        </div>
        
    </div>

    <script src="bootstrap.js"></script>
    <script src="script.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>