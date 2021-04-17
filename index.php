<?php
   session_start();

   $_SESSION['name']="anass";
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

    <?php 
        $serveur="localhost";
        $login="root";
        $pass="";
       
        try{
           $connexion = new PDO("mysql:host=$serveur;dbname=e-commerce",$login,$pass);
            $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexion reussite";

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
          /*  
            $requete=$connexion->prepare("SELECT title,image from produit where marque='Sumsung'");
            $requete -> execute();
            $resultat=$requete -> fetchall();
                
            */
           

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

    <section id="First-section">
        <div class="container">

            <div class="box1">
              <h3>Categorie</h3>
              
              <ul>
                <li class="Dropdown" ><a href="electro.php">Electronique</a>
                        <ul class="ss">

                            <li class="Dropdown_tree"><a href="pc.php">PC</a>
                                <ul class="">
                                        <li><a href="dell.php">Dell</a></li>
                                        <li><a href="">Lenovo</a></li>
                                        <li><a href="">HP</a></li>
                                    </ul>
                            
                            </li>

                                 
                            <li class="Dropdown_two"><a href="tele.php">Telephone</a>
                                    <ul class="ss">
                                        <li><a href="sumsung.php">Sumsung</a></li>
                                        <li><a href="iphone.php">Iphone</a></li>
                                        <li><a href="xiaomi.php">Xiaomi</a></li>
                                    </ul>

                            </li> 
                            <li><a href="">Acessoirs</a></li>
                            <li><a href="">M&Q</a></li>
                        </ul>
                </li>

                    <li  class="Dropdown_four"><a href="vetem.php">Vetements</a>
                        <ul class="ss">
                            <li><a href="">Homme</a></li>
                            <li><a href="">Femme</a></li>
                         </ul>
                    </li>

                    <li   class="Dropdown_five"><a href="mb.php">Montre et Bijoux </a>
                        <ul class="ss">
                            <li><a href="">Montres</a></li>
                            <li><a href="">Bijoux</a></li>
                         </ul>
                
                    </li>
                    <li><a href=""> Categorie 1</a></li>
                    <li><a href=""> Categorie 2</a></li>
                </ul>
            </div>

            <div class="box2">
              <p>Adds</p>
            </div>

            <div class="box3">
                <p>Promotion</p>
            </div>


        </div>
    </section> 
    
    
    <section id="third-section">
        <div class="container">
          <div class="placer">
            <h1>Produit Tendence </h1>
            
            <div class="box">box1</div>
            <div class="box">box2</div>
            <div class="box">box3</div>
            <div class="box">box4</div>
        </div>
        </div>
      </section>


    <section id="fourth-section">
      <div class="container">
        <div class="placer">
            <h1>Les Plus Vendus </h1>
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


        <div class="contact">
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