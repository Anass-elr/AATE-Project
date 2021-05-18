<?php
    require('verif-admin.php');
    require '_header.php';
     $res=$DB->connexion->query("SELECT * from t_client");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

    

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
           
            echo "<td>".$tab['Id']; echo "</td>";
            echo " <td>  ".$tab['username']; echo "</td>";
            echo " <td>  ". $tab['password']; echo "</td>";
            echo " <td>  ".$tab['email'];  echo "</td>";
              $id=$tab['Id'];
              
                echo " <td><a  href='AR.php?id=$id&AR=A'><div class=\"statisticc\">Accepter</div></a> "; 
                echo " <a href='AR.php?id=$id&&AR=R'><div class=\"statisticc refuser\">Refuser</div></a> </td>";
            echo "</tr>";
      }

    ?> 

    </table>

 </div>
</div>

</body>
</html>