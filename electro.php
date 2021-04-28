<?php 
   session_start();
   $username= isset($_SESSION['login']) ? $_SESSION['login'] : '';
?>

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
        

     /*
     $connexion -> exec("CREATE DATABASE test");
     echo "Creation reussite"; 
     */
     /*
     $codesql="CREATE TABLE test( 
         idt INTEGER PRIMARY KEY,
         name VARCHAR(20)
         )";
     $connexion ->exec($codesql); 
     echo "table créee";
     */
     


     $requete=$connexion->prepare(" SELECT P.id_P,D.id_cat,title,prixAchat,P.image
                                        FROM  produit as P,
                                        de_  as	D,
                                        categorie as C
                                        WHERE    D.id_P=P.id_P and  D.id_cat=C.id_cat 
                                        and   D.id_cat=1 ;"
                                   );
     $requete -> execute();
     $resultat= $requete -> fetchall();

           
    }



catch(PDOException $e){
    echo $e->getMessage();
 }
   ?>


<?php 
   // echo "<h1>";echo "Bonjour ".$username;echo "</h1>";
?>

<nav class="banda">
        <ul >
                   <li class="left"> <a href="">Fshop</a></li>
                    <li><a href="index.php"> Home</a></li>

                    <li><a href="">Categorie</a>
                        <ul>
                            <li><a href="electro.php">Electronique</a>
                                <ul>
                                    <li><a href="">Telephone</a>
                                        <ul>
                                             <li><a href="">Sumsung</a></li>
                                             <li><a href="">Acessoirs</a></li>
                                             <li><a href="">M&Q</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="">PC</a></li>
                                    <li><a href="">Acessoirs</a></li>
                                    <li><a href="">M&Q</a></li>
                                </ul>
                        
                            </li>
                            <li><a href="">Vetements</a>
                                <ul>
                                    <li><a href="">Homme</a></li>
                                    <li><a href="">Femme</a></li>
                                </ul>
                            </li>
                            <li><a href="">Montre et Bijoux</a></li>
                            <li><a href="">XXXXXX</a></li>
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