<?php

require_once './app/models/Model.php';   

class HomeModel extends Model{

  //diaporama
  public function diaporama()
  {
    $conn=$this->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM `diaporama`";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }
  //get recipe
  public function getRecipe($recipeId){
    $conn=$this->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM `recipe` WHERE id='$recipeId'";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }
  //get news
  public function getNews($newsId){
    $conn=$this->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM `news` WHERE id='$newsId'";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }
// Show Appetizers
 
public function Appetizers()
  {
    $conn=$this->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM `recipe` WHERE category_id=2 ";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }

// Show Main Courses

public function Mains()
  {
    $conn=$this->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM `recipe` WHERE category_id=3 ";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }
// Show Desserts

public function Desserts()
  {
    $conn=$this->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM `recipe` WHERE category_id=1 ";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }
// Show Drinks

public function Drinks()
  {
    $conn=$this->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM `recipe` WHERE category_id=4 ";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }
// get recipe image 
public function getImage($recipeId){
  $conn=$this->connexion("cookbook","localhost:3307","root","");
  $q= "SELECT * FROM `recipemedia` WHERE recipe_id='$recipeId'";
  $r= $this->requete($conn,$q);
  $this->deconnexion($conn);
  return $r;
}



}
?>