<?php

require_once './app/models/Model.php';   

class HealthyModel extends Model{
 
 
    public function recipes(){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `recipe` ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }

    public function getImage($recipeId){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `recipemedia` WHERE recipe_id='$recipeId'";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }
    public function getIngredients($recipeId){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `recipe_ingredients` WHERE recipe_id='$recipeId'";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }
    public function getIngredient($ingId){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `ingredient` WHERE id='$ingId'";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }
  



}
?>