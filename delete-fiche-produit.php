<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://github.com/Template-admin/startbootstrap-sb-admin-2">
    <title>Delete</title>
</head>
<body>
<?php
require_once 'connection.php';
$id_produit = $_GET["id_produit"];
echo $id_produit ;
$sql = 'DELETE FROM produit where ID='.$id_produit;
if ($retval = mysqli_query( $conn, $sql )){
    printf('Deleted successfully');
    header("Produit: listing_produit.php");
}
?>
</body>
</html>