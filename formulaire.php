<!-- achachia2003@yahoo.fr 
https://replit.com/ -->

<?php
    require_once 'conexion.php';

    if(isset($_POST['add'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $date_crea_profil = $_POST['date_crea_profil'];
        $sql = "INSERT INTO profs ".
            "(nom, prenom, date_crea_profil)"."VALUES".
            "('$nom','$prenom','$date_crea_profil')";
        mysqli_select_db($conn, 'profs');
        $retval = mysqli_query($conn, $sql);

        if(! $retval){
            die('could not enter data: '.mysqli_error($conn));
        }
        echo "Entered data successfully\n";
        mysqli_close($conn);
    } else 
        ?>

<html>
    <head>
        <title>Add Nex Record in MySQL Database</title>
        <link href="https://github.com/Template-admin/startbootstrap-sb-admin-2">
    </head>
    <body>
        
        <form method="post" action="<?php $_PHP_SELF?>">
            <table width ="600" border = "0" cellspacing = "1" cellpadding = "2">
                <tr>
                    <td width = "250">Nom: </td>
                    <td><input name = "nom" type = "text" id="nom"></td>
                </tr>
                <tr>
                    <td width = "250">Prénom: </td>
                    <td><input name = "prenom" type = "text" id="prenom"></td>
                </tr>
                <tr>
                    <td width = "250">Date création du profil: </td>
                    <td><input name = "date_crea_profil" type = "date" id="date_crea_profil"></td>
                </tr>
                <tr>
                    <td width = "250"> </td>
                    <td></td>
                </tr>
                <tr>
                    <td width = "250"> </td>
                    <td><input name = "add" type = "submit" id="add" value = "Envoyer"></td>
                </tr>
            </table>
        </form>
    </body>
</html>