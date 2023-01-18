<?php

require_once './app/models/Model.php';   

class AddIngredientModel extends Model{
 
    public function getUnits(){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `unit`  ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }
   
 

    


}
?>