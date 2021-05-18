<?php
  require('verif-admin.php');
  require('db.php');
  $DB=new DB("localhost","root","","e-commerce");
  $Err1="";
  $Err="";

  function Sec($data){
    $data=isset($data) ? $data : '';
    return htmlspecialchars(trim($data));
 }

   if($_SERVER['REQUEST_METHOD']=='POST'){

     if(isset($_POST["idpr"]) || isset($_POST["idp"]) || isset($_POST["prix"])){
        $i=0;
        $T=array();
        

        $T[$i]=isset($_POST["idpr"]) ? $_POST["idpr"] : '';
        $T[++$i]=isset($_POST["idp"]) ? $_POST["idp"] : '';
        $T[++$i]=isset($_POST["prix"]) ? $_POST["prix"] : '';

        function Test_array($Tab){
          foreach($Tab as $input){
              if($input==''){ return true;}
          } 
          return false ;
      }
    
      if(Test_array($T)){
        $Err1="Entrez tous les Champs";
      }
   
      else{
              try{
                $req=$DB->connexion->prepare("INSERT INTO dispo_en(idpromo, id_P, prix)
                      VALUES(:T0,:T1,:T2)  ");
                    $req->bindParam(':T0',$T[0]);
                    $req->bindParam(':T1',$T[1]);
                    $req->bindParam(':T2',$T[2]);
                    $req->execute(); 
              }

              catch(PDOException $e){
                  echo $e->getMessage();
              }
        }

  }

  else {
    $i=0;
    $T=array();

    $T[$i]=Sec($_POST["idpromo"]) ;
    $T[++$i]=Sec($_POST["date"]) ;
    $T[++$i]=Sec($_POST["datefin"]);
  
    if($T[0]!='' && $T[1]!='' && $T[2]!=''){
        try{
        $req=$DB->connexion->prepare("INSERT INTO promotion(Id, date,date_fin)
                VALUES(:T0,:T1,:date_fin)  ");
          $req->bindParam(':T0',$T[0]);
          $req->bindParam(':T1',$T[1]);
          $req->bindParam(':date_fin',$T[2]);
          $req->execute(); 
        }

        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    else{
        $Err="Entrez tous les variable";
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


<section id="conn" class="separe">
  <div class="form">
        <h1>Entrez Un produit</h1>

   <form action="ajpr.php" method="POST" enctype="multipart/form-data">
       <label for="">ID Promo</label><input type="text" name="idpr"><br><br>
        <label for="">ID PRODUIT</label><input type="text" name="idp"><br><br>
        <label for="">Prix En Promo</label><input type="text"  name="prix"><br><br>
        <input type="submit" value="Submit Produit" >
    </form>
    <?php echo $Err1; ?>

    </div>

    </section>


    <section id="conn"  class="separe">
  <div class="form">
        <h1>Entrez Une promo</h1>
    <form action="ajpr.php" method="Post" enctype="multipart/form-data">
       <label for="">ID Promo</label><input type="text" name="idpromo"><br><br>
        <label for="">Date Debut</label><input type="text" name="date"><br><br>
        <label for="">Date Fin</label><input type="text" name="datefin"><br><br>
        <input type="submit" value="Ajouter Promo" >

    </form>

    <?php echo $Err; ?>

    </div>
    </section>
 
</body>
</html>