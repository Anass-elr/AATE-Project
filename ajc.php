<?php
        require('verif-admin.php');
        require '_header.php';
             $lib="";
             $Err="";
        if($_SERVER["REQUEST_METHOD"]=="POST"){
                if(empty($_POST["lib"])){
                 $Err="Ajoutez le champ libelle <br>";
                }
                else{
                    $lib=$_POST["lib"];
                     if( !preg_match("/^[a-zA-Z]*$/",$lib) ){
                        $Err="Entrez une libelle categorie valide <br>";
                     }
                }
        
        
                if(empty($Err) ){
                  $res=$DB->query("SELECT * from categorie where libelle='$lib' ; ");
                    if(!empty($res)){
                        $Err="Catégorie existe déjà";
                    }
             else{
                $DB->queryy("INSERT INTO categorie(libelle) values('$lib') ");
                $ok="Catégorie Ajouter avec Succès" ;
               
              
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
</head>
<body>
<?php require('header.php'); ?>

    <section id="conn">
        <div class="form">
              <h1>Ajoutez une catégorie</h1>
              <br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
              

         <label>Libelle de categorie : </label>
           <br><input type="text" name="lib" > <br>

            <input type="submit" value="Ajouter" nom="ajouter">
              
            </form>
            <label for=""><b><?php if($Err) echo $Err;  elseif(isset($ok)) echo $ok; ?></b></label>
         
       </div>
    </section>




  
   
</body>
</html>
    
</body>
<script language="javascript">
 
</script>
</html>