<?php 
 
Class panier {
   public function __construct(){
       if(!isset($_SESSION)){
           session_start();
        }
        if(!isset( $_SESSION['panier'])){
            $_SESSION['panier']=array();
        }
   }

    public function addproduct($id){
       if(array_key_exists($id,$_SESSION['panier'])){
        $_SESSION['panier'][$id]++;
       }
       else {
           $_SESSION['panier'][$id]=1;
       }
         
    }

   public function calculer(){
        return array_sum($_SESSION['panier']);
      }
}
 
?>