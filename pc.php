<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>

    <style type="text/css">

      body {
          background-color:#f5f5f5c9;
      }
         /*
      .box{
            float: left;
            width: 25%;
            height: 350px;
            background-color:#F5F5F5 ;
            margin: 20px;
            margin-top: 30px;
            border: 1px solid  #240b0b18;
            border-radius: 4px;
            position: relative;
        }


        .box  h4{
            position:absolute;
            bottom:15%;
            left:center;
            left:2px;
            text-align:center;
        }

        .box  h5 {
            position:absolute;
            bottom:5%;
            left:66px;
        }
        */
    </style>

</head>
<body>

<?php

$serveur="localhost";
$login="root";
$pass="";

  try{
    $connexion = new PDO("mysql:host=$serveur;dbname=e-commerce",$login,$pass);
     $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     $requete=$connexion->prepare(" SELECT P.id_P,D.id_cat,title,prixAchat,P.image
                                            FROM  produit as P,
                                                de_  as	D,
                                                categorie as C
                                            WHERE    D.id_P=P.id_P and  D.id_cat=C.id_cat 
                                            and   D.id_cat=6;"
                                   );
     $requete -> execute();
     $resultat= $requete -> fetchall();


     $requete=$connexion->prepare("  SELECT image from produit where marque='Dell'; ");
     $requete -> execute();

     $res=$requete -> fetchall();

    /*  echo "<pre>";echo print_r($res);echo "</pre>";*/

  
 }



catch(PDOException $e){
    echo $e->getMessage();
 }
   ?>


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


    <section id="third-section">
        <div class="container">
          <div class="placer">
            <h2>Smart Phone Iphone </h2>
            
         <?php
            foreach($resultat as $ind=>$val){
             echo '<div class="box">';
             echo '<img src="data:image;base64,'.base64_encode($resultat[$ind]['image']).'" style="width:100%; height:70%; " >';

             echo  "<label>";
              echo   "<h4>";
             echo $resultat[$ind]['title'];
                            
             echo"<h4>";

             echo"<h5>";
             echo "Prix:  ".$resultat[$ind]['prixAchat']."  Dh";  
             echo"    </h5>";
             echo"  </label>";
             echo" </div>";
            }
            ?>


          
        </div>
        </div>
      </section>

</body>
</html>