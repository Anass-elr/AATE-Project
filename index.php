
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

 <header class="banda">
        <div class="containerr">
           
               <ul>
                   <li>Fshop</li>
                    <li><a href="index.php"> Home</a></li>

                    <li>Categorie </li>

                    <li><a href="#fifth-section">A propos de nous  </a></li>
                    <li><a href="#fin">Contacter Nous</a></li>
               
                       <li><a href="conn.php">Se connecter</a></li>
                        <li ><a href="">Panier</a></li>
                     </ul>
                
        </div>

    </header>

    

    <section id="First-section">
        <div class="container">
        
        <div class="barre"> <h2>Profitez De Nos Offres | Jusqu'a -40% </h2></div>

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
           
        <div class="container">
          <div class="placer">
            
            <div class="box">box1</div>
            <div class="box">box2</div>
            <div class="box">box3</div>
            <div class="box">box4</div>
        </div>
        </div>
      </section>


    <section id="fourth-section">
         <div class="titre">
            <h1>Les Plus Vendus </h1>
         </div>

        <div class="container">
            <div class="placer">
                <div class="box">box1</div>
                <div class="box">box2</div>
                <div class="box">box3</div>
                <div class="box">box4</div>
                <div class="box">box1</div>
                <div class="box">box2</div>
                <div class="box">box3</div>
                <div class="box">box4</div>
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