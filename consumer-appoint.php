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
		session_start(); //starts the session
		if (!$_SESSION['consumer']) { //checks if consumer is logged in
			header("location:index.php"); // redirects if consumer is not logged in
		}
		$consumer = $_SESSION['consumer']; //assigns consumer value
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


                        
                        
                        <div class="dropdown d-none d-lg-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen font-size-24"></i>
                            </button>
                        </div>
                        <!--
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
                                <a href="#" class="waves-effect">
                                    <i class="mdi mdi-clipboard-outline"></i>
                                    <span>Appoint</span>
                                </a>
                                <!--<ul class="sub-menu" aria-expanded="false">
                                    <li><a href="">Appointment</a></li>
                                </ul>-->
                            </li>
                            <li>
                                <a href="#" class="waves-effect">
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
                                    <h2>Hello <?php Print "$consumer"?>! <!--Displays plant's name--></h2>
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
                                                    <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Appoint form</h5>
                                                    <!-- form start -->
                                                    <form action="consumer-appoint.php" method="post">
                                                        <div class="row mb-4">
                                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">package ID</label>
                                                            <div class="col-sm-9">
                                                              <input type="text" class="form-control" id="horizontal-firstname-input" name="package_ID" required="required"/>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">time budget</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="horizontal-firstname-input" name="time_budget" required="required"/>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">expense budget</label>
                                                            <div class="col-sm-9">
                                                              <input type="text" class="form-control" id="horizontal-firstname-input" name="expense_budget" required="required"/>
                                                            </div>
                                                        </div>
														<div class="row mb-4">
                                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">numer of chip model i5</label>
                                                            <div class="col-sm-9">
                                                              <input type="text" class="form-control" id="horizontal-firstname-input" name="num_i5" required="required"/>
                                                            </div>
                                                        </div>
														<div class="row mb-4">
                                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">numer of chip model i7</label>
                                                            <div class="col-sm-9">
                                                              <input type="text" class="form-control" id="horizontal-firstname-input" name="num_i7" required="required"/>
                                                            </div>
                                                        </div>
														<div class="row mb-4">
                                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">numer of chip model i9</label>
                                                            <div class="col-sm-9">
                                                              <input type="text" class="form-control" id="horizontal-firstname-input" name="num_i9" required="required"/>
                                                            </div>
                                                        </div>
                                                    
                                                    <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Choose plants.</h5>
                                                    <!-- form start -->
                                                    
                                                        <!--i5-->
                                                        <div class="mb-3">
                                                        <label class="form-label">design_import_plant_i5</label>
                                                        <select name="design_import_plant_i5" class="form-control" required="required">
                                                            <?php 
                                                                $sql = $mysqli->query("SELECT plant_name FROM Plants");
                                                                while ($row = mysqli_fetch_array($sql)){
                                                                    echo "<option>" . $row['plant_name'] . "</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                        <label class="form-label">etch_plant_i5</label>
                                                        <select name="etch_plant_i5" class="form-control select2" required="required">
                                                            <?php 
                                                                $sql = $mysqli->query("SELECT plant_name FROM Plants");
                                                                while ($row = mysqli_fetch_array($sql)){
                                                                    echo "<option>" . $row['plant_name'] . "</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                        <label class="form-label">bond_plant_i5</label>
                                                        <select name="bond_plant_i5" class="form-control select2" required="required">
                                                            <?php 
                                                                $sql = $mysqli->query("SELECT plant_name FROM Plants");
                                                                while ($row = mysqli_fetch_array($sql)){
                                                                    echo "<option>" . $row['plant_name'] . "</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                        <label class="form-label">drill_plant_i5</label>
                                                        <select name="drill_plant_i5" class="form-control select2" required="required">
                                                            <?php 
                                                                $sql = $mysqli->query("SELECT plant_name FROM Plants");
                                                                while ($row = mysqli_fetch_array($sql)){
                                                                    echo "<option>" . $row['plant_name'] . "</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                        <label class="form-label">test_plant_i5</label>
                                                        <select name="test_plant_i5" class="form-control select2" required="required">
                                                            <?php 
                                                                $sql = $mysqli->query("SELECT plant_name FROM Plants");
                                                                while ($row = mysqli_fetch_array($sql)){
                                                                    echo "<option>" . $row['plant_name'] . "</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                        <!--i7-->
                                                        <div class="mb-3">
                                                        <label class="form-label">design_import_plant_i7</label>
                                                        <select name="design_import_plant_i7" class="form-control" required="required">
                                                            <?php 
                                                                $sql = $mysqli->query("SELECT plant_name FROM Plants");
                                                                while ($row = mysqli_fetch_array($sql)){
                                                                    echo "<option>" . $row['plant_name'] . "</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                        <label class="form-label">etch_plant_i7</label>
                                                        <select name="etch_plant_i7" class="form-control select2" required="required">
                                                            <?php 
                                                                $sql = $mysqli->query("SELECT plant_name FROM Plants");
                                                                while ($row = mysqli_fetch_array($sql)){
                                                                    echo "<option>" . $row['plant_name'] . "</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                        <label class="form-label">bond_plant_i7</label>
                                                        <select name="bond_plant_i7" class="form-control select2" required="required">
                                                            <?php 
                                                                $sql = $mysqli->query("SELECT plant_name FROM Plants");
                                                                while ($row = mysqli_fetch_array($sql)){
                                                                    echo "<option>" . $row['plant_name'] . "</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                        <label class="form-label">drill_plant_i7</label>
                                                        <select name="drill_plant_i7" class="form-control select2" required="required">
                                                            <?php 
                                                                $sql = $mysqli->query("SELECT plant_name FROM Plants");
                                                                while ($row = mysqli_fetch_array($sql)){
                                                                    echo "<option>" . $row['plant_name'] . "</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                        <label class="form-label">test_plant_i7</label>
                                                        <select name="test_plant_i7" class="form-control select2" required="required">
                                                            <?php 
                                                                $sql = $mysqli->query("SELECT plant_name FROM Plants");
                                                                while ($row = mysqli_fetch_array($sql)){
                                                                    echo "<option>" . $row['plant_name'] . "</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                        <!--i9-->
                                                        <div class="mb-3">
                                                        <label class="form-label">design_import_plant_i9</label>
                                                        <select name="design_import_plant_i9" class="form-control" required="required">
                                                            <?php 
                                                                $sql = $mysqli->query("SELECT plant_name FROM Plants");
                                                                while ($row = mysqli_fetch_array($sql)){
                                                                    echo "<option>" . $row['plant_name'] . "</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                        <label class="form-label">etch_plant_i9</label>
                                                        <select name="etch_plant_i9" class="form-control select2" required="required">
                                                            <?php 
                                                                $sql = $mysqli->query("SELECT plant_name FROM Plants");
                                                                while ($row = mysqli_fetch_array($sql)){
                                                                    echo "<option>" . $row['plant_name'] . "</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                        <label class="form-label">bond_plant_i9</label>
                                                        <select name="bond_plant_i9" class="form-control select2" required="required">
                                                            <?php 
                                                                $sql = $mysqli->query("SELECT plant_name FROM Plants");
                                                                while ($row = mysqli_fetch_array($sql)){
                                                                    echo "<option>" . $row['plant_name'] . "</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                        <label class="form-label">drill_plant_i9</label>
                                                        <select name="drill_plant_i9" class="form-control select2" required="required">
                                                            <?php 
                                                                $sql = $mysqli->query("SELECT plant_name FROM Plants");
                                                                while ($row = mysqli_fetch_array($sql)){
                                                                    echo "<option>" . $row['plant_name'] . "</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                        <label class="form-label">test_plant_i9</label>
                                                        <select name="test_plant_i9" class="form-control select2" required="required">
                                                            <?php 
                                                                $sql = $mysqli->query("SELECT plant_name FROM Plants");
                                                                while ($row = mysqli_fetch_array($sql)){
                                                                    echo "<option>" . $row['plant_name'] . "</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                        <div class="row"> </div><br/>
                                                        <div>
                                                            <button type="submit" class="btn btn-primary w-md">Submit My Appointment</button>
                                                        </div>
                                                    </form>
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

		<?php include "consumer-appoint-include-form.php" ?>
    </body>

</html>

</html>


<!-- backend: insert new records into processing records -->
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$package_ID = $mysqli->real_escape_string($_POST['package_ID']);
		$time_budget = $mysqli->real_escape_string($_POST['time_budget']);
		$expense_budget = $mysqli->real_escape_string($_POST['expense_budget']);
		$num_i5 = $mysqli->real_escape_string($_POST['num_i5']);
		$num_i7 = $mysqli->real_escape_string($_POST['num_i7']);
		$num_i9 = $mysqli->real_escape_string($_POST['num_i9']);

		$design_import_plant_i5 = $mysqli->real_escape_string($_POST['design_import_plant_i5']);
		$etch_plant_i5 = $mysqli->real_escape_string($_POST['etch_plant_i5']);
		$bond_plant_i5 = $mysqli->real_escape_string($_POST['bond_plant_i5']);
		$drill_plant_i5 = $mysqli->real_escape_string($_POST['drill_plant_i5']);
		$test_plant_i5 = $mysqli->real_escape_string($_POST['test_plant_i5']);
		$design_import_plant_i7 = $mysqli->real_escape_string($_POST['design_import_plant_i7']);
		$etch_plant_i7 = $mysqli->real_escape_string($_POST['etch_plant_i7']);
		$bond_plant_i7 = $mysqli->real_escape_string($_POST['bond_plant_i7']);
		$drill_plant_i7 = $mysqli->real_escape_string($_POST['drill_plant_i7']);
		$test_plant_i7 = $mysqli->real_escape_string($_POST['test_plant_i7']);
		$design_import_plant_i9 = $mysqli->real_escape_string($_POST['design_import_plant_i9']);
		$etch_plant_i9 = $mysqli->real_escape_string($_POST['etch_plant_i9']);
		$bond_plant_i9 = $mysqli->real_escape_string($_POST['bond_plant_i9']);
		$drill_plant_i9 = $mysqli->real_escape_string($_POST['drill_plant_i9']);
		$test_plant_i9 = $mysqli->real_escape_string($_POST['test_plant_i9']);

		$package_ID_not_existing = true;
		$query = $mysqli->query("SELECT package_ID from Packages");
		while ($package_ID_row = mysqli_fetch_array($query)) {
			if ($package_ID == $package_ID_row['package_ID']) {
				$package_ID_not_existing = false; 
				Print '<script>alert("package_ID has been taken!");</script>';
				Print '<script>window.location.assign("consumer-appoint.php");</script>';
			}
		}

		if ($package_ID_not_existing) {
			$mysqli->query("INSERT INTO Packages (`package_ID`, `time_budget`, `expense_budget`, `consumer_name`) VALUES ('$package_ID', '$time_budget', '$expense_budget', '$consumer')"); 

			for ($chip_ID = 1; $chip_ID <= $num_i5; $chip_ID++) {
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('design-import', '$chip_ID', '$package_ID', '$design_import_plant_i5', 'i5')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('etch', '$chip_ID', '$package_ID', '$etch_plant_i5', 'i5')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('bond', '$chip_ID', '$package_ID', '$bond_plant_i5', 'i5')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('drill', '$chip_ID', '$package_ID', '$drill_plant_i5', 'i5')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('test', '$chip_ID', '$package_ID', '$test_plant_i5', 'i5')");
			}
			for ($chip_ID = $num_i5 + 1; $chip_ID <= $num_i5 + $num_i7; $chip_ID++) {
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('design-import', '$chip_ID', '$package_ID', '$design_import_plant_i7', 'i7')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('etch', '$chip_ID', '$package_ID', '$etch_plant_i7', 'i7')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('bond', '$chip_ID', '$package_ID', '$bond_plant_i7', 'i7')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('drill', '$chip_ID', '$package_ID', '$drill_plant_i7', 'i7')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('test', '$chip_ID', '$package_ID', '$test_plant_i7', 'i7')");
			}
			for ($chip_ID = $num_i5 + $num_i7 + 1; $chip_ID <= $num_i5 + $num_i7 + $num_i9; $chip_ID++) {
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('design-import', '$chip_ID', '$package_ID', '$design_import_plant_i9', 'i9')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('etch', '$chip_ID', '$package_ID', '$etch_plant_i9', 'i9')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('bond', '$chip_ID', '$package_ID', '$bond_plant_i9', 'i9')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('drill', '$chip_ID', '$package_ID', '$drill_plant_i9', 'i9')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('test', '$chip_ID', '$package_ID', '$test_plant_i9', 'i9')");
			}

			Print '<script>alert("Successfully appointed!");</script>';
			Print '<script>window.location.assign("consumer-appoint.php");</script>';
		}
	}
?>

