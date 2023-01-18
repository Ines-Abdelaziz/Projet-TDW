<?php

require_once './app/models/Model.php';   

class ModifyRecipeModel extends Model{
 
   
    public function getIngredients(){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `ingredient` ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
      }
    public function getIngredient($id){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `ingredient` WHERE id=$id ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r; 
    }
      public function getUnit($unitId){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `unit` where id='$unitId' ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
      }
      public function getRecipe($recipeId){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `recipe` where id='$recipeId' ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
      }
      public function getRecipeStep($recipeId){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `recipe_step` where recipe_id='$recipeId' ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
      }
      public function getRecipeIngr($recipeId){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `recipe_ingredients` where recipe_id='$recipeId' ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
      }
 

    


}
?>