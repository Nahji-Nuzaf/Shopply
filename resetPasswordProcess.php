<?php

require "connectionshop.php";

$email = $_POST["e"];
$vcode = $_POST["vc"];
$newpass = $_POST["np"];
$cnewpass = $_POST["cnp"];

if(empty($email)){
    echo("Please Enter your Email Address.");
}else if(empty($vcode)){
    echo("Please Enter the Verification Code");
}else if(empty($newpass)){
    echo("Enter your New Password");
}else if(strlen($newpass) < 5 || strlen($newpass) > 20){
    echo("Password must be between 5-20 Characters");
}else if(empty($cnewpass)){
    echo("Please Confirm your New Password");
}else if($newpass !=$cnewpass){
    echo("Password doesn't match");
}else{

    $rs = Shopply::search("SELECT * FROM `user` WHERE `email`='".$email."' AND `verification_code`='".$vcode."'");
    $rows = $rs->num_rows;

    if($rows == 1){
        Shopply::iud("UPDATE `user` SET `password`='".$newpass."',`confirm_password`='".$cnewpass."' WHERE `email`='".$email."' AND `verification_code`='".$vcode."'");

        echo("success");
    }else{
        echo("Invalid user details");
    }



}





?>