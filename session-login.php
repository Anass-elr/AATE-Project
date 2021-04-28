<?php 


$serveur="localhost";
$loginn="root";
$password=""; 

  $login= isset($_POST['login']) ? $_POST['login'] : '';
  $pass= isset($_POST['pass']) ? $_POST['pass'] : '';

try{
   $connexion = new PDO("mysql:host=$serveur;dbname=e-commerce",$loginn,$password);
    $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    //$sql="SELECT password from client where username='$username ;";

    $reqq=$connexion->prepare("SELECT password from client where username='$login' ;");
    $reqq->execute();
    $ress=$reqq->fetchall();
 }

catch(PDOException $e){
   echo $e->getMessage();
}

 if($login==''){
        header('Location: conn.php?error=1');
    }

  elseif($pass != $ress['0']['password'])  {
        header('Location: conn.php?error=2&password');
    }
    else{
        session_start();
        $_SESSION['login']=$login;
        $_SESSION['password']=$pass;
        $_SESSION['logged']=true;

        header('Location: indexx.php');
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