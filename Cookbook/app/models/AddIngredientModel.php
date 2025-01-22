<?php

require_once './app/models/Model.php';   

class AddIngredientModel extends Model{
 
    public function getUnits(){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `unit`  ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }
   
 

    


}
?>