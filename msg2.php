<?php

session_start();
require "connectionshop.php";

if (isset($_SESSION["shopply"])) {

?>

    <!DOCTYPE html>

    <html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shopply | Messages</title>
        <link rel="icon" href="resources/Shopply Logo.png" />

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />

    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <?php

                include "header.php";

                $email = $_SESSION["shopply"]["email"];

                ?>

                <div class="col-12">
                    <div class="row ">

                        <div class="col-12 col-lg-10 mx-auto mt-3">
                            <div class="row shadow rounded">


                                <div class="col-lg-5 mt-3">
                                    <div class="row">

                                        <div class="col-10 mx-auto">

                                            <div class="row mb-1">

                                                <div class="col-6">
                                                    <span class="fs-1 fw-bold">Messages.</span>
                                                </div>

                                                <div class="col-6 text-end my-auto">
                                                    <button type="button" class="btn btn-warning"><img src="resources/edit-text.png" style="height: 20px;" />&nbsp;&nbsp;Edit</button>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-12 col-lg-12 mb-2">
                                                    <input type="text" class="form-control sbox" placeholder="Search..." id="search" />
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 col-lg-12" style="font-size: 15px;">
                                                    <span class="">Sort By :</span>
                                                    <select class="border-none my-auto">
                                                        <option>Recieved</option>
                                                        <option>Sent</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <hr />

                                            <div class="row">
                                                <div class="tab-content" id="myTabContent">

                                                    <?php

                                                    $msg_rs = Shopply::search("SELECT DISTINCT `content`,`datetime`,`status`,`from` 
                                                FROM `chat` WHERE `to`='" . $email . "' ORDER BY `datetime` DESC");
                                                    $msg_num = $msg_rs->num_rows;

                                                    ?>

                                                    <div class="tab-pane" id="profile" role="tabpanel">
                                                        <div class="message_box" id="message_box">


                                                            <!--chatbox-->

                                                            <?php

                                                            for ($x = 0; $x < $msg_num; $x++) {

                                                                $msg_data = $msg_rs->fetch_assoc();

                                                                if ($msg_data["status"] == 0) {

                                                            ?>

                                                                    <div class="list-group rounded-0" onclick="viewMessages();" style="background-color: #CF9FFF;">

                                                                        <a href="#" class="list-group-item list-group-item-action text-black rounded-3" style="background-color: #CF9FFF;">

                                                                            <?php

                                                                            $user_rs = Shopply::search("SELECT * FROM `user` WHERE `email`='" . $msg_data["from"] . "'");
                                                                            $user_data = $user_rs->fetch_assoc();

                                                                            $img_rs = Shopply::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $msg_data["from"] . "'");
                                                                            $img_data = $img_rs->fetch_assoc();

                                                                            ?>

                                                                            <div class="media">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="row">

                                                                                            <div class="col-2 ms-3 my-auto">

                                                                                                <?php

                                                                                                if (isset($img_data["path"])) {
                                                                                                ?>
                                                                                                    <img src="<?php echo $img_data["path"]; ?>" class="rounded mt-1 my-auto" style="width: 50px;">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img src="resources/userprofile.svg" class="rounded mt-1 my-auto" style="width: 50px;">
                                                                                                <?php
                                                                                                }

                                                                                                ?>

                                                                                            </div>

                                                                                            <div class="col-9 ms-3 my-auto">
                                                                                                <div class="d-flex align-items-center justify-content-between mb-1 text-start">
                                                                                                    <div class="col-6">
                                                                                                        <h6 class="mb-0 fw-bold"><?php echo $user_data["fname"]; ?></h6>
                                                                                                    </div>

                                                                                                    <div class="col-6 text-end">
                                                                                                        <small class="small fw-bold">Date & Time</small>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <div class="row">
                                                                                                    <div class="col-10 offset-3">
                                                                                                        <p class="mb-0">Content</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>

                                                                <?php

                                                                } else {

                                                                ?>

                                                                    <div class="list-group rounded-0" onclick="viewMessages();">
                                                                        <a href="#" class="list-group-item list-group-item-action text-black rounded-3" style="background-color: #CF9FFF;">


                                                                            <?php

                                                                            $user_rs = Shopply::search("SELECT * FROM `user` WHERE `email`='" . $msg_data["from"] . "'");
                                                                            $user_data = $user_rs->fetch_assoc();

                                                                            $img_rs = Shopply::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $msg_data["from"] . "'");
                                                                            $img_data = $img_rs->fetch_assoc();

                                                                            ?>


                                                                            <div class="media">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="row">

                                                                                            <div class="col-2 ms-3 my-auto">

                                                                                                <?php

                                                                                                if (isset($img_data["path"])) {
                                                                                                ?>
                                                                                                    <img src="<?php echo $img_data["path"]; ?>" class="rounded mt-1 my-auto" style="width: 50px;">
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <img src="resources/userprofile.svg" class="rounded mt-1 my-auto" style="width: 50px;">
                                                                                                <?php
                                                                                                }

                                                                                                ?>


                                                                                            </div>

                                                                                            <div class="col-9 ms-3 my-auto">
                                                                                                <div class="d-flex align-items-center justify-content-between mb-1 text-start">
                                                                                                    <div class="col-6">
                                                                                                        <h6 class="mb-0 fw-bold"><?php echo $user_data["fname"]; ?></h6>
                                                                                                    </div>

                                                                                                    <div class="col-6 text-end">
                                                                                                        <small class="small fw-bold">Date & Time</small>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <div class="row">
                                                                                                    <div class="col-10 offset-3">
                                                                                                        <p class="mb-0">Content</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>

                                                            <?php

                                                                }
                                                            }

                                                            ?>

                                                            <!--chatbox-->

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--chatview-->

                                <div class="col-12 col-lg-7 border-start mt-3">
                                    <div class="row">

                                        <!--chatheading-->

                                        <div class="col-12">
                                            <div class="row">

                                                <div class="col-1 ms-3 mt-2 my-auto">
                                                    <img src="resources/userprofile.svg" class="rounded mt-1 my-auto" style="width: 50px;">
                                                </div>

                                                <div class="col-5 ms-2 mt-3">
                                                    <h2 class="mb-0 fw-bold">Nahji Nuzaf</h2>
                                                </div>

                                                <div class="col-5 mt-4 text-end">

                                                    <span><img src="resources/telephone.png" class="me-3" style="height: 23px;" /></span>
                                                    <span><img src="resources/video.png" class="me-3" style="height: 25px;" /></span>
                                                    <span><img src="resources/more.png" class="me-0" style="height: 20px;" /></span>

                                                </div>

                                            </div>
                                            <hr />
                                        </div>

                                        <!--viewmsg-->

                                        <div class="col-12 col-lg-12 px-0">
                                            <div class="row px-4 py-5 text-white chat_box" id="chat_box">

                                                <!-- view area -->


                                            </div>
                                            <!-- txt -->
                                            <div class="col-12 px-2">
                                                <div class="row">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control rounded border-0 py-3 bg-light" placeholder="Type a message ..." aria-describedby="send_btn" id="msg_txt" />
                                                        <button class="btn btn-light fs-2" id="send_btn" onclick="send_msg();"><i class="bi bi-send-fill fs-5"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- txt -->
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>


        </div>
        </div>

        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>

        <script>
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl)
            })
        </script>

    </body>

    </html>
<?php

}
?>