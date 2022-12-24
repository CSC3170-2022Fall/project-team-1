<?php
$client = "consumer";

if ($requiring_file_name == "c-appoint.php") {
    $title = "Consumer Appoint";
    $required_file_name = "frontend/single/c-appoint-table.php";
} elseif ($requiring_file_name == "c-plant-info.php") {
    $title = "Plant Information";
    $required_file_name = "frontend/single/c-plant-info-table.php";
} elseif ($requiring_file_name == "c-pro-records.php") {
    $title = "Consumer Processing Records";
    $required_file_name = "frontend/shared/pro-records-chart.php";
} elseif ($requiring_file_name == "c-pro-info.php") {
    $title = "Consumer Processing Information";
    $required_file_name = "frontend/single/c-pro-info-table.php";
} elseif ($requiring_file_name == "p-publish.php") {
    $client = "plant";
    $title = "Plant Publish";
    $required_file_name = "frontend/single/p-publish-table.php";
} elseif ($requiring_file_name == "p-accept.php") {
    $client = "plant";
    $title = "Plant Accept";
    $required_file_name = "frontend/single/p-accept-table.php";
} elseif ($requiring_file_name == "p-pro-records.php") {
    $client = "plant";
    $title = "Plant Processing Records";
    $required_file_name = "frontend/shared/pro-records-chart.php";
} elseif ($requiring_file_name == "p-pro-info.php") {
    $client = "plant";
    $title = "Plant Processing Information";
    $required_file_name = "frontend/single/p-pro-info-table.php";
}

if ($client == "consumer") {
    session_start();
    if (!$_SESSION['consumer_name']) {
        echo '<script>window.location.assign("c-signin.php");</script>';
    }
    $_SESSION['plant_name'] = null;
    $name = $_SESSION['consumer_name'];
} elseif ($client == "plant") {
    session_start();
    if (!$_SESSION['plant_name']) {
        echo '<script>window.location.assign("p-signin.php");</script>';
    }
    $_SESSION['consumer_name'] = null;
    $name = $_SESSION['plant_name'];
}

$mysqli = new mysqli("localhost", 'root', '', "chip_website");
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> <?php echo "$title"; ?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
</head>



<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">

                        <a href="index.php" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="images/index/robot1.png" alt="" height="45">
                            </span>
                            <span class="logo-lg">
                                <img src="images/index/robot1.png" alt="" height="35">
                            </span>
                        </a>
                        <div>Chip Land</div>
                    </div>

                    <button type="button"
                        class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>

                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="assets/picture/user-4.jpg"
                                alt="Header Avatar">
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="signout.php"><i
                                    class="mdi mdi-power font-size-17 text-muted align-middle me-1 text-danger"></i>
                                Sign out</a>
                        </div>
                    </div>


                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="mdi mdi-spin mdi-cog"></i>
                        </button>
                    </div>


                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar="" class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">

                        <?php
                        if ($client == "consumer") {
                            echo '
                                    <li>
                                        <a href="c-appoint.php" class="waves-effect">
                                            <i class="mdi mdi-clipboard-outline"></i>
                                            <span>Appoint</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="c-plant-info.php" class="waves-effect">
                                            <i class="mdi mdi-clipboard-outline"></i>
                                            <span>Plant Information</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="c-pro-records.php" class="waves-effect">
                                            <i class="mdi mdi-clipboard-outline"></i>
                                            <span>Processing Records</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="c-pro-info.php" class="waves-effect">
                                            <i class="mdi mdi-clipboard-outline"></i>
                                            <span>Processing Information</span>
                                        </a>
                                    </li>
                                ';
                        } elseif ($client == "plant") {
                            echo '
                                    <li>
                                        <a href="p-publish.php" class="waves-effect">
                                            <i class="mdi mdi-clipboard-outline"></i>
                                            <span>Publish</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="p-accept.php" class="waves-effect">
                                            <i class="mdi mdi-clipboard-outline"></i>
                                            <span>Accept</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="p-pro-records.php" class="waves-effect">
                                            <i class="mdi mdi-clipboard-outline"></i>
                                            <span>Processing Records</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="p-pro-info.php" class="waves-effect">
                                            <i class="mdi mdi-clipboard-outline"></i>
                                            <span>Processing Information</span>
                                        </a>
                                    </li>
                                ';
                        }
                        ?>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="page-title-box">
                                <h2>Hello <?php echo "$name" ?>! <!--Displays plant's name--></h2>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!-- form layouts -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- form start -->
                                        <?php require_once "$required_file_name"; ?>
                                    </div>
                                </div>
                                <!-- containing single select -->

                            </div>
                        </div>
                        <!-- End Form Layout -->


                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                <!-- originally footer -->
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar="" class="h-100">

                <div class="rightbar-title d-flex align-items-center px-3 py-4">

                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>


            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/js/js/jquery.min.js"></script>
        <script src="assets/js/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/js/metisMenu.min.js"></script>
        <script src="assets/js/js/simplebar.min.js"></script>
        <script src="assets/js/js/waves.min.js"></script>
        <script src="assets/js/js/jquery.sparkline.min.js"></script>

        <!-- App js -->
        <script src="assets/js/js/app.js"></script>
</body>

</html>