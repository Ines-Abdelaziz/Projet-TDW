<?php

require_once './app/models/Model.php';   

class SignUpModel extends Model{
 
    public function checkUser($email){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT count(*) FROM `user` WHERE email='$email' ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r->fetchColumn(); 
    }
    public function insertUser($Fname,$Lname,$sex,$Bdate,$email,$password){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "INSERT INTO user (first_name, last_name, sexe, birth_date, email, password, is_admin)
        VALUES ('$Fname','$Lname',$sex,'$Bdate','$email','$password',0);";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r->fetchColumn(); 
    }

}
?>