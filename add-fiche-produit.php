<?php
require_once 'conexion.php';

if(isset($_POST)  && !empty($_POST)){

      // var_dump($_POST);

      $control_form_err = false;

      if(! get_magic_quotes_gpc() ) {
        $description = addslashes ($_POST['description']);
        $prix = addslashes ($_POST['prix']);
        $stock = addslashes ($_POST['stock']);
        $reference = addslashes ($_POST['reference']);
     } else {
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $stock = $_POST['stock'];
        $reference = $_POST['reference'];
     }

     if(!empty($_POST['description'])  &&  !empty($_POST['prix'] ) && !empty($_POST['stock']) && !empty($_POST['reference'])){

        $sql = "INSERT INTO produit (description, prix, stock, reference) VALUES ('$description','$prix','$stock','$reference')";
        mysqli_select_db( $conn, 'produit' );
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
                    <h2>Créer un nouveau profil produit</h2>

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
                           <label for="labelDescription">Description</label>
                           <input type="text" class="form-control" id="description" name="description" placeholder="Enter le description">
                           <?php   if(isset($_POST['description'])  && empty($_POST['description'])){  ?>

                            <div class="alert alert-danger" role="alert">
                                     <a href="#" class="alert-link">La description ne doit pas être vide</a>
                             </div>

                           <?php   }  ?> 
                       
                       </div>
                       <div class="form-group">
                           <label for="labelPrix">Prix</label>
                           <input type="text" class="form-control" id="prix" name="prix" placeholder="Enter le prix">
                       
                       </div>

                       <?php   if(isset($_POST['prix'])  && empty($_POST['prix'])){  ?>

                          <div class="alert alert-danger" role="alert">
                               <a href="#" class="alert-link">Le prix ne doit pas être vide</a>
                          </div>

                       <?php   }  ?> 


                       <div class="form-group"  style="margin-bottom:1%">
                           <label for="labelReference">Reference</label>                         
                           <div class="input-group">
                                 <input type="text" placeholder="Mettre la reference" class="form-control" id="reference" name="reference">        
                            </div>  
                            
                            <?php   if(isset($_POST['reference'])  && empty($_POST['reference'])){  ?>

                               <div class="alert alert-danger" role="alert">
                                   <a href="#" class="alert-link">La reference ne doit pas être vide</a>
                               </div>

                            <?php   }  ?> 
                       
                       </div>


                       <div class="form-group"  style="margin-bottom:1%">
                           <label for="labelStock">Stock</label>                         
                           <div class="input-group">
                                 <input type="varchar" placeholder="Mettre le stock" class="form-control" id="stock" name="stock">        
                            </div>  
                            
                            <?php   if(isset($_POST['stock'])  && empty($_POST['stock'])){  ?>

                               <div class="alert alert-danger" role="alert">
                                   <a href="#" class="alert-link">Le stock ne doit pas être vide</a>
                               </div>

                            <?php   }  ?> 
                       
                       </div>

                       <button type="submit" class="btn btn-primary">Enregister</button>
                 </form>
                   
                </div>
            </div>
        </div>
    </body>
</html>