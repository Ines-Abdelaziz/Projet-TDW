<?php

require_once './app/models/Model.php';   

class ModifyIngredientModel extends Model{
 
   
    public function getIngredient($id){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `ingredient` where id='$id' ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }
    public function getUnits(){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `unit`  ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }

    


}
?>