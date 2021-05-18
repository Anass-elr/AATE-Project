 <?php  
       $servername="localhost";
       $username="root";
       $password="";
       $db="e-commerce";

     try{
        $conn=new PDO("mysql:host=$servername;dbname=$db",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
        
     function query($sql){
        $req=$conn->prepare($sql);
        $req->execute();
       return  $res=$req->fetchall();

     }
     }
     
     catch(PDOException $e){
         echo 'error connection '.$e->getMessage();
     }
?>