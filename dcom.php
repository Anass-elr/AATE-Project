<?php
     require('verif-admin.php');
     require '_header.php'; 
     $id=$_GET['id'];     
     $idc=$DB->query("SELECT id_comd from commande where id_comd=$id");
      
     
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
          height:50px;
        }

        .fdemande .demande table tr td{
            height:70px;
        }

        .fdemande .demande .t1{
            width:40%;
         
        }

        .fdemande .demande table tr td,.fdemande .demande table tr th{
            text-align:center;
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
              padding-bottom:4px;         
        }
     </style>
</head>
<body>
<?php require('header.php');?>

<div class="fdemande">
  <div class="demande">
    <?php 
         if(count($idc)>0){
            $idcomd=$_GET['id'];
           
            $res1=$DB->query("SELECT * from commande where id_comd=$idcomd");
             $res2=$DB->query("SELECT P.title,C.quantite,P.prixAchat*C.quantite 
             from Produit P,contenir C,commande M 
              where C.id_P=P.id_P and C.id_comd=M.id_comd and M.id_comd=$idcomd ;");
    ?>
        <h1>Details </h1>
    <table class="t1">
       <tr class="firstcolor"> <th>Id Commande</th> <th>Client</th><th>Date  </th>  <th>Prix(DH)</th> </tr>
          <tr>
            <?php 
               foreach($res1 as $tab){
                   foreach($tab as $val){
                ?>
               <td><?php echo $val ;?> </td>
             
             <?php 
                   }
               }
               ?>
            </tr>
          

   </table>  
   <br>


   <table class="t2">
       <tr class="firstcolor"> <th>Produit</th> <th> quantité </th> <th>Prix</th> 
     

         <?php 
            foreach($res2 as $tab){
               echo "<tr>";
                foreach($tab as $val){
          ?>
            
             <td> <?php echo $val; ?></td>
             
             <?php 
                } 
                echo "</tr>";
             }
             ?>
            </tr>
           

   </table>

 </div>
</div>
<?php 

            }
            else {
                echo "SVP CHOISISSEZ UNE COMMANDE";
            }
            ?>
</body>
</html>