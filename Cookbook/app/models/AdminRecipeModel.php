<?php

require_once './app/models/Model.php';   

class AdminRecipeModel extends Model{
 
 
    public function recipes(){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `recipe` ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }
 

    


}
?>