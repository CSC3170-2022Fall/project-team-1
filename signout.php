<?php
session_start();
$_SESSION['consumer_name'] = null;
$_SESSION['plant_name'] = null;
echo '<script>window.location.assign("index.php");</script>';
?>