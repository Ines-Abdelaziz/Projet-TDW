<?php

require_once './app/models/Model.php';   

class ModifyIngredientModel extends Model{
 
   
    public function getIngredient($id){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `ingredient` where id='$id' ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }
    public function getUnits(){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `unit`  ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }

    


}
?>