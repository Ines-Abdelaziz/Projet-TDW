<?php

require_once './app/models/Model.php';   

class AdminNewsModel extends Model{
 
 
    public function news(){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `news` ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }
    public function recipesOnHold(){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `recipe_temp` ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }
 
 

    


}
?>