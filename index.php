<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>My test page</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link href="styles/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <h1>Mozilla is cool</h1>
    <img src="images/firefox-icon.png" alt="The Firefox logo: a flaming fox surrounding the Earth.">

    <p>At Mozilla, we’re a global community of</p>

    <ul> <!-- changed to list in the tutorial -->
      <li>technologists</li>
      <li>thinkers</li>
      <li>builders</li>
    </ul>

    <p>working together to keep the Internet alive and accessible, so people worldwide can be informed contributors and creators of the Web. We believe this act of human collaboration across an open platform is essential to individual growth and our collective future.</p>

    <p>Read the <a href="https://www.mozilla.org/en-US/about/manifesto/">Mozilla Manifesto</a> to learn even more about the values and principles that guide the pursuit of our mission.</p>

    <button name="Appointment">Appoint plants for your package</button>
    <script src="scripts/main.js"></script>


    <a href="consumer-register.php">Consumer Register</a>
    <a href="consumer-login.php">Consumer Login</a>

    <?php
      //connect to DBMS      
      $mysqli = new mysqli("localhost", 'root', '');
      if($mysqli->connect_errno ) { 
        printf("Connect failed: %s<br />", $mysqli->connect_error);
        exit();
      }
      printf('Connected successfully.<br />');
      //create database
      if ($mysqli->query("CREATE DATABASE chip_website")) {
          printf("Database chip_website created successfully.<br />");
      }
      if ($mysqli->errno) {
          printf("Could not create database: %s<br />", $mysqli->error);
      }
      //select database
      $mysqli->select_db('chip_website');

      //create tabels by loading the SQL file
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
      echo "Tables imported successfully";

      $sql = "INSERT INTO Consumers (consumer_name, `password`) VALUES ('ary', '1234')";
      if (!$mysqli->query($sql)) {
        echo "Could not insert record into table: %s<br />" . $mysqli->error;
      } else {
        printf("Record inserted successfully.<br />");
      }
      if (!$mysqli->errno) {
        echo "Record inserted successfully.<br />";
      } else {
        echo "Could not insert record into table: %s<br />" . $mysqli->error;
      }
    ?>
  </body>
</html>
