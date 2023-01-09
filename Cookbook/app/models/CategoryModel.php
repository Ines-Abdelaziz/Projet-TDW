<?php

require_once './app/models/Model.php';   

class CategoryModel extends Model{
 
 
    public function filterBy($category,$filter){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `recipe` WHERE category_id=$category ORDER BY $filter";
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
    public function getCategory($category){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `category` WHERE id='$category'";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }



}
?>