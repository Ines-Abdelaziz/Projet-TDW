<?php

require_once './app/models/Model.php';   

class ProfileModel extends Model{
 
    // get user 
  public function getUser($userId){
    $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
    $q= "SELECT * FROM `user` WHERE id='$userId' LIMIT 1 ";
    $r= $this->requete($conn,$q);
    $this->deconnexion($conn);
    return $r;
  }

    //get favorites
  public function getFavorites($user){
    $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
    $q= "SELECT * FROM `user_favorite` WHERE user_id='$user'";
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

    public function getImage($recipeId){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `recipemedia` WHERE recipe_id='$recipeId'";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }
    


}
?>