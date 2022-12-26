<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Form Elements | Lexa - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">

    <style>
        .mainm {
            background-color: transparent;
            width: 100%;
            height: 60px;
        }

        #ccc {
            float: left;
        }

        #topp {
            height: auto;
        }
    </style>

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

            <div class="navbar-header" id="topp">

                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box" id="ccc">

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

                    <!--Back to index-->
                </div class="Back to index" href="index.php">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <a href="index.php">
                        <h4>Back to Index</h4>
                    </a>
                </button>
            </div>

    </div>
    </div>

    </header>

    <!-- ========== Left Sidebar Start ========== -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="mainm"></div>
    <div>

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="page-title-box">
                            <h4>Chip Model Information</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">

                    <div class="col-xl-4 col-md-6">
                        <div class="card directory-card">
                            <div>
                                <div class="directory-bg text-center">
                                    <div class="directory-overlay">
                                        <img class="rounded-circle avatar-lg img-thumbnail" src="images/index/i5.jpg"
                                            alt="Generic placeholder image">
                                    </div>
                                </div>

                                <div class="directory-content text-center p-4">
                                    <p class=" mt-4">Chip</p>
                                    <h5 class="font-size-16">i5</h5>
                                    <p class="text-muted">I5 is a mid tier product. It has no problem playing most
                                        games, and its basic functions are fully adequate.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-4 col-md-6">
                        <div class="card directory-card">
                            <div>
                                <div class="directory-bg text-center">
                                    <div class="directory-overlay">
                                        <img class="rounded-circle avatar-lg img-thumbnail" src="images/index/i7.jpg"
                                            alt="Generic placeholder image">
                                    </div>
                                </div>

                                <div class="directory-content text-center p-4">
                                    <p class=" mt-4">Chip</p>
                                    <h5 class="font-size-16">i7</h5>
                                    <p class="text-muted">The i7 is a high-end product. There is basically no problem in
                                        playing games with the i7. Most product software will not be stuck when used.
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-4 col-md-6">
                        <div class="card directory-card">
                            <div>
                                <div class="directory-bg text-center">
                                    <div class="directory-overlay">
                                        <img class="rounded-circle avatar-lg img-thumbnail" src="images/index/i9.jpg"
                                            alt="Generic placeholder image">
                                    </div>
                                </div>

                                <div class="directory-content text-center p-4">
                                    <p class=" mt-4">Chip</p>
                                    <h5 class="font-size-16">i9</h5>
                                    <p class="text-muted">I9 is a top product. For example, heavy modeling or 4K video
                                        editing lead to insufficient productivity.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
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

            <!-- Settings -->
            <hr class="mt-0">
            <h6 class="text-center mb-0">Choose Layouts</h6>

            <div class="p-4">
                <div class="mb-2">
                    <img src="static/picture/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked="">
                    <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="static/picture/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch"
                        data-bsstyle="assets/css/bootstrap-dark.min.css" data-appstyle="assets/css/app-dark.min.css">
                    <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="static/picture/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="form-check form-switch mb-5">
                    <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch"
                        data-appstyle="assets/css/app-rtl.min.css">
                    <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                </div>


            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="static/js/jquery.min.js"></script>
    <script src="static/js/bootstrap.bundle.min.js"></script>
    <script src="static/js/metisMenu.min.js"></script>
    <script src="static/js/simplebar.min.js"></script>
    <script src="static/js/waves.min.js"></script>
    <script src="static/js/jquery.sparkline.min.js"></script>

    <!-- App js -->
    <script src="static/js/app.js"></script>
</body>

</html>