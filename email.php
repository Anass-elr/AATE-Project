<?php
        require('verif-admin.php');
        require '_header.php';
     
        if( isset($_GET['id']) ){
            $id=$_GET['id'];
            $sql="SELECT email from message where idm=$id";
            $res=$DB->query($sql);
            $email=$res[0]['email'];

            
            
                 
          
               
            
        }
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
<?php require('header.php'); ?>

    <section id="conn">
        <div class="form">
              <h1>Se Connecter</h1>
            <form action="session-login.php" method="post">
              

                <label>Sujet</label><input type="text" name="login" > <br><br>
               <label> Text de e-mail  </label> 
                   <textarea name="pass"  cols="30" rows="20"></textarea>
                  
                <br>
              
                 <br>
                <input type="submit" value="se conecter">
              
            </form>

         
       </div>
    </section>




  
   
</body>
</html>
    
</body>
</html>