<?php 

 function Sec($data){
     $data=isset($data) ? $data : '';
     return htmlspecialchars(trim($data));
  }
   
   
  $v=array();
   $v[1]=Sec($_POST['username']);
   $v[2]=Sec($_POST['pass']);
   $v[3]=Sec($_POST['email']);
   $v[4]=Sec($_POST['adresse']);
   $v[5]=Sec($_POST['nom']);
   $v[6]=Sec($_POST['prenom']);
   $v[7]=Sec($_POST['tele']);
  

    
    function test_vide($T){
      foreach($T as $val){
        if($val==""){ return true;}
      }
      return false;
    }

   
   if( test_vide($v) ){
         header('location: insc.php?message=1');
    }

    elseif( !filter_var($v[3],FILTER_VALIDATE_EMAIL) || !preg_match("/^[a-zA-Z ]*$/",$v[5]) || 
         !preg_match("/^[a-zA-Z]*$/",$v[6]) || !preg_match("/^[0-9 ]*$/",$v[7]) ){

        header('location: insc.php?message=2');
    }

   else{

       

        try{

            $serveur="localhost";
            $login="root";
            $pass="";

            $connexion = new PDO("mysql:host=$serveur;dbname=e-commerce",$login,$pass);
             $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
             $req=$connexion->prepare("
                      SELECT * from client where username='$v[1]'
               ");
             $req->execute();
             $res=$req->fetch(PDO::FETCH_NUM);

             
             
             if( count($res) != 1 ){
                 header('location: insc.php?message=3');
                   exit;
             }


             $req=$connexion->prepare("
                           SELECT * from client where email='$v[3]'
                  ");
             $req->execute();
             $res=$req->fetch();

             

             if(count($res) != 1){
                header('location: insc.php?message=4');
                exit;
          }
           

             $req=$connexion->prepare("
                             INSERT INTO t_client(username,password,email,prenom,nom,tele,adresse) 
                                 VALUES(:username,:password,:email,:prenom,:nom,:tele,:adresse) ");
         
                         $req->bindParam(':username',$v[1]);
                         $req->bindParam(':password',$v[2]);
                         $req->bindParam(':email',$v[3]);

                         $req->bindParam(':prenom',$v[6]);

                         $req->bindParam(':nom',$v[5]);
                         $req->bindParam(':tele',$v[7]);

                         $req->bindParam(':adresse',$v[4]);
         
                         $req->execute();
               
         }
         
         catch(PDOException $e){
            echo $e->getMessage();
         }
    
       header("location: conn.php?message=2"); 
       
     }

?>