<?php

require_once './app/models/Model.php';   

class SignInModel extends Model{
 
  
    public function Login($email,$password){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT count(*) FROM `user` WHERE email='$email' AND password='$password'";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r->fetchColumn(); 
    }
    public function ifAdmin($email,$password){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT is_admin FROM `user` WHERE email='$email' AND password='$password'";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r->fetchColumn(); 
    }
    public function getUserId($email){
        $conn=$this->connexion("cookbook","localhost:3307","root","");
        $q= "SELECT id FROM `user` WHERE email='$email' ";
        $r= $this->requete($conn,$q);
        $this->deconnexion($conn);
        return $r->fetchColumn(); 
    }

}
?>