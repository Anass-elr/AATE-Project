<?php
  require('verif-admin.php');
  require 'db.php';
  $DB=new DB("localhost","root","","e-commerce");

   $res=$DB->query("SELECT * from client");
   
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

<?php require('header.php');?>


<div class="fdemande">
  <div class="demande">
      
    <table >
       <tr class="firstcolor"> <th>ID</th><th>username</th> <th>Password</th> <th>Email</th>
           <th>Accepter/refuser</th>
    
    </tr>

<?php
foreach($res as $tab){
     echo "<tr>";
            echo " <td>".$tab['id_client'];  echo "</td>";
            echo " <td> Username:".$tab['username']; echo "</td>";
            echo " <td>  Password:". $tab['password']; echo "</td>";
            echo " <td> Email:".$tab['email'];  echo "</td>";
              $id=$tab['id_client'];
               echo " <td> <a href='AR.php?id=$id&SM=S'><div class=\"statisticc\">Supprimer</div></a>"; echo "</td>";
                
               echo "</tr>";
      }

    ?>

    
</table>

</div>
</div>

</body>
</html>