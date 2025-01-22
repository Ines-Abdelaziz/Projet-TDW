<?php

require_once './app/models/Model.php';   

class SettingsModel extends Model{
 
 
    public function news(){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `news` ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }
    public function recipe(){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `recipe` ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }
    public function diapoRecipes(){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `diaporama` where type='recipe' ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }
    public function diapoNews(){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `diaporama` where type='news' ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }
    public function isDisplayedRecipe($id){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT count(*) FROM `diaporama` where recipe_id='$id'  ";
        $r= ($this->requete($conn,$q))->fetchColumn();
        $this->deconnexion($conn);
        if($r>0){return true;}else{return false;}

    }
    public function isDisplayedNews($id){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT count(*) FROM `diaporama` where  news_id='$id' ";
        $r= ($this->requete($conn,$q))->fetchColumn();
        $this->deconnexion($conn);
        if($r>0){return true;}else{return false;}

    }
    public function getRecipeById($id){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `recipe` where id='$id' LIMIT 1 ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;

    }
    public function getNewsById($id){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `news` where id='$id' LIMIT 1 ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;

    }
 
 

    


}
?>