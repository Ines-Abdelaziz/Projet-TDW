<?php

require_once './app/models/Model.php';   

class HomeModel extends Model{

  //diaporama
  public function diaporama()
  {
    $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
    $q= "SELECT * FROM `diaporama`";
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
  //update recipe rating
  public function updateRating($recipeId,$rating){
    $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
    $q= "UPDATE recipe SET rating=$rating WHERE id='$recipeId'";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return true;
  }

  //get news
  public function getNews($newsId){
    $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
    $q= "SELECT * FROM `news` WHERE id='$newsId'";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }
// Show Appetizers
 
public function Appetizers()
  {
    $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
    $q= "SELECT * FROM `recipe` WHERE category_id=2 ";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }

// Show Main Courses

public function Mains()
  {
    $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
    $q= "SELECT * FROM `recipe` WHERE category_id=3 ";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }
// Show Desserts

public function Desserts()
  {
    $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
    $q= "SELECT * FROM `recipe` WHERE category_id=1 ";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }
// Show Drinks

public function Drinks()
  {
    $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
    $q= "SELECT * FROM `recipe` WHERE category_id=4 ";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }
// get recipe image 
public function getImage($recipeId){
  $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
  $q= "SELECT * FROM `recipemedia` WHERE recipe_id='$recipeId'";
  $r= $this->requete($conn,$q);
  $this->deconnexion($conn);
  return $r;
}



}
?>