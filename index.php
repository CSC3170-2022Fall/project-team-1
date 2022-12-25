<!-- backend: create database if not exists -->
<?php
session_start();
if (!array_key_exists("consumer_name", $_SESSION)) {
    $_SESSION['consumer_name'] = null;
}
if (!array_key_exists("plant_name", $_SESSION)) {
    $_SESSION['plant_name'] = null;
}

$mysqli = mysqli_connect("localhost", 'root', '', 'chip_website'); //connect to database
if (!$mysqli) {
    $mysqli = mysqli_connect("localhost", 'root', ''); //connect to DBMS
    $mysqli->query("CREATE DATABASE chip_website"); //create database
    $mysqli->select_db('chip_website'); //select database
    $lines = file("database/initialization.sql"); //create tables by loading the SQL file (Note: the SQL CAN'T can't contain comments)
    $templine = '';
    foreach ($lines as $line) { //loop through each line
        if (substr($line, 0, 2) == '--' || $line == '') {
            continue; //skip it if it's a comment
        }
        $templine .= $line; //add this line to the current segment
        if (substr(trim($line), -1, 1) == ';') { //if it has a semicolon at the end, it's the end of the query
            $mysqli->query($templine);
            $templine = ''; //reset temp variable to empty
        }
    }
}
?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <style>
        #iii {
            background-color: #fff;
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="index.php">ChipLand</a><button
                data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navbarNav"><span
                    class="visually-hidden">Toggle
                    navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="c-appoint.php">Consumer</a></li>
                    <li class="nav-item"><a class="nav-link" href="p-publish.php">Plant Owner</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page lanidng-page">
        <section class="portfolio-block block-intro">
            <div class="container">
                <div class="avatar" style="background-image:url(images/index/robot1.png);"></div>
                <div class="about-me" style="font-size:large;"></div>
                <h1>The bridge between chip owner and producer.
                </h1>
            </div>
            </div>
            <div class="container">
                <div class="about-me">
                    <p>Hi! Welcome to ChipLand! I am your personal assistant CCC.
                        <br>
                        You
                        can appoint <strong>specified plants</strong> to produce chips for you.
                        <br>
                        If you own a plant, hurry up to
                        sign up and <strong>get your orders</strong>.
                        <br>
                    </p>
                    <a class="btn btn-outline-primary" role="button" href="c-appoint.php"
                        style="margin-right: 10px;">I'm a consumer</a>
                    <a class="btn btn-outline-primary" role="button" href="p-publish.php" style="margin-left: 10px;">I'm
                        a plant owner</a>
                </div>
            </div>
        </section>
        <section class="portfolio-block photography">
            <div class="container">
                <div class="row g-0">
                    <div class="col-md-5 col-lg-4 item zoom-on-hover"><a href="chip-model-info.php"><img
                                class="img-fluid image" src="images/index//i5.jpg"></a></div>
                    <div class="col-md-5 col-lg-4 item zoom-on-hover"><a href="chip-model-info.php"><img
                                class="img-fluid image" src="images/index//i7.jpg"></a></div>
                    <div class="col-md-5 col-lg-4 item zoom-on-hover" id="iii""><a href=" chip-model-info.php">
                        <img class="img-fluid image" src="images/index//i9.jpg"></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="portfolio-block call-to-action border-bottom">
            <div class="container">
                <div class="d-flex justify-content-center align-items-center content">
                </div>
            </div>
        </section>
        <section class="portfolio-block skills">
            <div class="container">
                <div class="heading">
                    <h2>Special Skills</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card special-skill-item border-0">
                            <div class="card-header bg-transparent border-0"><i class="icon ion-ios-star-outline"></i>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">ALL FREE!</h3>
                                <p class="card-text">All the resources including plants information and consumer posts
                                    are available for free.
                                    You can easily get what you need by using ChipLand.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card special-skill-item border-0">
                            <div class="card-header bg-transparent border-0"><i
                                    class="icon ion-ios-lightbulb-outline"></i></div>
                            <div class="card-body">
                                <h3 class="card-title">DIAPLAY IN VISUAL DIAGRAM!</h3>
                                <p class="card-text">You can check the plants information, machine and operation types,
                                    expense all in
                                    dynamic visual diagrams. It is more convenient and this may help you decide.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card special-skill-item border-0">
                            <div class="card-header bg-transparent border-0"><i class="icon ion-ios-gear-outline"></i>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">REAL-TIME MONITORING!</h3>
                                <p class="card-text">The processing records are available both for consumers and owners
                                    of plants.
                                    You can monitor the process of an order after login. If you have any questions about
                                    the processing
                                    record you can contact the consumer/owner of plants at once.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <section class="portfolio-block website gradient">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-5 offset-lg-1 text">
                    <h3>Contact Us</h3>
                    <p>
                        Contact us directly if you have any suggestions
                        about our website.<br>
                        Phone directory: 0755-88886666<br>
                        Email: 120090000@link.cuhk.edu.cn<br>
                        Address: The Chinese University of Hong Kong, Shenzhen, China
                    </p>
                </div>
                <div class="col-md-12 col-lg-5">
                    <div class="portfolio-laptop-mockup">
                        <div class="screen">
                            <div class="screen-content"
                                style="background-image:url(&quot;images/tech/image6.png&quot;);"></div>
                        </div>
                        <div class="keyboard"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="page-footer">
        <div class="container">
            <span>// No product or component can be absolutely secure.
                // Your costs and results may vary.
                // See our complete legal Notices and Disclaimers.
                // ChipLand is committed to respecting human rights and
                avoiding complicity in human rights abuses.
                See ChipLand's Global Human Rights Principles.
                ChipLand's products and software are intended only to be
                used in applications that do not cause or contribute to a
                violation of an internationally recognized human right.Copyright @ 2022</span><br>
        </div>
    </footer>
    <script src="assets/bootstrap/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
