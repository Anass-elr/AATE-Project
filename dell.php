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
    $requete=$connexion->prepare(" SELECT P.id_P,D.id_cat,title,prixAchat,P.image,P.id_P
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


<?php require('header.php'); ?>

    <section id="third-section">
        <div class="container">
          <div class="placer">
            <h2>Smart Phone Iphone </h2>
            
            <?php
          $id=0;
            foreach($resultat as $ind=>$val){
                $id=$resultat[$ind]['id_P'];
                echo '<div class="box">';
                echo "<a href='achat.php?id=$id' target='_blank'>";
                    echo '<img src="data:image;base64,'.base64_encode($resultat[$ind]['image']).'" style="width:100%; height:70%; " >';
                   
                    echo   "<h4>";
                    echo $resultat[$ind]['title'];
                                
                        echo"<h4>";

                        echo"<h5>";
                        echo "Prix:  ".$resultat[$ind]['prixAchat']."  Dh";  
                        echo"    </h5>";
                        echo "</a>";
                
                echo" </div>";
            }
            ?>

        </div>
        </div>
      </section>

</body>
</html>