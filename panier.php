<?php
 

    require '_header.php';
   require('header.php');
    

     $ids=isset($_GET['id']) ? $_GET['id'] : -1;
      if($ids != -1){
        unset($_SESSION['panier'][$ids]);
      } 

    $ids=array_keys($_SESSION['panier']);
      if(empty($ids)){
        $product=array();
      }
      else{
        $product=$DB->query("SELECT * 
          from produit where id_P IN (" .implode(",",$ids).")");
           }

     
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <link rel="stylesheet" href="style.css">
  <style>
      
     section div {
        width:25%;
        height:200px;
      }

      .fa-color{
        color:black;
      }


  </style>
</head>
<body>


<div class="fdemande">
  <div class="demande">
      
    <table >
       <tr class="firstcolor">  <th>Image</th> <th>Titre</th> <th>Prix</th> <th>Quantité</th> <th>Retirer</th>
           
    
    </tr>

         <?php 
                 $id=0;
                 $s=0;
                 foreach($product  as $res1){
                      $id=$res1['id_P'];
                      echo "<tr>";

                    echo ' <td> <img src="data:image;base64,'.base64_encode($res1['image']).'"
                         style="width:100%; height:80%;">'; echo"</td>";
                            
                            echo   "<td>";
                            echo $res1['title'];
                            echo"</td>";

                            echo"<td>";
                            echo "".$res1['prixAchat']."  Dh"; 
                            echo "</td>";

                            echo"<td> ";
                            echo "".$_SESSION['panier'][$res1['id_P']]; 
                            echo "</td>";

                            $id=$res1['id_P'];
                            echo "<td> <a href=\" panier.php?id=$id \" >";
                              echo '<i class="fas fa-trash fa-lg fa-color"></i>';
                              echo '</a> </td>'; 

                         echo "</tr>";
                  $s=$s+$res1['prixAchat']*$_SESSION['panier'][$res1['id_P']];
               }
             
               $_SESSION['somme']=$s;
        ?>


                  
            
        
      
            </table>

      </div>
     </div>


      <br><br><br><br>

     
      <a href='acheter.php?s='>; 
        <div class="panierr"> <i class="fas fa-shopping-cart fa-lg"></i>
                      <span> Acheter Maintenant </span>
                    </div>
        </a>
  
</body>
</html>




