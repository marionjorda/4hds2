<?php
require_once 'connection.php';

$id_utilisateur = $_GET["id_utilisateur"];

if(empty($id_utilisateur)){

        header('utilisateur:  listing_utilisateur.php');
        exit;
}

if(isset($_POST)  && !empty($_POST)){
      // var_dump($_POST);
      $control_form_err = false;
    if(! get_magic_quotes_gpc() ) {
        $nom_utilisateur = addslashes ($_POST['nom_utilisateur']);
        $prenom = addslashes ($_POST['prenom']);
        $id_utilisateur = addslashes ($_POST['id_utilisateur']);
    } else {
        $nom_utilisateur = $_POST['nom_utilisateur'];
        $prenom = $_POST['prenom'];
        $id_utilisateur = $_POST["id_utilisateur"];
    }

    if(!empty($nom_utilisateur)  &&  !empty($prenom)){

        $sql = " UPDATE  utilisateurs  SET   nom_utilisateur='".$nom_utilisateur."',prenom='".$prenom."' WHERE  id='".$id_utilisateur."' ";
        mysqli_select_db( $conn, 'utilisateurs' );
        $retval = mysqli_query( $conn, $sql );
   
        if(! $retval ) {
            $control_form_err = true;
        }

    }

}

$sql = " SELECT id,nom_utilisateur,prenom, FROM  utilisateurs  WHERE id='".$id_utilisateur."' ";
$retval = mysqli_query( $conn, $sql );

$results = array();
if($retval){

    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
        $results[] = $row;
    }

    if(count($results)<=0){

        header('Utilisateur:  listing_utilisateur.php');
        exit;
    }
   
}

mysqli_close($conn);
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
                    <h2>Modifier la utilisateur</h2>

                <form  action ="<?php $_PHP_SELF ?>" method= "POST">


                    <?php   if(isset($_POST)  && !empty($_POST)){  ?>

                      <?php   if(!$control_form_err){  ?>

                      <div class="alert alert-success" role="alert">
                          <a href="#" class="alert-link">La modification a été effectuer avec succès</a>
                      </div>

                      <?php   }  ?> 

                      <?php   if($control_form_err){  ?>

                      <div class="alert alert-danger" role="alert">
                          <a href="#" class="alert-link">L'enregistrement a échoué</a>
                      </div>

                      <?php   }  ?>  

                    <?php   }  ?>  
                      <div class="form-group">
                           <label for="labelnomutilisateur">noméro de la utilisateur</label>
                           <input type="nomber" class="form-control" id="nom_utilisateur" name="nom_utilisateur" placeholder="Enter le nom de la utilisateur" value="<?= $results[0]["nom_utilisateur"]; ?>">
                           <?php   if(isset($_POST['nom_utilisateur'])  && empty($_POST['nom_utilisateur'])){  ?>

                            <div class="alert alert-danger" role="alert">
                                     <a href="#" class="alert-link">Le nom de la utilisateur ne doit pas etre vide</a>
                             </div>

                           <?php   }  ?> 
                       
                       </div>
                       <div class="form-group">
                           <label for="labelPrenom">Prénom</label>
                           <input type="prenom" class="form-control" id="prenom" name="prenom" placeholder="Enter le prenom" value="<?= $results[0]["prenom"]; ?>">
                       
                       </div>

                       <?php   if(isset($_POST['prenom'])  && empty($_POST['prenom'])){  ?>

                          <div class="alert alert-danger" role="alert">
                               <a href="#" class="alert-link">Le prenom ne doit pas etre vide</a>
                          </div>

                       <?php   }  ?>

                       <div class="form-group">
                           <label for="labelRole">Role</label>
                           <input type="role" class="form-control" id="role" name="role" placeholder="Enter le role" value="<?= $results[0]["role"]; ?>">
                       
                       </div>

                       <?php   if(isset($_POST['role'])  && empty($_POST['role'])){  ?>

                          <div class="alert alert-danger" role="alert">
                               <a href="#" class="alert-link">Le role ne doit pas etre vide</a>
                          </div>

                       <?php   }  ?>

                       <input type="hidden"  name = "id_utilisateur"  value="<?= $id_utilisateur ?>"  />

                       <button type="submit" class="btn btn-primary">Enregister</button>
                 </form>
                   
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
    </body>
</html>