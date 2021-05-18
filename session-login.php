<?php 


$serveur="localhost";
$loginn="root";
$password=""; 
  
 function Sec($data){
     return htmlspecialchars(trim($data));
 }

 
 $v1=Sec($_POST['login']);
 $v2=Sec($_POST['pass']);

  $login= isset($v1) ? $v1: '';
  $pass= isset($v2) ? $v2 : '';

try{
   $connexion = new PDO("mysql:host=$serveur;dbname=e-commerce",$loginn,$password);
    $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    //$sql="SELECT password from client where username='$username ;";

    $reqq=$connexion->prepare("SELECT password from client where username='$login' ;");
    $reqq->execute();
    $ress=$reqq->fetch();

}

catch(PDOException $e){
   echo $e->getMessage();
}

 $login_root="root";
 $pass_root="root21";

  
  if($login=='' || $pass==''){
         header('Location: conn.php?error=1');
    }
  elseif ($login==$login_root && $pass==$pass_root) {
        session_start();
        $_SESSION['root']=True;
        $_SESSION['login']=$login_root;
        $_SESSION['password']=$pass_root;
        $_SESSION['logged']=true;
        header("Location: root.php?a=1");
    }

  elseif(empty($ress)  || $pass != $ress['password'])  {
        header('Location: conn.php?error=2&password');
    }
    else{
        session_start();
        $_SESSION['login']=$login;
        $_SESSION['password']=$pass;
        $_SESSION['logged']=true;
        $aip=$_SESSION['idp'];

        $reqq=$connexion->prepare("SELECT id_V from visiteur where adresseip='$aip' ;");
        $reqq->execute();
        $ress=$reqq->fetch(PDO::FETCH_ASSOC);
        $ress=$ress['id_V'];

        $reqq=$connexion->prepare("UPDATE client SET id_V=$ress where username='$login' ");
        $reqq->execute();
        

        header('Location: index.php');
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
    
</body>
</html>