<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>Form Elements | Lexa - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
		<style>
		</style>
        
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">

    </head>

    <?php
		session_start(); 
		if (!$_SESSION['consumer_name']) print '<script>window.location.assign("consumer-login.php");</script>';
		$consumer_name = $_SESSION['consumer_name'];
		$mysqli = new mysqli("localhost", 'root', '', 'chip_website');
    ?>

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

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
                            <i class="mdi mdi-menu"></i>
                        </button>
                        <!--
                        <div class="d-none d-sm-block">
                            <div class="dropdown dropdown-topbar pt-3 mt-1 d-inline-block">
                                <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Create <i class="mdi mdi-chevron-down"></i>
                                    </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div>-->
                    </div>

                    <div class="d-flex">

                        <!-- App Search--><!--
                        <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="fa fa-search"></span>
                            </div>
                        </form>

                        <div class="dropdown d-inline-block d-lg-none ml-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-search-dropdown">
                    
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>-->


                        
                        <!--
                        <div class="dropdown d-none d-lg-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen font-size-24"></i>
                            </button>
                        </div>
                        <div class="dropdown d-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-bell"></i>
                                <span class="badge bg-danger rounded-pill">3</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="m-0"> Notifications (258) </h5>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar="" style="max-height: 230px;">
                                    <a href="" class="text-reset notification-item">
                                        <div class="media">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title border-success rounded-circle ">
                                                    <i class="mdi mdi-cart-outline"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1">Your order is placed</h6>
                                                <div class="text-muted">
                                                    <p class="mb-1">If several languages coalesce the grammar</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="" class="text-reset notification-item">
                                        <div class="media">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title border-warning rounded-circle ">
                                                    <i class="mdi mdi-message"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1">New Message received</h6>
                                                <div class="text-muted">
                                                    <p class="mb-1">You have 87 unread messages</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="" class="text-reset notification-item">
                                        <div class="media">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title border-info rounded-circle ">
                                                    <i class="mdi mdi-glass-cocktail"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1">Your item is shipped</h6>
                                                <div class="text-muted">
                                                    <p class="mb-1">It is a long established fact that a reader will</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="" class="text-reset notification-item">
                                        <div class="media">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title border-primary rounded-circle ">
                                                    <i class="mdi mdi-cart-outline"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1">Your order is placed</h6>
                                                <div class="text-muted">
                                                    <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="" class="text-reset notification-item">
                                        <div class="media">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title border-warning rounded-circle ">
                                                    <i class="mdi mdi-message"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1">New Message received</h6>
                                                <div class="text-muted">
                                                    <p class="mb-1">You have 87 unread messages</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2 border-top">
                                    <a class="btn btn-sm btn-link font-size-14 w-100 text-center" href="javascript:void(0)">
                                        View all
                                    </a>
                                </div>
                            </div>
                        </div>-->
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/picture/user-4.jpg" alt="Header Avatar">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="index.php"><i class="mdi mdi-power font-size-17 text-muted align-middle me-1 text-danger"></i> Logout</a>
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

                            <!--<li class="menu-title">Main</li>-->

                            <li>
                                <a href="consumer-appoint.php" class="waves-effect">
                                    <i class="mdi mdi-clipboard-outline"></i>
                                    <span>Appoint</span>
                                </a>
                                <!--<ul class="sub-menu" aria-expanded="false">
                                    <li><a href="">Appointment</a></li>
                                </ul>-->
                            </li>
                            <li>
                                <a href="processing-records.php" class="waves-effect">
                                    <i class="mdi mdi-clipboard-outline"></i>
                                    <span>Processing Record</span>
                                </a>
                                <!--<ul class="sub-menu" aria-expanded="false">
                                    <li><a href="">Appointment</a></li>
                                </ul>-->
                            </li>
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
                                    <h2>Hello <?php Print "$consumer_name"?>! <!--Displays plant's name--></h2>
                                        <!--<ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Chip Land</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Appoint</a></li>
                                            <li class="breadcrumb-item active">Appointment</li>
                                        </ol>-->
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!-- form layouts -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
										<h4 class="card-title">Write down the specific information here based on your requirement.</h4>
                                        <p class="card-title-desc">You can refer to plant information.</p>

                                        <div class="row">
											<div class="col-lg-3"></div>
                                            <div class="col-lg-6">
                                                <div class="mt-4" >
                                                    <!-- form start -->
                                                    <?php include "consumer-appoint-form-included.php" ?>
                                                </div>
                                            </div>
                                        </div>

										
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





<!-- backend: insert new records into processing records -->
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$time_budget = $mysqli->real_escape_string($_POST['time_budget']);
		$expense_budget = $mysqli->real_escape_string($_POST['expense_budget']);
		$num_i5 = $mysqli->real_escape_string($_POST['num_i5']);
		$num_i7 = $mysqli->real_escape_string($_POST['num_i7']);
		$num_i9 = $mysqli->real_escape_string($_POST['num_i9']);
        
        $plants = array();
        for ($i = 1; $i <= 15; $i++) array_push($plants, $mysqli->real_escape_string($_POST["$i"]));

        $query = $mysqli->query("SELECT `package_ID` FROM Packages ORDER BY `package_ID` DESC");
        $max_package_ID_row = mysqli_fetch_array($query);
        $new_package_ID = 1;
        if ($max_package_ID_row) $new_package_ID = $max_package_ID_row['package_ID'] + 1;

        $mysqli->query("INSERT INTO Packages (`package_ID`, `time_budget`, `expense_budget`, `consumer_name`) VALUES ('$new_package_ID', '$time_budget', '$expense_budget', '$consumer_name')"); 

        for ($chip_ID = 1; $chip_ID <= $num_i5; $chip_ID++) {
            $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('design-import', '$chip_ID', '$new_package_ID', '$plants[0]', 'i5')");
            $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('etch', '$chip_ID', '$new_package_ID', '$plants[1]', 'i5')");
            $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('bond', '$chip_ID', '$new_package_ID', '$plants[2]', 'i5')");
            $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('drill', '$chip_ID', '$new_package_ID', '$plants[3]', 'i5')");
            $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('test', '$chip_ID', '$new_package_ID', '$plants[4]', 'i5')");
        }
        for ($chip_ID = $num_i5 + 1; $chip_ID <= $num_i5 + $num_i7; $chip_ID++) {
            $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('design-import', '$chip_ID', '$new_package_ID', '$plants[5]', 'i7')");
            $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('etch', '$chip_ID', '$new_package_ID', '$plants[6]', 'i7')");
            $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('bond', '$chip_ID', '$new_package_ID', '$plants[7]', 'i7')");
            $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('drill', '$chip_ID', '$new_package_ID', '$plants[8]', 'i7')");
            $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('test', '$chip_ID', '$new_package_ID', '$plants[9]', 'i7')");
        }
        for ($chip_ID = $num_i5 + $num_i7 + 1; $chip_ID <= $num_i5 + $num_i7 + $num_i9; $chip_ID++) {
            $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('design-import', '$chip_ID', '$new_package_ID', '$plants[10]', 'i9')");
            $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('etch', '$chip_ID', '$new_package_ID', '$plants[11]', 'i9')");
            $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('bond', '$chip_ID', '$new_package_ID', '$plants[12]', 'i9')");
            $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('drill', '$chip_ID', '$new_package_ID', '$plants[13]', 'i9')");
            $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('test', '$chip_ID', '$new_package_ID', '$plants[14]', 'i9')");
        }
        Print '<script>alert("Successfully appointed!");</script>';
        Print '<script>window.location.assign("consumer-appoint.php");</script>';
	}
?>

