<?php

require_once './app/models/Model.php';   

class ModifyNewsModel extends Model{
 
   
    public function getNews($id){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT * FROM `news` where id='$id' ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }

    


}
?>