
<?php

class Model {

  protected $database = "cookbook";  
  protected $host = "localhost:3307";  
  protected $username  = "root";  
  protected $password = ""; 

  //Se connecter à la bdd
  public function connexion($database, $host,$username,$password){ 
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
  public function deconnexion(&$conn){  
      $conn=null;  
  } 

  public function requete($conn,$r){
    return $conn->query($r);
  }

}
?>