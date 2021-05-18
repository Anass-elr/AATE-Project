<?php 
  
  require('verif-admin.php');
  $serveur="localhost";
  $login="root";
  $pass="";
 
  try{
      $connexion = new PDO("mysql:host=$serveur;dbname=e-commerce",$login,$pass);
      $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $req=$connexion->prepare("SELECT id_P,comp FROM produit ORDER BY comp desc ;");
      $req->execute();
      $data1='';
      $data2='';
      while($row=$req->fetch()){
        $data1 =$data1 .','.$row["id_P"];
        $data2 =$data2 .','.$row["comp"];
      }

     $data1=trim($data1,","); 
     $data2=trim($data2,","); 

     $req=$connexion->prepare("SELECT id_P,Qv FROM produit ORDER BY Qv desc ;");
      $req->execute();
      $data11='';
      $data22='';
      while($row=$req->fetch()){
        $data11 =$data11 .','.$row["id_P"];
        $data22 =$data22 .','.$row["Qv"];
      }

     $data11=trim($data11,","); 
     $data22=trim($data22,","); 
 
  }

  catch(PDOException $e){
    echo $e->getMessage();
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
       
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js" 
      integrity="sha512-VMsZqo0ar06BMtg0tPsdgRADvl0kDHpTbugCBBrL55KmucH6hP9zWdLIWY//OTfMnzz6xWQRxQqsUFefwHuHyg==" 
      crossorigin="anonymous">
    </script>
    
   
</head>


<body>
<?php require('header.php');?>

 <div class="stat">
   <a href="client.php" > <div class="statistic"><span>Statistique Sur Client<span></div></a>
  <a href="general.php"> <div  class="statistic"><span>Statistique General <span></div></a> 
</div>

<div class="pere">


 <div class="containner">
    <h3>Le nombre de Visite Par produit</h3>
     <canvas id="myChart" width="500px" height="350px"></canvas>
     
  </div>


  
  <div class="containner">
    <h3>Les statistique du vente</h3>
     <canvas id="Chart" width="500px" height="350px"></canvas>
  </div>

  
  
        
</div>
    
</body>
</html>

<script>
 
var ctx = document.getElementById('myChart').getContext('2d');

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $data1 ; ?>],
        datasets: [{
            label: 'NVPP',
            data: [<?php echo $data2 ; ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }, 
        title: {
          display: true,
          text: 'Le nombre de Visite Par produit',
        }
    }
});


var ctx = document.getElementById('Chart').getContext('2d');
/*
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';
*/
var Chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $data11 ; ?>],
        datasets: [{
            label: 'NAPP',
            data: [<?php echo $data22 ; ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }, 
        title: {
          display: true,
          text: 'Le nombre de Visite Par produit',
        }
    }
});





</script>