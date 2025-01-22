<?php

require_once './app/models/Model.php';   

class AdminNewsModel extends Model{
 
 
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
    public function newsPageRecipes(){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `news_page` where type='recipe' ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }
    public function newsPageNews(){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `news_page` where type='news' ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }
    public function isDisplayedRecipe($id){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT count(*) FROM `news_page` where recipe_id='$id'  ";
        $r= ($this->requete($conn,$q))->fetchColumn();
        $this->deconnexion($conn);
        if($r>0){return true;}else{return false;}

    }
    public function isDisplayedNews($id){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT count(*) FROM `news_page` where  news_id='$id' ";
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