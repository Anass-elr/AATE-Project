<?php
require('verif-admin.php');
require('db.php');
require('header.php');
$DB=new DB("localhost","root","","e-commerce");

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a{
            color:black;
        }
    </style>
</head>
<body>
  <div class="wrapper">

  <div id="nom">
      <input type="text" name="nom[]" class="nom" ><br>
      <input type="text" name="nom[]" class="nom" ><br>
  </div>

    <div id="pm">
        <a href="#" id="plus"><i class="fas fa-plus"></i>Add more</a>
        <a href="#" id="moins"><i class="fas fa-minus"></i> remove </a>
    </div>
</div>

</body>

<script src="script.js"></script>
</html>