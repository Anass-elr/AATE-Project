<?php
    require('verif-admin.php');
    require '_header.php';
     $res=$DB->connexion->query("SELECT idm,nom,prenom,email,message FROM message ;");

        if(isset($_GET['idm'])){
            $idm=$_GET['idm'];
     
            $req=" DELETE FROM message where idm=$idm ";
            $DB->queryy($req);
            header('Location: message.php');
            exit;
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .fdemande .demande table tr td:last-child{
            padding:10px 0px;
        }

        .fdemande .demande table tr td{
            height:60px;
        }

        .fdemande .demande h1 {
            text-align:center;
            margin-bottom: 20px;
        }


        input[type="button"]{
              margin-top:6px;
              width:40%;
              height: 42px;
              background-color:rgb(255, 153, 0);
              border-radius: 4px;
              color: white;
              border: none;
              font-size: 15px;
              text-align: center;
              font-size:16px;
              padding-bottom:2px;  
              margin-bottom:6px;        
        }

        input.supp{
            background-color:red;
        }

        input.repo{
            background-color:green;
        }

        input[type="button"]:hover{
            background-color:rgb(255, 153, 0);
        }

    </style>
</head>
<body>
  <?php require('header.php');?>

<div class="fdemande">
  <div class="demande">
 
       <h1> Boite Message </h1>
          
	 			
    <table >
       <tr class="firstcolor"> <th>Nom</th><th>Prenom</th> <th>	Email</th> <th>Message</th>
           <th>Supprimer/Répondre</th>
    
    </tr>

    <?php
       foreach($res as $tab){
           echo "<tr>";
           
            echo "<td>".$tab['nom']; echo "</td>";
            echo " <td>  ".$tab['prenom']; echo "</td>";
            echo " <td>  ". $tab['email']; echo "</td>";
            echo " <td>  ".$tab['message'];  echo "</td>";
              $id=$tab['idm'];
            
              
              /*
                echo " <td><a  href='AR.php?id=$id&AR=A'><div class=\"statisticc\">Accepter</div></a> "; 
                echo " <a href='AR.php?id=$id&&AR=R'><div class=\"statisticc refuser\">Refuser</div></a> </td>";*/
          
    ?> 
            <td>
        <input type="button" class="supp" name="supprimer"  value="Supprimer" onClick="supprimer(<?php echo $id; ?>)" >
        <input type="button"  class="repo" value="Répondre" onClick="repondre(<?php echo $id; ?>)" >
      </td>
        </tr>

       <?php
          } 
       ?>

    </table>

 </div>
</div>
    <script language="javascript">
         function supprimer(id){

                swal({
                title: "Voulez Vous Supprimez Ce Message ? ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    swal("Message Supprimer!", {
                        icon: "success",
                    });
                    window.location.href='message.php?idm='+id;
                    return true;
                }
                else{
                    swal("Suppression Annuler !", {
                        icon: "info",
                    });   
                }
                });
            }


            function repondre(id){

                        swal({
                        title: "Voulez Vous Répondez a ce  Message ? ",
                        icon: "question",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {
                            swal("Message Supprimer!", {
                                icon: "success",
                            });
                            window.location.href='email.php?id='+id;
                            return true;
                        }
                        else{
                            swal("Suppression Annuler !", {
                                icon: "info",
                            });   
                        }
                        });
                 }
    </script>
</body>
</html>