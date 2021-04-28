<?php 



   $username=isset($_POST['username']) ? $_POST['username']  : '';
    $password=isset($_POST['pass']) ? $_POST['pass'] : '';
    $email=isset($_POST['email']) ? $_POST['email'] : '';


  if( $username=='' ||  $password=='' ||  $email==''){
        header('location: insc.php?message=1');
    }

  else{

        try{

            $serveur="localhost";
             $login="root";
            $pass="";

            $connexion = new PDO("mysql:host=$serveur;dbname=e-commerce",$login,$pass);
             $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
             $req=$connexion->prepare("
                             INSERT INTO client(username,password,email) 
                                 VALUES(:username,:password,:email)");
         
                         $req->bindParam(':username',$username);
                         $req->bindParam(':password',$password);
                         $req->bindParam(':email',$email);
         
                         $req->execute();
               
         }
         
         catch(PDOException $e){
            echo $e->getMessage();
         }
    
         header("Location: conn.php?message=2"); 
       
     }

?>