<?php
     require('verif-admin.php');
     require '_header.php';
     $res=$DB->query("SELECT id_P,title,marque,prixAchat,qte_stock
        FROM Produit order by qte_stock asc") ;

        
       if( isset($_GET['id']) ){
            $id_p=$_GET['id'];
            $DB->queryy("DELETE FROM produit where id_P=$id_p") ;
            header('Location: produit.php');
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
    <style>
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
    </style>
</head>
<body>
  <?php require('header.php');?>

<div class="fdemande">
  <div class="demande">
        <h1>Demandes D'inscription </h1>
    <table >
       <tr class="firstcolor"> <th>ID</th><th>Produit</th> <th>Marque </th> <th>Prix Achat</th>
           <th>Stock</th> <th> Supprimer</th>
    </tr>

    <?php
       foreach($res as $tab){
            $idp=$tab['id_P'];
        echo "<tr>";
           
            foreach($tab as $val){
        ?>
          
           
          <td><?php echo $val ; ?></td>
                
      <?php 
         } 
         ?>
         <td> <input type="button" class="statistic" onClick="sup(<?php echo $idp; ?>)" name="delete" value="Supprimer"> &nbsp 
        
       </tr>
          <?php
        }
       ?>
       

 
    

    </table>

 </div>
</div>
</body>
<script language="javascript">
    function sup(id){

         swal({
          title: "Voulez vous supprimez ce produit ? ",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Vueillez patientez!", {
              icon: "success",
            });
            window.location.href='produit.php?id='+id;
            return true;
          }
        });
    }
</script>
</html>