<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>


input[type="button"]{
       
  margin-top:6px;
    width: 35%;
    height: 52px;
    background-color:rgb(255, 153, 0);
    border-radius: 4px;
    color: white;
    border: none;
    font-size: 15px;
    text-align: center;
    font-size:17px;

    
}

    </style>
    <title>Document</title>
</head>
<body>

<?php require('header.php'); ?>


<?php

       $servername="localhost";
       $username="root";
       $password="";
       $db="e-commerce";

       try{
        $conn=new PDO("mysql:host=$servername;dbname=$db",$username,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        if(isset($_GET["id"])){
            $id=isset($_GET["id"]) ? $_GET["id"] : -1;
              
                $req=$conn->prepare("SELECT * from produit where id_P=$id");
                $req->execute();
                $res=$req->fetch();

                    $req=$conn->prepare("update produit set comp=comp+1 where id_P=$id");
                     $req->execute();

                     $aip=$_SESSION['idp'];

                     $reqq=$conn->prepare("SELECT id_V from visiteur where adresseip='$aip' ;");
                     $reqq->execute();
                     $ress=$reqq->fetch(PDO::FETCH_ASSOC);
                     $ress=$ress['id_V'];
             
                     $reqq=$conn->prepare("INSERT INTO visiter(id_P,id_V) values($id,$ress) ");
                     $reqq->execute();

                     
        }

        if(isset($_GET["idp"]) && isset($_GET["idpr"])){
            $id=isset($_GET["idp"]) ? $_GET["idp"] : -1;
            $idpr=isset($_GET["idpr"]) ? $_GET["idpr"] : -1;


            $req=$conn->prepare("SELECT * from 
                       produit P,dispo_en D   
                       where P.id_P=D.id_P and
                       P.id_P=$id and D.idpromo=$idpr ;
                       ");
            $req->execute();
             $res=$req->fetch();



             
             $req=$conn->prepare("update produit set comp=comp+1 where id_P=$id");
             $req->execute();
        }
   
        $conn=NULL;
          
     }

     catch(PDOException  $e){
         echo "Erreur : ".$e->getMessage();
     }

?>

<section id="achat">
    <div class="produit">
         <div class="image">
            <?php
               echo '<img src="data:image;base64,'.base64_encode($res['image']).'" style="width:100%; height:80%; " >';
            ?>
            </div>

         <div class="info">
              <?php 
                    echo "<h2>".$res['title']."</h2>";
                    echo "<h4> <b>Marque</b> : ".$res['marque']."</h4>";
                    echo "<h4> <b>Couleur</b> : ". $res['couleur']."</h4>";
                    echo "<h4> <b>Stock</b> : ".$res['qte_stock']."</h4>";
                      if(isset($_GET["idp"]) && isset($_GET["idpr"])){
                   echo '<u><h3 style="color:red; font-size:28px;margin-bottom:-1px;">'.$res['prix'].' Dhs</h3></u>';
                        echo "<s>".$res['prixAchat']." Dhs</s>";
                      }
                      else{
                          echo "<u><h3 style='font-size:28px;'>".$res['prixAchat']." Dhs</h3></u>";
                        }
                         echo "<br>";
                    ?>
                       
                    <!--echo "<a href='addpanier.php?id=$id'>";
                    echo '<div class="panier"> <i class="fas fa-shopping-cart fa-lg"></i>';
                    echo ' <span> Ajouter au Panier </span>';
                    echo '</div>';-->
                    <input type="button"  onClick="ajouter(<?php echo $id;?>) " value="Ajouter au Panier" name="ajoutep">
                    

                  <?php
                    echo '<h3>Description</h3>';
                    echo "<p>".$res['description']."</p>";
                    ?>    
        

                    
         </div>
    </div>


   
</section>




</nav>

<script language="javascript">
 

 

function ajouter(id){
  window.location.href='addpanier.php?id='+id;
     alert('Produit Ajouter au panier');  
}
</script>
</body>
</html>