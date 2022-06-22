<?php
require_once 'connection.php';

$id_produit = $_GET["id_produit"];

if(empty($id_produit)){

        header('Location:  listing_produit.php');
        exit;
}

if(isset($_POST)  && !empty($_POST)){
      // var_dump($_POST);
      $control_form_err = false;
    if(! get_magic_quotes_gpc() ) {
        $description = addslashes ($_POST['description']);
        $prix = addslashes ($_POST['prix']);
        $stock = addslashes ($_POST['stock']);
        $reference = addslashes ($_POST['reference']);

        $id_produit = addslashes ($_POST['id_produit']);
    } else {
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $stock = $_POST['stock'];
        $reference = $_POST['reference'];
        $id_produit = $_POST["id_produit"];
    }

    if(!empty($description)  &&  !empty($prix) && !empty($stock)){

        $sql = " UPDATE  produit  SET   'description' ='".$description."',prix='".$prix."',stock='".$stock."',reference='".$reference."' WHERE  id='".$id_produit."' ";
        mysqli_select_db( $conn, 'produit' );
        $retval = mysqli_query( $conn, $sql );
   
        if(! $retval ) {
            $control_form_err = true;
        }

    }

}

$sql = " SELECT id,description,prix,stock,reference FROM  produit  WHERE id='".$id_produit."' ";
$retval = mysqli_query( $conn, $sql );

$results = array();
if($retval){

    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
        $results[] = $row;
    }

    if(count($results)<=0){

        header('Produit:  listing_produit.php');
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
                    <h2>Modifier le produit</h2>

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
                           <label for="labelDescription">Description</label>
                           <input type="text" class="form-control" id="description" name="description" placeholder="Enter le description" value="<?= $results[0]["description"]; ?>">
                           <?php   if(isset($_POST['description'])  && empty($_POST['description'])){  ?>

                            <div class="alert alert-danger" role="alert">
                                     <a href="#" class="alert-link">La description ne doit pas être vide</a>
                             </div>

                           <?php   }  ?> 
                       
                       </div>
                       <div class="form-group">
                           <label for="labelPrix">Prix</label>
                           <input type="text" class="form-control" id="prix" name="prix" placeholder="Enter le prix" value="<?= $results[0]["prix"]; ?>">
                       
                       </div>

                       <?php   if(isset($_POST['prix'])  && empty($_POST['prix'])){  ?>

                          <div class="alert alert-danger" role="alert">
                               <a href="#" class="alert-link">Le prix ne doit pas être vide</a>
                          </div>

                       <?php   }  ?> 

                        <div class="form-group"  style="margin-bottom:1%">
                           <label for="labelstock">stock</label>                         
                           <div class="input-group">
                                <input type="date" placeholder="Mettre le stock" class="form-control" id="stock" name="stock" value="<?= $results[0]["stock"]; ?>">        
                            </div>  
                            
                            <?php   if(isset($_POST['stock'])  && empty($_POST['stock'])){  ?>

                               <div class="alert alert-danger" role="alert">
                                   <a href="#" class="alert-link">Le stock ne doit pas être vide</a>
                               </div>

                            <?php   }  ?> 
                        </div>

                        <div class="form-group"  style="margin-bottom:1%">
                           <label for="labelReference">Reference</label>                         
                           <div class="input-group">
                                 <input type="text" placeholder="Choisir une reference" class="form-control" id="reference" name="villz" value="<?= $results[0]["reference"]; ?>">        
                            </div>  
                            
                            <?php   if(isset($_POST['reference'])  && empty($_POST['reference'])){  ?>

                               <div class="alert alert-danger" role="alert">
                                   <a href="#" class="alert-link">La reference ne doit pas être vide</a>
                               </div>

                            <?php   }  ?> 
                        </div>

                       <input type="hidden"  name = "id_produit"  value="<?= $id_produit ?>"  />

                       <button type="submit" class="btn btn-primary">Enregister</button>
                 </form>
                   
                </div>
            </div>
        </div>
    </body>
</html>