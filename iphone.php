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

    <style type="text/css">
       /*  
      .box{
            float: left;
            width: 24%;
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
     
     $requete=$connexion->prepare("SELECT title,prixAchat,image from produit where marque='Apple' ");
     $requete -> execute();
     $resultat= $requete -> fetchall();

           
    }



catch(PDOException $e){
    echo $e->getMessage();
 }
   ?>


<header>
        <div class="containerr">
            <h3>Fshop</h3>
        </div>

    </header>

    <nav>
        <div class="containerr">
          <div class="nav1">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="">A propos de nous  </a></li>
                    <li><a href="#fin">Contacter Nous</a></li>
                </ul>
                
                <form >
                    <input type="search" name="search" placeholder="Entrez un produit">
                </form>
             </div>

        <div class="nav2">
            <ul>
                <li><a href="">Se connecter</a></li>
                <li ><a href="">Panier</a></li>
            </ul>
        </div>
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