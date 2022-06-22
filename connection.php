<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'gestion_stock_medicaments';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn ) {
    die('Could not connect: ' . mysqli_error($conn));
 }
 $retval = mysqli_select_db( $conn, 'gestion_stock_medicaments' );

 if(! $retval ) {
    die('Could not select database: ' . mysqli_error($conn));
 }
?>