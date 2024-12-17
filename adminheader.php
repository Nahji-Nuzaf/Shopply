<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

</head>

<body>

    <div class="container-fluid" style="height: 65px;">

        <div class="col-12">
            <div class="row header1">

                <div class="col-9 col-lg-2 mt-2 align-self-start ms-2 logo" style="height: 45px;"></div>

                <!--navbar items-->

                <!--largesc-->
                <div class="col-8 align-self-start mx-auto mt-3  navs">
                    <div class="row">
                        <ul class="ull">
                            <li class="lii"><a class="options" href="adminpanel.php">Home</a></li>
                            <li class="lii"><a class="options" href="usersap.php">Users</a></li>
                            <li class="lii"><a class="options" href="ordersap.php">Orders</a></span></li>
                            <li class="lii"><a class="options" href="incomeap.php">Income</a></span></li>
                            <li class="lii"><a class="options" href="addOptions.php">Add Options</a></span></li>
                            <li class="lii"><a class="options" href="reports.php">Reports</a></li>
                        </ul>
                    </div>
                </div>
                <!--largesc-->

                <!--smmdsc-->
                <div class="col-1 navsm">

                    <button class="btn btn-primary ms-5" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                        O<i class="bi bi-list"></i>
                    </button>

                    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Options</h5>
                        </div>
                        <div class="offcanvas-body">
                            <ul>
                                <li class="lii"><a class="options" href="index.php">Home</a></li>
                                <li class="lii"><a class="options" href="usersap.php">Users</a></li>
                                <li class="lii"><a class="options" href="addOptions.php">Add Options</a></span></li>
                                <li class="lii"><a class="options" href="#">Orders</a></span></li>
                                <li class="lii"><a class="options" href="reports.php">Reports</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--smmdsc-->

            </div>

        </div>

    </div>


    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>

    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
</body>

</html>