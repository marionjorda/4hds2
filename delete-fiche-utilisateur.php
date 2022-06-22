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
$id_utilisateur = $_GET["id_utilisateur"];
echo $id_utilisateur ;
$sql = 'DELETE FROM utilisateurs where ID='.$id_utilisateur;
if ($retval = mysqli_query( $conn, $sql )){
    printf('Deleted successfully');
    header("Location: listing_utilisateur.php");
}
?>
</body>
</html>
