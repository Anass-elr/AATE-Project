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
    <style>
        .fdemande .demande h1 {
            text-align:center;
            margin-bottom: 20px;
        }

        .fdemande .demande table tr td{
          height:80px;
        }
        input[type="button"]{
       
       margin-top:6px;
         width:60%;
         height: 44px;
         background-color:rgb(255, 153, 0);
         border-radius: 4px;
         color: white;
         border: none;
         font-size: 15px;
         text-align: center;
         font-size:16px;
         margin-left:10%;
        padding-bottom:6px;         
     }

     input[type="button"]:hover{
            background-color:green;
        }
    
    </style>
    

</head>
<body>
  <?php require('header.php');?>

<div class="fdemande">
  <div class="demande">
        <h1>Demandes D'inscription </h1>
    <table >
       <tr class="firstcolor"> <th>ID</th><th>username</th> <th>Password</th> <th>Email</th>
           <th>Accepter/refuser</th>
    
    </tr>

    <?php
       foreach($res as $tab){

        ?>
           <tr>
           
       <td><?php echo $tab['Id'] ; ?></td>
       <td><?php echo $tab['username'] ; ?></td>
       <td><?php echo  $tab['password'] ; ?></td>
       <td><?php echo $tab['email']; ?></td>
     
           
    <?php $id=$tab['Id']; ?>
    <td> <input type="button" class="statistic" onClick="Ar(<?php echo $id; ?>)" name="delete" value="Confirmer"> </td>
              
     </tr>
      <?php 
         } 
       ?>

 
       

    </table>

 </div>
</div>

<script language="javascript">
    function Ar(id){

      swal({
          title: "Voulez vous Acceptez cette demande ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Demande Acceptez!", {
              icon: "success",
              timer:"1000"
            });
            window.location.href='AR.php?id='+id+'&AR=A';
            return true;
          } else {
            window.location.href='AR.php?id='+id+'&AR=R';
          }
        });
    
    }
</script>

</body>
</html>