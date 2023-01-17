<?php

require_once './app/models/Model.php';   

class AddRecipeModel extends Model{
 
   
    public function getIngredients(){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `ingredient` ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
      }
      public function getUnit($unitId){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `unit` where id='$unitId' ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
      }
 

    


}
?>