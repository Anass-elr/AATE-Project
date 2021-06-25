<?php 
             $message=isset($_GET['message']) ? $_GET['message'] : '';
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style >

            .my-form {
                 padding:150px;
            }

            .my-form form input{
                margin-bottom:8px;
                padding:10px;
            }

            #conn{
                min-height:800px;
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

          $req=$connexion->prepare("SELECT prix,P.title,P.image
                from dispo_en D,produit P
               where D.id_P=P.id_P and D.idpromo=1 ;");

            $req->execute();
            $res=$req->fetchall();
           
        }

        catch(PDOException $e){
           echo $e->getMessage();
        }
   

    ?>


<?php require('header.php'); ?>

  
<section id="conn">
  <div class="form">
      <h1>S'inscrire</h1>
        <form action="test-insc.php"  method="POST">
          Nom d'utilisateur        <input type="text" name="username"><br>
           Mot de passe   <input type="password" name="pass"><br>
           Email  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp<input type="text" name="email"><br>
           Adresse &nbsp &nbsp    <input type="text" name="adresse"><br>
           Nom &nbsp &nbsp    <input type="text" name="nom"><br>
           Prenom &nbsp &nbsp    <input type="text" name="prenom"><br>
           Numero de telephone     <input type="text" name="tele"><br>

           <?php
                switch($message){
                    case 1:
                        echo "<b>Saisire tous les champs svp</b>";
                        break;

                        case 2:
                            echo "<b>Les informations Non compatible</b>";
                            break;

                    case 3 :
                        echo "<b>Username déjà utilisé </b>";
                        break;

                        case 4 :
                            echo "<b>Email déjà utilisé </b> <br>";
                            break;
                }

                echo "<br>";
              ?>

            <input type="submit" value="S'inscrire">
        
        </form>
    </div>

    </section>

  </div>



</body>
    </html>