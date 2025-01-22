<?php

require_once './app/models/Model.php';   

class NewsPageModel extends Model{


  //get recipe or news
  public function getCards(){
   
    $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
    $q= "SELECT * FROM `news_page`";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }
  public function getNews($newsId){
    $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
    $q= "SELECT * FROM `news` WHERE id='$newsId'";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }
   //get recipe
   public function getRecipe($recipeId){
    $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
    $q= "SELECT * FROM `recipe` WHERE id='$recipeId'";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }
 
// get recipe media            
public function getMedia($recipeId){
  $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
  $q= "SELECT * FROM `recipemedia` WHERE recipe_id='$recipeId'";
  $r= $this->requete($conn,$q);
  $this->deconnexion($conn);
  return $r;
}




}

?>