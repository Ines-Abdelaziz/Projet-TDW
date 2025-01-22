
<?php

class Model {

  protected $database = "addcollector_cookbook";  
  protected $host = "mysql-adcollector.alwaysdata.nett:3306";  
  protected $username  = "348202";  
  protected $password = "cook_book"; 

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