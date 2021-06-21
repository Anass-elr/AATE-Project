<?php
   require('_header.php');
    if(!isset($_SESSION['Valider'])  || $_SESSION['Valider']==FALSE ){
        header("Location: acheter.php?e=1");
        exit;
    } 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
     
     table{
        width:80%;
        border-collapse:collapse;
        
     }

    th, td{
        padding:8px;
        text-align:center;
    }

    .fdemande h1{
       text-align:center;
       margin-bottom:px;
    }

    table td {
       height:60px;
    }

    table tr:last-child td {
      text-align:right;
      Font-size:18px;
    }

    </style>
</head>
<body>

<?php require('header.php'); ?>

<div class="fdemande">
  <div class="demande">
    <h1>Votre Facture</h1>

    <?php
       $ids=array_keys($_SESSION['panier']);
         if(empty($ids)){
           $product=array();
           echo "Le panier vide veillez ajouter un produit";
         }
         else{
           $product=$DB->query("SELECT title,prixAchat,id_P 
             from produit where id_P IN (" .implode(",",$ids).")");

             
            echo "<table> ";
            echo "<tr class=\"firstcolor\"><th>  Titre</th>";
            echo "<th>  Quantité</th>";
            echo "<th>  Prix</th></tr>";
              
             foreach($product as $tab){
                echo "<tr> <td>".$tab['title']."</td>";
                echo "<td>".$_SESSION['panier'][$tab['id_P']]."</td>";
                echo "<td>".$_SESSION['panier'][$tab['id_P']]*$tab['prixAchat'] ."  dhs</td></tr>";
             }
             echo "<tr>  <td  COLSPAN=\"3\"> <b>Le prix Total : ".$_SESSION['somme']."  dhs</b></td></tr>";

             echo "</table>";
        }
        unset($_SESSION['Valider']);
        unset($_SESSION['panier']);
   ?>
   </div>
   </div>
   
   
    
</body>
</html>