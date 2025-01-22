<?php

require_once './app/models/Model.php';   

class AdminRecipeModel extends Model{
 
 
    public function recipes(){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `recipe` ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }
    public function recipesOnHold(){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `recipe_temp` ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }
 
 

    


}
?>