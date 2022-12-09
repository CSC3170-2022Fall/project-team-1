<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>My test page</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link href="styles/style.css" rel="stylesheet" type="text/css">
    <link href="styles/index.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <!-- header start -->
    <div class="header">
      <div class="header_c inner_c">
        <!-- logo -->
        <h1>logo</h1>
        <!-- all product -->
        <div class="all">

          <!-- triangle -->
          <a href="#">look at all<span></span></a>
          <!-- 下拉栏 -->
          <div class="product">
            <div class="pro_inner inner_c">
              <ul class="inner_nav">
                <li><a href="#">111</a></li>
                <li><a href="#">222</a></li>
                <li><a href="#">333</a></li>
                <li><a href="#">444</a></li>
                <li><a href="#">555</a></li>
              </ul>
              <ul class="inner_detail">
                <li></li>
                <li></li>
                <li></li>
              </ul>
            </div>
          </div>

        </div>
      
        <!-- nav in header  -->
        <div class="header_nav">
          <!-- 4 functions in header -->
          <ul>
            <li><a href="#">home page</a></li>
            <li><a href="#">function 1</a></li>
            <li><a href="#">function 2</a></li>
            <li><a href="#">function 3</a></li>
            
            <!-- search in header -->
            <div class="search"></div>

            <!-- login & register -->
            <div class="login">
              <a href="#">login</a>
              <span>|</span>
              <a href="#">register</a>
              <a href="#" class="shopping_car">0</a>
            </div>
          </ul>

        </div>
      </div>
    </div>
    <!-- header finish -->

    <!-- banner start -->
    <div class="banner">
      <ul>
        <li></li>
      </ul>
    </div>
    <!-- banner finish -->






    <?php
      //connect to DBMS      
      $mysqli = new mysqli("localhost", 'root', '');
      if($mysqli->connect_errno ) { 
        printf("Connect failed: %s<br />", $mysqli->connect_error);
        exit();
      }
      //create database
      if ($mysqli->query("CREATE DATABASE chip_website")) {
        printf("Database chip_website created successfully.<br />");
      }
      if ($mysqli->errno) {
        printf("Could not create database: %s<br />", $mysqli->error);
      }
      //select database
      $mysqli->select_db('chip_website');

      //create tabels by loading the SQL file (note: this CAN'T work on SQL comments)
      $filename = "sql/initialization.sql";
      // Temporary variable, used to store current query
      $templine = '';
      // Read in entire file
      $lines = file($filename);
      // Loop through each line
      foreach ($lines as $line) {
        // Skip it if it's a comment
        if (substr($line, 0, 2) == '--' || $line == '')
          continue;
        // Add this line to the current segment
        $templine .= $line;
        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';') {
          // Perform the query
          $mysqli->query($templine);
          // Reset temp variable to empty
          $templine = '';
        }
      }
      echo "Table created successfully";
    ?>
  </body>
</html>
