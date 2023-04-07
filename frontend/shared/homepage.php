<?php
session_start();

$client = "consumer";

if ($requiring_file_name == "c-appoint.php") {
    $title = "Consumer Appoint";
    $required_file_name = "frontend/single/c-appoint-table.php";
} elseif ($requiring_file_name == "c-plant-info.php") {
    $title = "Plant Information";
    $required_file_name = "frontend/shared/plant-info-table.php";
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
} elseif ($requiring_file_name == "p-plant-info.php") {
    $client = "plant";
    $title = "Plant Information";
    $required_file_name = "frontend/shared/plant-info-table.php";
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
    if ($_SESSION['consumer_name']) {
        $_SESSION['plant_name'] = null;
        $consumer_name = $_SESSION['consumer_name'];
    } else {
        echo '<script>window.location.assign("c-signin.php");</script>';
    }
} elseif ($client == "plant") {
    if ($_SESSION['plant_name']) {
        $_SESSION['consumer_name'] = null;
        $plant_name = $_SESSION['plant_name'];
    } else {
        echo '<script>window.location.assign("p-signin.php");</script>';
    }
} else {
    echo '<script>window.location.assign("index.php");</script>';
}

$mysqli = mysqli_connect("localhost", 'root', '', "chip_website");
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> <?php echo "$title"; ?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">

    <!-- DataTables -->
    <link href="assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    </link>
    <link href="assets/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    </link>
    <!-- Responsive datatable examples -->
    <link href="assets/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    </link>
    <!-- Responsive Table css -->
    <link href="assets/css/rwd-table.min.css" rel="stylesheet" type="text/css">
    </link>

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    </link>
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    </link>
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
    </link>
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
                        <div>ChipLand</div>
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
                        } else {
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
                                        <a href="p-plant-info.php" class="waves-effect">
                                            <i class="mdi mdi-clipboard-outline"></i>
                                            <span>Plant Information</span>
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
                                <?php
                                if ($client == "consumer") {
                                    $name = $_SESSION['consumer_name'];
                                } else {
                                    $name = $_SESSION['plant_name'];
                                }
                                ?>
                                <h2>Hello, <?php echo "$name" ?>! <!--Displays plant's name--></h2>
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
</body>
<!-- JAVASCRIPT -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/simplebar.min.js"></script>
<script src="assets/js/waves.min.js"></script>
<script src="assets/js/jquery.sparkline.min.js"></script>

<!-- Required datatable js -->
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/js/dataTables.buttons.min.js"></script>
<script src="assets/js/buttons.bootstrap4.min.js"></script>
<script src="assets/js/jszip.min.js"></script>
<script src="assets/js/pdfmake.min.js"></script>
<script src="assets/js/vfs_fonts.js"></script>
<script src="assets/js/buttons.html5.min.js"></script>
<script src="assets/js/buttons.print.min.js"></script>
<script src="assets/js/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="assets/js/dataTables.responsive.min.js"></script>
<script src="assets/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/datatables.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

<!-- Responsive Table js -->
<script src="assets/js/rwd-table.min.js"></script>

<!-- Init js (but led to a publish feasibility bug) -->
<script src="assets/js/table-responsive.init.js"></script>

</html>