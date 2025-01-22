<?php

require_once './app/models/Model.php';   

class ContactModel extends Model{
 
 
    
  public function sendFeedback($user,$message){
    $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
    $q= "INSERT into  feedback (user_id,message) VALUES ('$user','$message'); ";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }


    


}
?>