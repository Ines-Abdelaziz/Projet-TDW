<?php

require_once './app/models/Model.php';   

class RecipeIdeasModel extends Model{
 
 
    public function ingredients(){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `ingredient` ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }
    public function recipe(){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `recipe` ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }
    
    public function getRecipeById($id){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `recipe` where id='$id' LIMIT 1 ";
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
    public function getIngredientsNb($recipeId){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT count(*) FROM `recipe_ingredients` WHERE recipe_id='$recipeId'";
        $r= ($this->requete($conn,$q))->fetchColumn();
        $this->deconnexion($conn);
        return $r;
    }
 

    


}
?>