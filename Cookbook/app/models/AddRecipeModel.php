<?php

require_once './app/models/Model.php';   

class AddRecipeModel extends Model{
 
   
    public function getIngredients(){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `ingredient` ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
      }
    public function getIngredient($id){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `ingredient` WHERE id=$id ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r; 
    }
      public function getUnit($unitId){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `unit` where id='$unitId' ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
      }
      public function getRecipe($recipeId){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `recipe` where id='$recipeId' ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
      }
      public function getRecipeStep($recipeId){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `recipe_step` where recipe_id='$recipeId' ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
      }
      public function getRecipeIngr($recipeId){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `recipe_ingredients` where recipe_id='$recipeId' ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
      }
 

    


}
?>