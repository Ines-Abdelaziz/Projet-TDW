<?php

require_once './app/models/Model.php';   

class AdminNutritionModel extends Model{
 
 
    public function ingredients(){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `ingredient` ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }
    public function getUnit($id){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `unit` where id='$id' LIMIT 1 ";
        $r= ($this->requete($conn,$q))->fetchColumn(1);
        $this->deconnexion($conn);
        return $r;
    }
    public function getSeason($id){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `season` where id='$id' LIMIT 1 ";
        $r= ($this->requete($conn,$q))->fetchColumn(1);
        $this->deconnexion($conn);
        return $r;
    }
    
 

    


}
?>