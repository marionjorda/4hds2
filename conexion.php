<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $db = 'gestion_stock_medicaments';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $db);
    if(! $conn) {
        die('Could not connect: '.mysqli_error($conn));
    }
?>
