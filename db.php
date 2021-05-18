
<?php
  
  Class DB{
    private $serveur="localhost";
    private $login="root";
    private $password=""; 
    private $db="e-commerce";
    public $connexion='';

    public function __construct($serveur=null,$login=null,$password=null,$db=null){
         if($serveur != null){
             $this->serveur=$serveur;
             $this->login=$login;
             $this->password=$password;
             $this->db=$db;
         }

       try{
         $this->connexion = new PDO("mysql:host=$this->serveur;dbname=$this->db",$this->login,$this->password);
         $this->connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }

    }

    public function query($sql){
        $req=$this->connexion->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
     }

     public function queryy($sql){
      $req=$this->connexion->prepare($sql);
      $req->execute();
     }

  }

?>