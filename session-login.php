<?php 
  $login= isset($_POST['login']) ? $_POST['login'] : '';
  $pass= isset($_POST['pass']) ? $_POST['pass'] : '';

    if($login==''){
        header('Location: conn.php?error=1');
    }
    elseif($pass != "toto")  {
        header('Location: conn.php?error=2&password='.$pass);
    }
    else{
        session_start();
        $_SESSION['login']=$login;
        $_SESSION['password']=$pass;
        $_SESSION['logged']=true;

        header('Location: sess-bienvenue.php');
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