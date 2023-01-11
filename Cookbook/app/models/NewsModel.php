<?php

require_once './app/models/Model.php';   

class NewsModel extends Model{



  public function getNews($newstitle){
    $conn=$this->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM `news` WHERE title='$newstitle'";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }
   




}

?>