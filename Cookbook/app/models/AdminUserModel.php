<?php

require_once './app/models/Model.php';   

class AdminUserModel extends Model{
 
 
    
  public function waitingList(){
    $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
    $q= "SELECT * FROM `user_temp` ";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }
  public function users(){
    $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
    $q= "SELECT * FROM `user` WHERE is_admin=0 ";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
}

    


}
?>