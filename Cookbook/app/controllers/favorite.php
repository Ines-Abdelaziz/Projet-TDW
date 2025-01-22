<?php
   require __DIR__.'/../models/Model.php'; 
   $model =new Model();
    $user=$_POST['id'];
    $recipeId=$_POST['recipe'];
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q1="SELECT count(*) FROM user_favorite WHERE user_id='$user' AND recipe_id='$recipeId' ";
    $r1= $model->requete($conn,$q1);
    $r1=$r1->fetchColumn();
    if ($r1==1){
     $q2="DELETE FROM user_favorite WHERE user_id='$user' AND recipe_id='$recipeId'";
     $r2= $model->requete($conn,$q2);
     $model->deconnexion($conn);
    }else{
    $q="INSERT INTO user_favorite (user_id,recipe_id) VALUES($user,$recipeId)";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);}
?>