
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
       
        <form action="test-insc.php"  method="POST">
           Username  &nbsp       <input type="text" name="username"><br>
           Password &nbsp &nbsp    <input type="password" name="pass"><br>
           Email  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp<input type="text" name="email"><br>
           Adresse &nbsp &nbsp    <input type="text" name=""><br>
           Nom &nbsp &nbsp    <input type="text" name=""><br>
           Prenom &nbsp &nbsp    <input type="text" name=""><br>
           N'tele &nbsp &nbsp    <input type="text" name=""><br>

            <input type="submit" value="S'inscrire">
        
        </form>
    </div>

    </section>

        <?php 
         $message=isset($_GET['message']) ? $_GET['message'] : '';
           if($message==1){
                 echo "<b>Saisire tous les champs svp</b>";
           }
        ?>

  </div>



</body>
    </html>