<?php

require_once './app/models/Model.php';   

class AdminUserModel extends Model{
 
 
    
  public function waitingList(){
    $conn=$this->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM `user_temp` ";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }
  public function users(){
    $conn=$this->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM `user` WHERE is_admin=0 ";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
}
public function deleteUser($userId){
    $conn=$this->connexion("cookbook","localhost:3307","root","");
    $q= "DELETE FROM `user` WHERE id=$userId ";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r; 
}
public function makeAdmin($userId){
    $conn=$this->connexion("cookbook","localhost:3307","root","");
    $q= "UPDATE `user` SET is_admin=1 WHERE id=$userId ";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r; 
}

    


}
?>