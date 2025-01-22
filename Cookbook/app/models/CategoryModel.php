<?php

require_once './app/models/Model.php';   

class CategoryModel extends Model{
 
 
    public function filterBy($category,$filter){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `recipe` WHERE category_id=$category ORDER BY $filter";
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
    public function getCategory($category){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `category` WHERE id='$category'";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }



}
?>