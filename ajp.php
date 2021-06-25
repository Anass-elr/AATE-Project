<?php
     require('verif-admin.php');
     require('db.php');
     $DB=new DB("localhost","root","","e-commerce");
    $Err="";

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $i=0;
        $T=array();

        $T[$i]=isset($_POST["titre"]) ? $_POST["titre"] : '';
        $T[++$i]=isset($_POST["desc"]) ? $_POST["desc"] : '';
        $T[++$i]=isset($_POST["marque"]) ? $_POST["marque"] : '';
        $T[++$i]=isset($_POST["genre"]) ? $_POST["genre"] : '';
        $T[++$i]=isset($_POST["couleur"]) ? $_POST["couleur"] : '';
        $T[++$i]=isset($_POST["prix"]) ? $_POST["prix"] : '';
        $T[++$i]=isset($_POST["qq"]) ? $_POST["qq"] : '';
        

        if($_FILES['f1']['tmp_name'] <> ''){
            $T[++$i]=addslashes(file_get_contents($_FILES['f1']['tmp_name']));
        }
        else{
            $T[++$i]= $_FILES['f1']['tmp_name']='';
        }

        $categorie=isset($_POST["categorie"]) ? (int)$_POST["categorie"] : '';

        function Test_array($Tab){
            foreach($Tab as $input){
                if($input==''){ return true;}
            } 
            return false ;
        }


        if(Test_array($T)){
             $Err="Entrez tous les Champs";
        }
        
     else{
       try{

                
          $req=$DB->connexion->prepare("INSERT INTO produit(title,description,marque,genre,couleur,prixAchat,qte_stock,image)
                  VALUES('$T[0]','$T[1]','$T[2]','$T[3]','$T[4]','$T[5]','$T[6]','$T[7]' ) ");
                   $req->execute();

                
                  $idp=$DB->connexion->lastInsertId();
                  echo $idp;var_dump($categorie);
                  $req=$DB->connexion->prepare("INSERT INTO de_ (id_P,id_cat)
                            VALUES($idp,$categorie) ");
                   $req->execute();

        }



       catch(PDOException $e){
           echo $e->getMessage();
       }
        
    }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #conn{
            min-height:1000px;
        }

        form textarea{
            color:black;
        }

        form input[type="file"]{
            height:40px;
            background-color:blue;
            width:20%;
        }

    </style>
</head>
<body>

<?php require('header.php'); ?>

  
<section id="conn">
  <div class="form">
        <h1>Entrez Un produit</h1>

     <form action="ajp.php" method="POST" enctype="multipart/form-data">
       <label class="noir">Titre</label><input type="text" name="titre"><br><br>
        <label  class="noir" >Description</label><textarea name="desc"></textarea><br><br>
        <label  class="noir">Marque</label><input type="text"  name="marque"><br><br>
        <label  class="noir">Genre</label><input type="text" name="genre"><br><br>
        <label class="noir" >Couleur</label><input type="text" name="couleur"><br><br>
        <label  class="noir">Prix</label><input type="text" name="prix"><br><br>
        <label  class="noir">Quantité</label><input type="text" name="qq"><br><br>
        <label  class="noir">Image</label><input type="file" name="f1" /><br><br>
        <label  class="noir">Numero de Categorie</label><input type="text" name="categorie[]"  value="3" /><br><br>

        <input type="submit" value="Submit" >
    </form>
      <?php echo $Err ; ?>

      </div>

    </section>

  
    
</body>
</html>