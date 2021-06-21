<?php
     require('verif-admin.php');
     require '_header.php';
       $res=$DB->query("SELECT * FROM commande order by date_cmd desc") ;

       if( isset($_GET['id']) ){
          $id_c=$_GET['id'];
          $DB->queryy("DELETE FROM commande where id_comd=$id_c") ;
          header('Location: commande.php');
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
       .lien{
           color:black;
       }
        .fdemande .demande h1 {
            text-align:center;
            margin-bottom: 20px;
        }

       

        .fdemande .demande table tr td{
          height:30px;
        }

        .fdemande .demande table tr td,.fdemande .demande table tr th{
            text-align:center;
        }

        input[type="button"]{
              margin-top:6px;
              width:60%;
              height: 36px;
              background-color:rgb(255, 153, 0);
              border-radius: 4px;
              color: white;
              border: none;
              font-size: 15px;
              text-align: center;
              font-size:16px;
              margin-left:10%;
              padding-bottom:8px;  
              margin-bottom:6px;        
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
        <h1>Demandes D'inscription </h1>
    <table >
       <tr class="firstcolor"> <th>Id Commande</th><th>Id client</th> <th>date commande </th> <th>Prix Total (en DH)</th>
           <th>Accepter/refuser</th>
    
    </tr>

    <?php
       foreach($res as $tab){
        echo "<tr>";
           $idc=$tab['id_comd']; 
            foreach($tab as $val){
        ?>
          
           
          <td><?php echo $val ; ?></td>
                
      <?php 
         } 
         ?>
         <td>
           <input type="button" class="statistic" onClick="supprimer(<?php echo $idc; ?>)" name="delete" value="Supprimer"> &nbsp   &nbsp 
           <a class="lien" href="dcom.php?id=<?php echo $idc; ?>"> <abbr title="Plus d'information"><i class="fas fa-angle-double-right"></i> </abbr> </a></td>
       </tr>
          <?php
        }
       ?>
       

 
    

    </table>

 </div>
</div>
</body>

<script language="javascript">
    function supprimer(id){

         swal({
          title: "Voulez vous supprimez cette commande ? ",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Vueillez patientez!", {
              icon: "success",
            });
            window.location.href='commande.php?id='+id;
            return true;
          }
        });
    }
</script>
</html>