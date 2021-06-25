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
    <style type="text/css">  
       
       .fdemande .demande table tr td{
            height:40px;
            text-align:center;
        }

        .fdemande .demande table tr th{
          text-align:center;
        }

        .fdemande .demande h1 {
            text-align:center;
            margin-bottom: 20px;
        }

        
input[type="button"]{
       
       margin-top:6px;
         width:50%;
         height: 40px;
         background-color:rgb(255, 153, 0);
         border-radius: 4px;
         color: white;
         border: none;
         font-size: 15px;
         text-align: center;
         font-size:16px;
         margin-left:10%;
          padding-bottom:8px;         
     }

     input[type="button"]:hover{
            background-color:red;
        }
     </style>
</head>
<body>

<?php require('header.php');?>


<div class="fdemande">
  <div class="demande">
      <h1>Liste De Clients</h1>
    <table >
       <tr class="firstcolor"> <th><i class='fas fa-user-circle fa-2x'></i> ID</th><th>username</th> <th>Password</th> <th>Email</th>
           <th>Accepter/refuser</th>
    
    </tr>

<?php
foreach($res as $tab){
    ?>
    <tr>
        <td><i class='fas fa-user-circle fa-2x'></i> &nbsp;<?php echo $tab['id_client'];?></td> 
           <td>  <?php echo $tab['username']; ?> </td>
            <td>  <?php echo $tab['password'];?> </td>
            <td>  <?php echo $tab['email'];?> </td>
             <?php $id=$tab['id_client']; ?>
              <!--<td> <a href='AR.php?id=$id&SM=S'><div class="statisticc">Supprimer</div></a></td>-->
            <td> <input type="button" class="statistic" onClick="supprimer(<?php echo $id; ?>, 'S')" name="delete" value="Supprimer"> </td>
              </tr>
     <?php 
         } 
      ?> 
    
</table>

</div>
</div>
<script language="javascript">
    function supprimer(id,s){

         swal({
          title: "Voulez vous supprimez ce utilisateur ? ",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Vueillez patientez!", {
              icon: "success",
            });
            window.location.href='AR.php?id=' +id+'&SM=' +s+'';
            return true;
          }
        });
    }
</script>
</body>
</html>

