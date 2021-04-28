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

      <div class="fshop"><h2>Fshop</h2></div>

     <div class="nav">
        <ul >
                   
                    <li><a href="index.php"> Home</a></li>

                    <li><a href="">Categorie</a>
                        <ul>
                            <li><a href="electro.php">Electronique</a>
                                <ul>
                                    <li><a href="">Telephone</a>
                                        <ul>
                                             <li><a href="">Sumsung</a></li>
                                             <li><a href="">Apple</a></li>
                                             <li><a href="">Xiaomi</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="">PC</a>
                                       <ul>
                                             <li><a href="">HP</a></li>
                                             <li><a href="">Dell</a></li>
                                             <li><a href="">Apple</a></li>
                                        </ul>
                                
                                
                                       </li>
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
                            <li><a href="">Montre et Bijoux</a>
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


    <section id="conn">
        <div class="form">
            <form action="session-login.php" method="post">
              

                <label>Username </label><input type="text" name="login" > <br><br>
               <label> Password </label> <input type="password"   name="pass">
                <br> <br>
                <input type="submit" value="se conecter">
                <a href="insc.php"><input type="button" value="S'inscrire" ></a>
            </form>

           <?php  
                 $message=isset($_GET['message']) ? $_GET['message'] : '';
                 if($message==2){
                     echo "<b> Inscription Succes vueillez se connecter";
                 }
                 ?>
       </div>
    </section>




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