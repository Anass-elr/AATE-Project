<?php
 require '_header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
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
            $last_id = $connexion->lastInsertId();

            $sql=$connexion->prepare("SELECT id_P,prixAchat,title,image
                        from produit
                        ORDER BY Qv DESC
                        limit 10
                        ;");
            $sql->execute();
            $res11=$sql->fetchall();

             if($_SERVER["REQUEST_METHOD"]=="POST"){
                $nom=$_POST["nom"];
                $prenom=$_POST["prenom"];
                $email=$_POST["email"];
                $message=$_POST["message"];

                $sql=$connexion->prepare(" INSERT INTO message(id_V,nom,prenom,email,message) 
                      values($last_id,'$nom','$prenom','$email','$message');
                ;");
                  $sql->execute();
            }

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
                                echo  substr($res[$ind]['title'], 0, 18).'...';
                                            
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
         <span>  Les Plus Populaires </span>
           
           
        <div class="containerr" >
            
          <div class="placer" data-flickity='{ "groupCells": true }' >
              
          <?php 
                 $id=0;
                 foreach($res1 as $ind=>$val){
                      $id=$res1[$ind]['id_P'];
                    echo '<div class="box">';
                    echo "<a href='achat.php?id=$id'>";
                        echo '<img src="data:image;base64,'.base64_encode($res1[$ind]['image']).'" style="width:100%; height:80%;">';
                            
                            echo   "<h4>";
                            echo substr($res1[$ind]['title'],0,18).'...';
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
    
            <span> Les Plus Vendue  </span>
         

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
                            echo substr($res11[$ind]['title'],0,18).'...';
                                            
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



     <section id="categ">
        <h2> Nos Categories </h2>
         <div class="container">
        
          <div class="ncategorie">
          
                <a href="affprod.php?idc=5"> <div> <i class="fas fa-mobile-alt  fa-3x "></i>  <label>Telephone<label>   </div></a>
                <a href="affprod.php?idc=1"> <div> <i class="fas fa-bolt fa-3x" ></i>  <label>Electronique<label> </div></a>
                <a href="affprod.php?idc=3"> <div> <i class="fas fa-running fa-3x"></i> <label>sport et Loisires<label> </div></a>

                <a href="affprod.php?idc=2"> <div><i class="fas fa-tshirt fa-3x" ></i> <label>Vetements<label></div></a>
                <a href="affprod.php?idc=20"> <div> <i class="fas fa-first-aid fa-3x"></i><label>Beauté et santé<label> </div></a>
                <a href="affprod.php?idc=4"> <div> <i class="fas fa-gem fa-3x" ></i> <label>Montre et bijoux<label> </div></a>
              
             </div>
         </div>
      </section>


    <section id="fifth-section">
        <div class="container">
            <div class="about-us">
                <h2>A propos de Nous</h2>
                <p>Découvrez Notre boutique d'achat et vente en ligne au Maroc, 
                    des produits spécialement sélectionnés pour vous ! Sur Fshop,
                     nous vous proposons un large choix de produits parmi
                      les plus grandes marques aux meilleurs prix, 
                      d'une qualité exceptionnelle et contrôlée :
                       des smartphones, des smart TV 32 pouces, 
                       des TV Samsung 4K et QLed, des pc portables pas chers,
                        des parfums Homme & Femme, pour n'en citer que quelques-uns. 
                        Retrouvez la liste de nos meilleures marques 
                        en faisant un tour sur notre site de vêtements en ligne,
                         des chaussures Adidas et Nike, des produits de beauté Dermacol 
                         et Yves Rocher ainsi que notre catégorie Parapharmacie ! 
                         La mode est enfin accessible pour les hommes, 
                         les femmes et les enfants en un seul endroit! 
                </p>
            </div>


    

        <div class="contact"  id="fin">
            <h2>Contacter Nous</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                 <label>Nom &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label> <input type="text" name="nom"><br>
                 <label>Prenom  &nbsp&nbsp&nbsp</label> <input type="text" name="prenom" ><br>
                 <label>E-mail  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label> <input type="text" name="email"><br>
                 <label>Message   &nbsp&nbsp</label>
                 <textarea name="message"></textarea><br>
                <input type="submit" onClick="envoyer()" value="submit" name="Envoyer">
            </form>
           
        </div>
        </div>


    </section>
   

    <footer>
        <div class="container">
            <h3>Merci pour vote visite </h3>
        </div>
    </footer>

<script language="javascript">
    function envoyer(){
        swal({
        title:"Message envoyeé !",
        icon:"success",
        buttons:"Ok",
        timer:"3500"
        }) 
 }
 </script>
    
</body>
</html>