<?php

require "connectionshop.php";

$email = $_POST["email"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$pass = $_POST["password"];
$cpass = $_POST["cpassword"];
$country = $_POST["country"];
$mobile = $_POST["mobile"];
$country_code = $_POST["cc"];

if(empty($fname)){
    echo("Please Enter Your First Name");
}else if(strlen($fname) > 20){
    echo("First Name must have less than 20 Characters");
}else if(empty($lname)){
    echo("Please Enter Your Last Name.");
}else if(strlen($lname) > 20 ){
    echo("Last Name must have less than 20 Characters");
}else if(empty($email)){
    echo("Please Enter your Email Address");
}else if(strlen($email) > 50){
    echo("Email Address must have less than 50 Characters");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo("Invalid Email Address");
}else if(empty($pass)){
    echo("Please enter your Password");
}else if(strlen($pass)<5 || strlen($pass)> 20 ){
    echo("Password length must be between 5-20 Characters");
}else if(empty($cpass)){
    echo("Please confirm your Password");
}else if(strlen($cpass)<5 || strlen($cpass) > 20){
    echo("Password length must be between 5-20 Characters");
}else if($cpass != $pass){
    echo("Password doesn't match");
}else if($country == 0){
        echo("Please select your Gender");
}else if(empty($country_code)){
    echo("Please select your country code");
}else if(empty($mobile)){
    echo("Please enter your Mobile Number");
}else if(strlen($mobile) !=9){
    echo("Mobile Number Must contain 9 Characters.");
}else if(!preg_match("/[0,1,2,4,5,6,7,8,][0-9]/",$mobile)){
    echo("Invalid Mobile Number");
}else{

    $rs = Shopply::search("SELECT * FROM `user` WHERE `email`='".$email."'");
    $n = $rs->num_rows;

    if($n > 0){

        echo("User Exists");

    }else{

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Shopply::iud("INSERT INTO `user` (`email`,`fname`,`lname`,`password`,`confirm_password`,
        `joined_date`,`status`,`country_country_id`,`country_code_cc_id`,`mobile`)
        VALUES ('".$email."','".$fname."','".$lname."','".$pass."','".$cpass."',
        '".$date."','1','".$country."','".$country_code."','".$mobile."')");

        echo("success");

    }

}

?>