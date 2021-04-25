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
    <title>Document</title>

    

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
                                            and   D.id_cat=6  and  P.marque='Dell' ;"
                                   );
     $requete -> execute();
     $resultat= $requete -> fetchall();

           
    }



catch(PDOException $e){
    echo $e->getMessage();
 }
   ?>


<header class="banda">
        <div class="containerr">
            <div class="nav1">
               <ul>
                   <li> <h3>Fshop</h3></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#fifth-section">A propos de nous  </a></li>
                    <li><a href="#fin">Contacter Nous</a></li>
                </ul>
                
                  

             </div>

                <div class="nav2">
                    <ul>
                        <li><a href="">Se connecter</a></li>
                        <li ><a href="">Panier</a></li>
                    </ul>
                </div>
        </div>

    </header>


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