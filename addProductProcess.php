<?php

session_start();
require "connectionshop.php";

$email = $_SESSION["shopply"]["email"];

$category = $_POST["ca"];
$brand = $_POST["br"];
$model = $_POST["m"];
$title = $_POST["t"];
$condition = $_POST["con"];
$color = $_POST["clr"];
$qty = $_POST["q"];
$dimension = $_POST["dim"];
$selltype = $_POST["st"];
$shippingmethod = $_POST["ship"];
$shippingcost = $_POST["shipc"];
$cost = $_POST["cost"];
$desc = $_POST["desc"];
$costpayment = $_POST["cp"];

$mhb_rs = Shopply::search("SELECT * FROM `model_has_brand` WHERE `model_model_id` ='".$model."' AND `brand_brand_id`='".$brand."' ");

$mhb_id ;

if($mhb_rs->num_rows > 0){
     
    $mhb_data = $mhb_rs->fetch_assoc();
    $mhb_id = $mhb_data["id"];

}else{

    Shopply::iud("INSERT INTO `model_has_brand`(`model_model_id`,`brand_brand_id`) VALUES ('".$model."','".$brand."')");

    $mhb_id = Shopply::$connection->insert_id;

}

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

Shopply::iud("INSERT INTO `product` (`price`,`qty`,`description`,`title`,`datetime_added`,`shipping_cost`,
`shipping_shipping_id`,`category_id`,`model_has_brand_id`,`color_name`,`status_status_id`,`condition_condition_id`,
`product_dimension`,`selling_type_selltype_id`,`payment_method_pm_id`,`user_email`)
                VALUES ('".$cost."','".$qty."','".$desc."','".$title."','".$date."','".$shippingcost."','".$shippingmethod."','".$category."',
                '".$mhb_id."','".$color."','1','".$condition."','".$dimension."','".$selltype."','".$costpayment."','".$email."')");

$product_id = Shopply::$connection->insert_id;

$length = sizeof($_FILES);

if($length <= 4 && $length > 0){

    $allowed_img_extensions = array("image/jpg","image/jpeg","image/png","image/svg+xml");

    for($x = 0; $x < $length; $x++){
        if(isset($_FILES["img".$x])){
            $img_file = $_FILES["img".$x];
            $file_extension = $img_file["type"];

            if(in_array($file_extension,$allowed_img_extensions)){

                $new_img_extension;

                if($file_extension == "image/jpg"){
                    $new_img_extension = ".jpg";
                }else if($file_extension == "image/jpeg"){
                    $new_img_extension = ".jpeg";
                }else if($file_extension == "image/png"){
                    $new_img_extension = ".png";
                }else if($file_extension == "image/svg+xml"){
                    $new_img_extension = ".svg";
                }


                $file_name = "resources//products//".$title."_".$x."_".uniqid().$new_img_extension;
                move_uploaded_file($img_file["tmp_name"],$file_name);

                Shopply::iud("INSERT INTO `product_img` (`img_path`,`product_product_id`) VALUES ('".$file_name."','".$product_id."')");

                echo ("success");

            }else{
                echo("Not an Allowed image type");
            }

        }
    }

}else{
    echo ("Invalid Image Count");
}



?>