<?php

require_once './app/models/Model.php';   

class NewsModel extends Model{



  public function getNews($newstitle){
    $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
    $q= "SELECT * FROM `news` WHERE title='$newstitle'";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }
   




}

?>