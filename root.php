<?php
   require('verif-admin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">



</head>

<body>
 <?php require('header.php');?>

<div class="cont">
    
  <div class="pone">
     
    <header>
      <h1>Menu d'administration</h1>
    </header>

    <div class="pd">
    
            <div class="d1"> 
               <a href="statistic.php" class="lien"><img src="st.png"> <span>Satistiques </span></a>
            </div>
            
            <div class="d1">
            <a href="DI.php" class="lien"><i class="fas fa-user-plus fa-4x"></i><span>Demande d'inscription</span></a>
            </div>

            <div class="d1">
            <a href="lc.php" class="lien"><i class="fas fa-list fa-4x"></i> <span>Liste des clients <span></a>
            </div>

            <div class="d1">
            <a href="ajp.php" class="lien"><i class="fas fa-cart-plus fa-4x"></i></i><span>Ajouter Un produit</span></a>
            </div>


            <div class="d1">
              <a href="ajpr.php" class="lien"><i class="fas fa-plus fa-4x"></i><span>Ajouter Une Promotion</a>
            </div>

        </div>

    </div>



    
</div>

</body>
</html>