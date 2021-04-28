<?php
 
   session_start();
    if(!isset( $_SESSION['logged']) || !$_SESSION['logged']){
          session_unset();
          session_destroy(); 
          $_SESSION = array();
    }
    
    $username= isset($_SESSION['login']) ? $_SESSION['login'] : '';
 
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2.0.11/dist/flickity.min.css">
   
</head>
<body>
  <script src="https://unpkg.com/flickity@2.0.11/dist/flickity.pkgd.min.js"></script>
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

            
            $sql=$connexion->prepare("SELECT prixAchat,title,image
                        from produit;");
            $sql->execute();
            $res1=$sql->fetchall();


            //$sql="SELECT password from client where username='$username ;";
          
            
            $reqq=$connexion->prepare("SELECT password from client where username='$username' ;");
            $reqq->execute();
            $ress=$reqq->fetchall();

           
    
            echo "<pre>"; echo print_r($ress); echo "</pre>";
            
            
        }

        catch(PDOException $e){
           echo $e->getMessage();
        }
   

    ?>


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
                     <li><a href="deco.php">se déconnecter</a></li>
                        <li ><a href="">Panier</a></li>
                     </ul>
  

    </nav>
  
    

    <section id="First-section">
      <div class="container">
        
        
        <div class="barre"> <h2>Profitez De Nos Offres <?php  echo $username; ?>  | Jusqu'a -40% </h2></div>

        <div class="prod">
    
            <?php  
                foreach($res as $ind=>$val){
                    echo '<div class="box3">';
                        echo '<img src="data:image;base64,'.base64_encode($res[$ind]['image']).'" style="width:100%; height:80%; " >';
                            
                            echo   "<h4>";
                            echo $res[$ind]['title'];
                                            
                            echo"</h4>";

                            echo"<h4>";
                            echo "Prix:  ".$res[$ind]['prix']."  Dh"; 

                    echo '</div>';
                }

            ?>

        </div>
    

        </div>
    </section> 
    
    
    <section id="third-section">
        <div class="titre banda">
              <h1>Les Plus Visités </h1>
           </div>  
           
        <div class="containerr">
          <div class="placer" data-flickity='{ "groupCells": true }'>
             
          <?php 
                 foreach($res1 as $ind=>$val){
                    echo '<div class="box">';
                        echo '<img src="data:image;base64,'.base64_encode($res1[$ind]['image']).'" style="width:100%; height:80%; " >';
                            
                            echo   "<h4>";
                            echo $res1[$ind]['title'];
                                            
                            echo"</h4>";

                            echo"<h4>";
                            echo "Prix:  ".$res1[$ind]['prixAchat']."  Dh"; 

                    echo '</div>';
                 }
        ?>
            
        </div>
        </div>
      </section>


    <section id="fourth-section">
         <div class="titre">
            <h1>Les Plus Vendus </h1>
         </div>

        <div class="containerr">
            <div class="placer" data-flickity='{ "groupCells": true }'>
        <?php
              foreach($res1 as $ind=>$val){
                    echo '<div class="box">';
                        echo '<img src="data:image;base64,'.base64_encode($res1[$ind]['image']).'" style="width:100%; height:80%; " >';
                            
                            echo   "<h4>";
                            echo $res1[$ind]['title'];
                                            
                            echo"</h4>";

                            echo"<h4>";
                            echo "Prix:  ".$res1[$ind]['prixAchat']."  Dh"; 

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