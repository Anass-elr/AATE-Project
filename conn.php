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

    <style>
             #conn{
                 height:450px;
             }

        </style>
    
</head>
<body>

<?php require('header.php'); ?>

    <section id="conn">
        <div class="form">
              <h1>Se Connecter</h1>
            <form action="session-login.php" method="post">
              

                <label>Nom d'utilisateur</label><input type="text" name="login" > <br><br>
               <label> Mot de passe </label> <input type="password"   name="pass">
                <br>
                <?php
                    
                    switch($error){
                            case 1: 
                                echo "merci de saisir un Username";
                                    break;
                            case 2: 
                                    echo "Mot de passe ou Username est invalide";
                                    break;
                            case 3:
                                    echo "Vous avez été deconecte";
                                    break;
                                 
            
                    }

                ?>
                 <br>
                <input type="submit" value="Se Connecter">
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




  
   
</body>
</html>
