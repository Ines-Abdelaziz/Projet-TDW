<?php

require_once './app/models/Model.php';   

class ModifyNewsModel extends Model{
 
   
    public function getNews($id){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT * FROM `news` where id='$id' ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r;
    }

    


}
?>