<?php 

require '_header.php';



  $id=isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
    if(!empty($id)){
      $product=$DB->query("SELECT id_P from produit where id_P=$id ");
        if(empty($product)){
          die('Pas de Produit');
        }
       
        $panier->addproduct($id);
        $pp=$_SERVER["HTTP_REFERER"];
        header("Location: $pp");
      
      }
      else{
        die('Ajouter un produit');
      }

?>