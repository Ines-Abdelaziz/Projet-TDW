<?php

require_once './app/models/Model.php';   

class ContactModel extends Model{
 
 
    
  public function sendFeedback($user,$message){
    $conn=$this->connexion("cookbook","localhost:3307","root","");
    $q= "INSERT into  feedback (user_id,message) VALUES ('$user','$message'); ";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }


    


}
?>