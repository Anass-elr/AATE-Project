<?php
     require('verif-admin.php');
     require '_header.php';
       $res=$DB->query("SELECT * FROM categorie ;") ;

       
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
            
              width:30%;
              height: 50px;
              background-color:rgb(255, 153, 0);
              border-radius: 4px;
              color: white;
              border: none;
              font-size:15px;
              text-align: center;
              font-size:16px;
              margin-left:34%;
             
              margin-bottom:10px;
              position:relative;
              top:-26px;
              
                           
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
        <h1>Les Catégories</h1>
    <table >
       <tr class="firstcolor"> <th>Id Categorie</th>  <th>Categorie</th>
          
    
    </tr>

    <?php
       foreach($res as $tab){
       
    ?>
    <tr>
          <td><?php echo $tab["id_cat"] ; ?></td>
          <td><?php echo $tab["libelle"] ; ?></td>
                
      <?php 
         } 
         ?>
     </tr>
    
</table>

 </div>
</div>
     <input type="button" value="Ajouter une Catégorie" name="" onClick="add()"> 
</body>

<script language="javascript">
    function add(id){

         swal({
          title: "Voulez vous ajouter une catégorie ? ",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Vueillez patientez!", {
              icon: "success",
            });
            window.location.href='ajc.php';
            return true;
          }
        });
    }
</script>
</html>