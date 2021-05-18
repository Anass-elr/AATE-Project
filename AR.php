<?php
    require('verif-admin.php');
    require 'db.php';
    $DB=new DB("localhost","root","","e-commerce");
    $us=$pass=$email="";
    $pr=$_SERVER['HTTP_REFERER'];
      $id=$_GET["id"];

    if(isset($_GET['id']) && isset($_GET['AR'])){
        if($_GET['AR']=="A"){
          
            $res=$DB->query("SELECT * from t_client where Id=$id ");
              $us=$res['0']['username'];
              $pass=$res['0']['password'];
              $email=$res['0']['email'];
              $prenom=$res['0']['prenom'];
              $nom=$res['0']['nom'];
              $tele=$res['0']['tele'];
              $adresse=$res['0']['adresse'];

            
            $DB->queryy(" INSERT INTO client(username,password,email,prenom,nom,adresse,tele) 
                VALUES('$us','$pass','$email','$prenom','$nom','$adresse','$tele') ");  

           $DB->queryy(" DELETE FROM t_client where Id=$id; ");  
           header("Location: $pr?e=0");
           exit;

        }
        elseif($_GET["AR"]=="R") {
           $DB->queryy(" DELETE FROM t_client where Id=$id ");  
           header("Location: $pr?e=0");
           exit;
        }
    }
    elseif(isset($_GET['id']) && isset($_GET['SM'])){
      if($_GET['SM']=='S'){
        $DB->queryy(" DELETE FROM client where id_client=$id; ");  
           header("Location: $pr?e=0");
           exit;
      }
    }

?>