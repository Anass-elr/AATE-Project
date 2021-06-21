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

      .final {
        height:60px;
        text-align:left;
      }

      .final label {
        font-size:20px;
      }

      .final:first-child{
        text-align:right;
      }

     

      input[type="button"]{
       
        width:20%;
        height:50px;
        font-size:17px;
        padding-bottom:7px;
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
                         style="width:60%; height:100%;">'; echo"</td>";
                            
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


           <tr><td colspan="3"  class="final"> <label>La Somme En dirhams :</label> </td><td colspan="2"  class="final"> <label> <?php  echo $s. " Dh"; ?> </label></td> </tr>       
            
        
      
            </table>

      </div>
     </div>


      <br><br><br><br>

       <input type="button" value="Acheter Maintenant" onClick="test()" class="panierr" onClick="acheter()">
    

  <script language="javascript">
    function test(){


      swal({
          title: "Voulez vous continuez vers la page d'achat ? ",
        
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Vueillez patientez!", {
              icon: "success",
            });
            window.location.href='acheter.php';
            return true;
          } else {
            swal("Votre demande a été annuler!");
          }
        });
        
    }
  </script>
</body>
</html>




