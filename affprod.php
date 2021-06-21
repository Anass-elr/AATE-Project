<?php 
   session_start();
   $username= isset($_SESSION['login']) ? $_SESSION['login'] : '';
   $idc=isset($_GET['idc']) ? $_GET['idc'] : -1 ;
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

        #third-section {
         height:1000px;
         }

         .container {
            margin: auto;
            width: 88%;
            overflow: hidden;
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


     $requete=$connexion->prepare(" SELECT *
           FROM   de_  as	D
           WHERE  D.id_cat=$idc ;"
     );
       $requete -> execute();
       $resultat= $requete -> fetch();

    if(empty($resultat)){
            echo " <b> Enrtrez une categire existant<b>";
            exit;
    }

   else{
     if( isset($_GET['idc']) && !isset($_GET['idc1']) && !isset($_GET['marque'])){
        $requete=$connexion->prepare(" SELECT P.id_P,D.id_cat,title,prixAchat,P.image
                                          FROM  produit as P,de_  as	D
                                          WHERE    D.id_P=P.id_P 
                                          and   D.id_cat=$idc ;"
                                    );
      $requete -> execute();
      $resultat= $requete -> fetchall();
    }

    elseif( isset($_GET['idc']) && isset($_GET['idc1']) && !isset($_GET['marque'])){
      $idc1=isset($_GET['idc1']) ? $_GET['idc1'] : -1 ;
      $requete=$connexion->prepare("SELECT P.id_P,D.id_cat,title,prixAchat,P.image
         FROM  produit as P,de_ as D
         WHERE  D.id_P=P.id_P and (D.id_cat=$idc or D.id_cat=$idc1)
         GROUP BY P.id_P HAVING count(*)>=2");
        $requete -> execute();
        $resultat= $requete -> fetchall();
    }
    elseif(isset($_GET['idc']) && !isset($_GET['idc1']) && isset($_GET['marque'])){
        $mr=isset($_GET['marque']) ? $_GET['marque'] : "";

        $requete=$connexion->prepare("SELECT P.id_P,D.id_cat,title,prixAchat,P.image
        FROM  produit  P,de_  D
        WHERE  D.id_P=P.id_P and D.id_cat=$idc And P.marque='$mr';
              ");
       $requete -> execute();
       $resultat= $requete -> fetchall();
    }


   }





}


catch(PDOException $e){
    echo $e->getMessage();
 }
   ?>

<?php require('header.php'); ?>
    <section id="third-section" >
        <div class="container pshow"> <br><h2>Catalogue </h2><br>
          <div class="placer" >
             <?php
                $id=0;
                  foreach($resultat as $ind=>$val){
                      $id=$resultat[$ind]['id_P'];
                      echo '<div class="box">';
                        echo "<a href='achat.php?id=$id' target='_blank'>";
                          echo '<img src="data:image;base64,'.base64_encode($resultat[$ind]['image']).'" style="width:100%; height:80%; " >';
                        
                          echo   "<h4>";
                          echo substr($resultat[$ind]['title'],0,18).'...';
                                      
                              echo"<h4>";

                              echo"<h4>";
                              echo "Prix:  ".$resultat[$ind]['prixAchat']."  Dh";  
                              echo"    </h4>";
                              echo "</a>";
                      
                      echo" </div>";
                  }
                  ?>
        </div>
        </div>
      </section>

      

</body>
</html>