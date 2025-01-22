<?php

require_once './app/models/Model.php';   

class FestivalsModel extends Model{
 
 
    public function filterBy($filter){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `festival_recipe` WHERE $filter GROUP By recipe_id ";
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