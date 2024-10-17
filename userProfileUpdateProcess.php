<?php

session_start();

require "connectionshop.php";

if (isset($_SESSION["shopply"])) {

    $user_email = $_SESSION["shopply"]["email"];

    $fname = $_POST["fn"];
    $lname = $_POST["ln"];
    $mobile = $_POST["m"];
    $pw = $_POST["password"];
    $cpw = $_POST["cpass"];
    $abtu = $_POST["about"];
    $address_line = $_POST["address"];
    $gender = $_POST["gender"];
    $pc = $_POST["postal_code"];
    $fb = $_POST["fblink"];
    $ig = $_POST["iglink"];

    $address_rs = Shopply::search("SELECT * FROM `user_has_address` WHERE `user_email`='".$user_email."'");

    $address_num = $address_rs->num_rows;

    if($address_num == 1){

        Shopply::iud("UPDATE `user_has_address` SET `address`='".$address_line."' , `postal_code`='".$pc."' WHERE `user_email`='".$user_email."'");

    }else{

        Shopply::iud("INSERT INTO `user_has_address` (`address`,`postal_code`,`user_email`) VALUES ('".$address_line."','".$pc."','".$user_email."')");

    }

    $allowed_image_extensions = array("image/jpg","image/jpeg","image/png","image/svg+xml");

    if(isset($_FILES["img"])){

        $img = $_FILES["img"];
        $file_type = $img["type"];
        
        if(in_array($file_type,$allowed_image_extensions)){

            $new_file_type;

            if($file_type == "image/jpg"){
                $new_file_type = ".jpg";
            }else if($file_type == "image/jpeg"){
                $new_file_type = ".jpeg";
            }else if($file_type == "image/png"){
                $new_file_type = ".png";
            }else if($file_type == "image/svg+xml"){
                $new_file_type = ".svg";
            }    
                
            $file_name = "resources//profilepics//" . $lname . "_" . $mobile . "_" .uniqid(). $new_file_type;

            move_uploaded_file($img["tmp_name"],$file_name);

            $image_rs = Shopply::search("SELECT * FROM `profile_image` WHERE `user_email`='".$user_email."'");

            $image_num = $image_rs->num_rows;

            if($image_num == 1){
                Shopply::iud("UPDATE `profile_image` SET `path`='".$file_name."' WHERE `user_email`='".$user_email."'");

            }else{

                Shopply::iud("INSERT INTO `profile_image` (`path` , `user_email`) VALUES ('".$file_name."','".$user_email."')");

            }

        }else{
            echo("File Type does not allowed to upload");
        }

    }else{
        //echo("Image Not Updated");
    }

    if(isset($_FILES["img2"])){

        $img2 = $_FILES["img2"];
        $file_type2 = $img2["type"];
        
        if(in_array($file_type2,$allowed_image_extensions)){

            $new_file_type2;

            if($file_type2 == "image/jpg"){
                $new_file_type2 = ".jpg";
            }else if($file_type2 == "image/jpeg"){
                $new_file_type2 = ".jpeg";
            }else if($file_type2 == "image/png"){
                $new_file_type2 = ".png";
            }else if($file_type2 == "image/svg+xml"){
                $new_file_type2 = ".svg";
            }    
                
            $file_name2 = "resources//coverpics//" . $lname . "_" . $mobile . "_" .uniqid(). $new_file_type2;

            move_uploaded_file($img2["tmp_name"],$file_name2);

            $cimage_rs = Shopply::search("SELECT * FROM `cover_img` WHERE `user_email`='".$user_email."'");

            $cimage_num = $cimage_rs->num_rows;

            if($cimage_num == 1){
                Shopply::iud("UPDATE `cover_img` SET `cimg_path`='".$file_name2."' WHERE `user_email`='".$user_email."'");

            }else{

                Shopply::iud("INSERT INTO `cover_img` (`cimg_path` , `user_email`) VALUES ('".$file_name2."','".$user_email."')");

            }

        }else{
            echo("File Type does not allowed to upload");
        }

    }else{
        //echo("Image Not Updated");
    }

    $external_links_rs = Shopply::search("SELECT * FROM `external_links` WHERE `user_email`='".$user_email."'");
    $external_link_num = $external_links_rs->num_rows;

    if($external_link_num == 1){

        Shopply::iud("UPDATE `external_links` SET `fb_link`='".$fb."' , `ig_link`='".$ig."' WHERE `user_email`='".$user_email."'");

    }else{

        Shopply::search("INSERT INTO `external_links` (`fb_link`,`ig_link`,`user_email`) VALUES ('".$fb."','".$ig."','".$user_email."')");

    }

    $user_rs = Shopply::search("SELECT * FROM `user` WHERE `email` = '" . $user_email . "'");
    $user_num = $user_rs->num_rows;

    if($user_num == 1){

        Shopply::iud(" UPDATE `user` SET `fname`='".$fname."' , `lname`='".$lname."' , `password`='".$pw."' , `confirm_password`='".$cpw."' , `about_u`='".$abtu."' , `mobile`='".$mobile."' WHERE `email` = '" . $user_email . "' ");

        echo ("success");

    }else{

        echo ("You are not a valid user");

    }
    
}

?>