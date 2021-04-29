<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<nav class="banda">

<div class="fshop"><h2>Fshop</h2></div>

<div class="nav">
  <ul >
             
              <li><a href="index.php"> Home</a></li>

              <li><a href="">Categorie</a>
                  <ul>
                      <li><a href="electro.php">Electronique</a>
                          <ul>
                              <li><a href="tele.php">Telephone</a>
                                  <ul>
                                       <li><a href="sumsung.php">Sumsung</a></li>
                                       <li><a href="iphone.php">Apple</a></li>
                                       <li><a href="xiaomi.php">Xiaomi</a></li>
                                  </ul>
                              </li>
                              <li><a href="pc.php">PC</a>
                                 <ul>
                                       <li><a href="">HP</a></li>
                                       <li><a href="dell.php">Dell</a></li>
                                       <li><a href="">Apple</a></li>
                                  </ul>
                          
                          
                                 </li>
                              <li><a href="">Acessoirs</a></li>
                              <li><a href="">M&Q</a></li>
                          </ul>
                  
                      </li>
                      <li><a href="vetem.php">Vetements</a>
                          <ul>
                              <li><a href="">Homme</a></li>
                              <li><a href="">Femme</a></li>
                          </ul>
                      </li>
                      <li><a href="mb.php">Montre et Bijoux</a>
                      <ul>
                                       <li><a href="">Montre</a></li>
                                       <li><a href="">Bijoux</a></li>
                                      
                                  </ul>
                  
                          </li>
                  </ul>
              </li>

              <li><a href="#fifth-section">A propos de nous  </a></li>
              <li><a href="#fin">Contacter Nous</a></li>
               </ul>


          <ul class="right">
               <li><a href="conn.php" >Se connecter</a></li>
               <li><a href="deco.php">se déconnecter</a></li>
                  <li ><a href="">Panier</a></li>
               </ul>

</div>
</nav>


<?php
     $id=isset($_GET["id"]) ? $_GET["id"] : -1;
       
       $servername="localhost";
       $username="root";
       $password="";
       $db="e-commerce";

     try{
        $conn=new PDO("mysql:host=$servername;dbname=$db",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
         $req=$conn->prepare("SELECT * from produit where id_P=$id");
           $req->execute();
              $res=$req->fetch();

             $req=$conn->prepare("update produit set comp=comp+1 where id_P=$id");
                $req->execute();

            //  echo "<pre>".print_r($res)."</pre>";
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
                    echo "<u><h3>".$res['prixAchat']." Dhs</h3></u>";
                    echo '<input type="button" value="Acheter">';


                    echo '<h3>Description</h3>';
                    echo "<p>".$res['description']."</p>";
                        
        

                    ?>
         </div>
    </div>


   
</section>




</nav>
</body>
</html>