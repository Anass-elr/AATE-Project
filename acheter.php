<?php
   session_start();
   if(!isset($_SESSION['logged']) ||  !$_SESSION['logged'] ){
        header('Location: conn.php?error=3');
    }
   require '_header.php';
    
  
   $Err='';
    if($_SERVER['REQUEST_METHOD']=='POST'){
       $login=$_SESSION['login'];
       $tab=$DB->query("SELECT id_client from client where username='$login' ");
       $idc=$tab['0']['id_client'];

       $mot=isset($_POST['pass']) ? htmlspecialchars($_POST['pass']) : '';

       if( $mot != ''){
            if(preg_match("/^[0-9]*$/",$mot)){
                 $res=$DB->query("SELECT * from carte where id_client=$idc and motdepasse='$mot'");
                    if(!empty($res)){
                        if($res['0']['somme'] < $_SESSION['somme'] ){
                            $Err='Votre Solde est insufisent';
                        }
                        else{
                            $s=$_SESSION['somme'];
                            // Modifier la table carte
                                $res=$DB->connexion->prepare(" Update carte set somme=somme-$s 
                                        where id_client='$idc' and motdepasse='$mot' ;
                                    ");
                                $res->execute();
                            // Modifier la table commande
                                $q=$panier->calculer();
                               /* $res=$DB->connexion->prepare(" Update client SET nop=nop+1, somme=somme+$s , nb_produit=nb_produit+$q
                                    where id_client=$idc;");
                                $res->execute(); */

                                $res=$DB->connexion->prepare(" INSERT INTO commande(id_client,prixTotal) VALUES($idc,$s);");
                                $res->execute();

                                $last_id = $DB->connexion->lastInsertId();
                                $idTab=array_keys($_SESSION['panier']);
                            
                            foreach($idTab as $ind){
                               $qq=$_SESSION['panier'][$ind];
                                $res=$DB->connexion->prepare(" INSERT INTO contenir(id_comd,id_P,quantite) 
                                    VALUES($last_id,$ind,$qq);");
                                $res->execute();
                            }

                            //Modifier La table produit
                            $tab=array_keys($_SESSION['panier']);
                                foreach($tab as $ind){
                                    $val=$_SESSION['panier'][$ind];
                                $res=$DB->connexion->prepare(" Update produit SET Qv=Qv+$val,qte_stock=qte_stock-$val
                                    where id_P=$ind ;");
                                    $res->execute();
                                }
                            $_SESSION['Valider']=True;
                            header("Location: fact.php?c=1"); 
                        }

                    }
                    else {  $Err="Le code est faux ";}
                }
                    else{
                        $Err="Le code est invalide";
                    }
                }

                else{
                   $Err="Entrez un Code";
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
       #conn .form h2{
            font-size:26px;
            margin-left:10px;
            margin-bottom:10px;
        }
    </style>
</head>
<body>

<?php require('header.php'); ?>

    <section id="conn">
        <div class="form">
        <h2>Entrez le code de votre carte</h2>
  <form action="acheter.php"  method="POST">
        <input type="password" name="pass" placeholder=""><br>
      <!--  <input type="radio" name="achat"><label for="">Livraison à domicile</label> <br>
        <label for=""> </label><input type="radio" name="achat"><label for=""> Passer au store</label> <br> -->
        <input type="submit" value="Envoyer">
         <?php echo $Err; ?>
  </form>

  </div></section>

 
</body>
</html>