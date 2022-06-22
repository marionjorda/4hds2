 
<?php
require_once 'conexion.php';
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
    <link href="https://github.com/Template-admin/startbootstrap-sb-admin-2">
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <div class="border-end bg-white" id="sidebar-wrapper">
            </div>
            <div id="page-content-wrapper">
                <div class="container-fluid" style="margin-top:2%">

                    <a href="./add-fiche-utilisateur.php"><button type="button" class="btn btn-primary">Ajouter une nouvelle fiche d'utilisateur</button> </a>   

                    <?php

                       $sql = "SELECT id,nom,prenom,role FROM  utilisateurs ";
                       $retval = mysqli_query( $conn, $sql );
                       if(! $retval ) {  ?>
                          <div class="alert alert-danger" role="alert">
                                <a href="#" class="alert-link">L'affichage  a échoué</a>
                           </div>
                       <?php  }else{   ?>


                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">NOM</th>
                                    <th scope="col">PRENOM</th>
                                    <th scope="col">ROLE</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                 
                                <?php   while($row = mysqli_fetch_assoc($retval)) {  ?>

                                    <tr>
                                        <th scope="row"><?= $row["id"]  ?> </th>
                                        <td><?= $row["nom"]  ?></td>
                                        <td><?= $row["prenom"]  ?></td>
                                        <td><?= $row["role"]  ?></td>

                                        <td><a href="./edit-fiche-utilisateur.php?id_utilisateur=<?= $row["id"] ?>"><button type="button" class="btn btn-primary">Modifier la fiche de l'utilisateur</button></a> 

                                        <a href="./delete-fiche-utilisateur.php?id_utilisateur=<?= $row["id"] ?>"><button type="button" class="btn btn-primary">Supprimer la fiche de l'utilisateur</button></a></td>

                                    </tr>
                   
                                    <?php   }   ?>                             
                           
                            
                                </tbody>

                            </table> 

                        <?php   }   ?>

                      
                    <?php mysqli_close($conn);    ?>                       
                     
                </div>
            </div>
        </div>
    </body>
</html> 


