<?php

require_once './app/models/Model.php';   

class SignUpModel extends Model{
 
    public function checkUser($email){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "SELECT count(*) FROM `user` WHERE email='$email' ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r->fetchColumn(); 
    }
    public function insertUser($Fname,$Lname,$sex,$Bdate,$email,$password){
        $conn=$this->connexion("adcollector_cookbook", "mysql-adcollector.alwaysdata.net", "348202", "cook_book");
        $q= "INSERT INTO user_temp (first_name, last_name, sexe, birth_date, email, password)
        VALUES ('$Fname','$Lname',$sex,'$Bdate','$email','$password');";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r->fetchColumn(); 
    }

}
?>