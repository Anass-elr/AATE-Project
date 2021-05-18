<?php
 require '_header.php';
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
        .box3 a{  
             color:#1F1F1F;
         }

         .box a{  
             color:#1F1F1F;
         }

         
        .box3  h4, .box h4 {
            text-transform: uppercase;
        }
 
        </style>
   
</head>
<body>
<script src="https://kit.fontawesome.com/0f99f3d970.js" crossorigin="anonymous"></script>
  
    <?php 
  
      
        $serveur="localhost";
        $login="root";
        $pass="";
       
        try{
            $connexion = new PDO("mysql:host=$serveur;dbname=e-commerce",$login,$pass);
            $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $req=$connexion->prepare("SELECT prix,P.title,P.image,P.id_P,D.idpromo,P.prixAchat
                from dispo_en D,produit P
               where D.id_P=P.id_P and D.idpromo=1 ;");

            $req->execute();
            $res=$req->fetchall();

            
            $sql=$connexion->prepare("SELECT id_P,prixAchat,title,image
                        from produit
                        ORDER BY comp DESC
                        limit 10
                        ;");
            $sql->execute();
            $res1=$sql->fetchall();

            $aip=$_SERVER['REMOTE_ADDR'];
            $_SESSION['idp']=$aip;

            $sql=$connexion->prepare("INSERT INTO visiteur(adresseip) VALUES('$aip') ;");
            $sql->execute();

            $sql=$connexion->prepare("SELECT id_P,prixAchat,title,image
                        from produit
                        ORDER BY Qv DESC
                        limit 10
                        ;");
            $sql->execute();
            $res11=$sql->fetchall();

            

            $connexion=NULL;
        }

        catch(PDOException $e){
           echo $e->getMessage();
        }
    ?>

  <?php require('header.php'); ?>

    <section id="First-section">
      <div class="container">
        
        
        <div class="barre"> <h2>Profitez De Nos Offres <?php /* echo $username; */?>  | Jusqu'a -40% </h2></div>

        <div class="prod">
    
            <?php 
                foreach($res as $ind=>$val){
                    $idp= $res[$ind]['id_P'];
                    $idpr= $res[$ind]['idpromo'];
                    echo '<div class="box3">';
                    echo "<a href='achat.php?idp=$idp&idpr=$idpr'>";
                echo '<img src="data:image;base64,'.base64_encode($res[$ind]['image']).'" style="width:100%; height:80%; " >';
                            
                            echo   "<h4>";
                            echo $res[$ind]['title'];
                                            
                            echo"</h4>";

                            echo"<h4>";
                            echo "".$res[$ind]['prix']."  Dh"; 
                            echo "</h4> </a>";
                            echo "<s>".$res[$ind]['prixAchat']."</s>";
                    echo '</div>';
                }

            ?>

        </div>
    

        </div>
    </section> 
    
    
    <section id="third-section">
        
        <span>  Les Plus Visités </span>
           
           
        <div class="containerr">
          <div class="placer" data-flickity='{ "groupCells": true }'>
             
          <?php 
                 $id=0;
                 foreach($res1 as $ind=>$val){
                      $id=$res1[$ind]['id_P'];
                    echo '<div class="box">';
                    echo "<a href='achat.php?id=$id'>";
                        echo '<img src="data:image;base64,'.base64_encode($res1[$ind]['image']).'" style="width:100%; height:80%;">';
                            
                            echo   "<h4>";
                            echo $res1[$ind]['title'];
                            echo"</h4>";

                            echo"<h4>";
                            echo "".$res1[$ind]['prixAchat']."  Dh"; 
                            echo "</h4></a>";
                    echo '</div>';
                 }
        ?>
            
        </div>
        </div>
      </section>


    <section id="fourth-section">
    
            <span>  Les Plus Vendus </span>
         

        <div class="containerr">
            <div class="placer" data-flickity='{ "groupCells": true }'>
        <?php
           $id=0;
              foreach($res1 as $ind=>$val){
                    echo '<div class="box">';
                      $id=$res11[$ind]['id_P'];
          
                      echo "<a href='achat.php?id=$id'>";
                      echo '<img src="data:image;base64,'.base64_encode($res11[$ind]['image']).'" style="width:100%; height:80%; " >';
                            
                            echo   "<h4>";
                            echo $res11[$ind]['title'];
                                            
                            echo"</h4>";

                            echo"<h4>";
                            echo "".$res11[$ind]['prixAchat']."  Dh"; 
                            echo"</h4>";

                            echo '</a>';
                    echo '</div>';
                 }
                 ?>
            </div>
        </div>

    </section>



    <section id="fifth-section">
        <div class="container">
            <div class="about-us">
                <h2>A propos de Nous</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at nobis aliquid,
                    molestiae ea pariatur ratione inventore laboriosam di
                    stinctio possimus eligendi? Pariatur blanditiis, velit accusamus illo facilis esse nihil! 
                    
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat voluptas velit molestias culpa sint magni esse id 
                    exercitationem quidem iste, maxime enim nihil amet eos eum ad! Architecto, maiores tempora!
                </p>
            </div>


        <div class="contact"  id="fin">
            <h2>Contacter Nous</h2>
            <form >
                 <label>Nom &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label> <input type="text" name="nom"><br>
                 <label>Prenom  &nbsp&nbsp&nbsp</label> <input type="text" name="nom" class="prenom"><br>
                 <label>E-mail  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label> <input type="text" name="nom"><br>
                 <label>Message   &nbsp&nbsp</label>
                 <textarea></textarea><br>
                <input type="submit" value="submit" name="submit">
            </form>
        </div>
        </div>


    </section>
   

    <footer>
        <div class="container">
            <h3>Merci pour vote visite </h3>
        </div>
    </footer>



    
</body>
</html>