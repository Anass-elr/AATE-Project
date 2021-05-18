<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>

    <style type="text/css">
     /*    
      .box{
            float: left;
            width: 20%;
            height: 350px;
            background-color:#F5F5F5 ;
            margin: 20px;
            margin-top: 30px;
            border: 1px solid  #240b0b18;
            border-radius: 10px;
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
     
     $requete=$connexion->prepare("SELECT title,prixAchat,image,id_P from produit where marque='Sumsung' ");
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
            <h2>Smart Phone Sumsung </h2>
            
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