<?php 
    $error=isset($_GET['error']) ? $_GET['error'] : '';
    $password=isset($_GET['password']) ? $_GET['password']  : '';
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
                        <li ><a href="">Panier</a></li>
                     </ul>
  

    </nav>

    <form action="session-login.php" method="post">
        Username :<input type="text" name="login" > <br><br>
         Password : <input type="password"   name="pass">
           <br> <br>
        <input type="submit" value="se conecter">
    </form>

    <?php
       switch($error){
           case 1: 
              echo "merci de saisir un Username";
                   break;
              case 2: 
                echo "le mot de passe  password  n'est pas valide";
                break;
              case 3:
                 echo "Vous avez été deconecte";
                 break;
            
       }
   ?>
</body>