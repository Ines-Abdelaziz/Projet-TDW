<?php

require_once './app/models/Model.php';   

class NutritionModel extends Model{
 
 
    public function ingredients(){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `ingredient` ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }
    public function getUnit($id){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `unit` where id='$id' LIMIT 1 ";
        $r= ($this->requete($conn,$q))->fetchColumn(1);
        $this->deconnexion($conn);
        return $r;
    }
    public function getSeason($id){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `season` where id='$id' LIMIT 1 ";
        $r= ($this->requete($conn,$q))->fetchColumn(1);
        $this->deconnexion($conn);
        return $r;
    }
    
 

    


}
?>