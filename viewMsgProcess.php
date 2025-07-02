<?php

session_start();
require "connectionshop.php";

$recever_email = $_SESSION["shopply"]["email"];
$sender_email = $_GET["e"];

$msg_rs = Shopply::search("SELECT * FROM `chat` WHERE `from`='" . $sender_email . "' OR `to`='" . $sender_email . "'");
$msg_num = $msg_rs->num_rows;

for ($x = 0; $x < $msg_num; $x++) {
    $msg_data = $msg_rs->fetch_assoc();

    if ($msg_data["from"] == $sender_email && $msg_data["to"] == $recever_email) {

        $user_rs = Shopply::search("SELECT * FROM `user` WHERE `email`='" . $msg_data["from"] . "'");
        $user_data = $user_rs->fetch_assoc();

        $img_rs = Shopply::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $msg_data["from"] . "'");
        $img_data = $img_rs->fetch_assoc();


?>
        <!-- sender -->
        <div class="media w-75">
            <?php
            if (isset($img_data["path"])) {
            ?>
                <img src="<?php echo $img_data["path"]; ?>" class="rounded mt-1 my-auto" style="width: 60px;">
            <?php
            } else {
            ?>
                <img src="resources/userprofile.svg" class="rounded mt-1 my-auto" style="width: 60px;">
            <?php
            }

            ?>  

            <div class="media-body me-4">

                <div class="col-10">
                    <div class="list-group-item list-group-item-action text-black rounded-3 bg-secondary">
                        <div class="media">
                            <div class="d-flex align-items-center justify-content-between mb-1 ">
                                <p class="mb-2 mt-2 ms-3"><?php echo $msg_data["content"]; ?></p>
                            </div>
                        </div>
                    </div>
                    <small class="small fw-bold text-end"><?php echo $msg_data["date_time"]; ?></small>
                    <p class="invisible" id="rmail"><?php echo $msg_data["from"]; ?></p>
                </div>

            </div>
        </div>
        <!-- sender -->
    <?php

    } else if ($msg_data["to"] == $sender_email && $msg_data["from"] == $recever_email) {

        $user_rs = Shopply::search("SELECT * FROM `user` WHERE `email`='" . $msg_data["from"] . "'");
        $user_data = $user_rs->fetch_assoc();

    ?>
        <!-- receiver -->
        <div class="offset-3 col-9 media w-75 text-end justify-content-end align-items-end">
            <div class="media-body">

                <div class="col-12">
                    <div class="list-group-item list-group-item-action text-black rounded-3 bg-secondary">
                        <div class="media">
                            <div class="d-flex align-items-center justify-content-between mb-1 ">
                                <p class="mb-2 mt-2 ms-3"><?php echo $msg_data["content"]; ?></p>
                            </div>
                        </div>
                    </div>
                    <small class="small fw-bold text-end"><?php echo $msg_data["date_time"]; ?></small>
                </div>

            </div>
        </div>
        <!-- receiver -->
<?php
    }
    if($msg_data["status"] == 0){
        Shopply::iud("UPDATE `chat` SET `status`='1' WHERE `from`='".$sender_email."' AND `to`='".$recever_email."'");
    }
}

?>