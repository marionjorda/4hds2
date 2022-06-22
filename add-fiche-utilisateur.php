<?php
require_once 'conexion.php';

if(isset($_POST)  && !empty($_POST)){

    // var_dump($_POST);

    $control_form_err = false;  
    if(! get_magic_quotes_gpc() ) {
        $nom = addslashes ($_POST['nom']);
        $prenom = addslashes ($_POST['prenom']);
        $role = addslashes ($_POST['role']);
    } else {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $role = $_POST['role'];

    }

    if(!empty($_POST['nom']) &&  !empty($_POST['prenom']) &&  !empty($_POST['role'])){

        $sql = "INSERT INTO utilisateurs ". "(nom, prenom, role) "."VALUES ". "('$nom','$prenom','$role')";
        mysqli_select_db( $conn, 'utilisateurs' );
        $retval = mysqli_query( $conn, $sql );
   
        if(! $retval ) {
            $control_form_err = true;
        }

    }

    mysqli_close($conn);
  
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <link href="https://github.com/Template-admin/startbootstrap-sb-admin-2">
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Page content-->
                <div class="container-fluid">
                    <h2>Créer une nouvelle utilisateurs</h2>

                <form  action ="<?php $_PHP_SELF ?>" method= "POST">

                    <?php   if(isset($_POST)  && !empty($_POST)){  ?>

                        <?php   if(!$control_form_err){  ?>

                        <div class="alert alert-success" role="alert">
                            <a href="#" class="alert-link">L'enregistrement a été effectuer avec succès</a>
                        </div>

                        <?php   }  ?> 

                        <?php   if($control_form_err){  ?>

                        <div class="alert alert-danger" role="alert">
                            <a href="#" class="alert-link">L'enregistrement a échoué</a>
                        </div>

                        <?php   }  ?>  

                    <?php   }  ?>  
                        <div class="form-group">
                            <label for="labelNom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter le nom de l'utilisateurs">
                            <?php   if(isset($_POST['nom'])  && empty($_POST['nom'])){  ?>

                            <div class="alert alert-danger" role="alert">
                                <a href="#" class="alert-link">Le nom ne doit pas etre vide</a>
                            </div>

                           <?php   }  ?> 
                       
                         </div>
                        <div class="form-group">
                           <label for="labelPrenom">Prénom</label>
                           <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Enter le prénom">
                       
                        </div>

                        <?php   if(isset($_POST['prenom'])  && empty($_POST['prenom'])){  ?>

                            <div class="alert alert-danger" role="alert">
                                <a href="#" class="alert-link">Le prénom ne doit pas etre vide</a>
                            </div>

                        <?php   }  ?>

                        <div class="form-group">
                           <label for="labelRole">Role</label>
                           <input type="text" class="form-control" id="role" name="role" placeholder="Enter le role">
                       
                        </div>

                        <?php   if(isset($_POST['role'])  && empty($_POST['role'])){  ?>

                            <div class="alert alert-danger" role="alert">
                                <a href="#" class="alert-link">Le role ne doit pas etre vide</a>
                            </div>

                        <?php   }  ?>

                        <button type="submit" class="btn btn-primary">Enregister</button>
                 </form>
                   
                </div>
            </div>
        </div>
    </body>
</html>