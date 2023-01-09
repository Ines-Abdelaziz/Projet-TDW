
<?php

class Model {

  protected $database = "cookbook";  
  protected $host = "localhost:3307";  
  protected $username  = "root";  
  protected $password = ""; 

  //Se connecter à la bdd
  protected function connexion($database, $host,$username,$password){ 
      try{
        $conn=new PDO("mysql:host=$host;dbname=$database",$username,$password);
      }
      catch(PDOException $e){
        printf(" Erreur de Connexion: ". $e->getMessage()); 
        exit(); 
      }
      return $conn;
  }  

  //fermer la connexion
  protected function deconnexion(&$conn){  
      $conn=null;  
  } 

  protected function requete($conn,$r){
    return $conn->query($r);
  }

}
?>