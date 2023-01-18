<?php
   require '../models/Model.php'; 
   $model =new Model();
    $user=$_POST['user'];
    $rating = $_POST['rating'];
    $recipeId=$_POST['id'];
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q2="SELECT * FROM user_rating WHERE user_id='$user' AND recipe_id='$recipeId'";
    $r2=$model->requete($conn,$q2);
    $oldrating=$r2->fetchColumn(3);
    $q0="SELECT * FROM recipe WHERE id='$recipeId'";
    $r0=$model->requete($conn,$q0);
    $r00=$model->requete($conn,$q0);
    $globalrating=$r0->fetchColumn(10);
    $nbraters=$r00->fetchColumn(11);
    echo "<script>console.log($nbraters)</script>";
    $q1="SELECT count(*) FROM user_rating WHERE user_id='$user' AND recipe_id='$recipeId'";
    $r1= $model->requete($conn,$q1);
    $r1=$r1->fetchColumn();
    if ($r1==1){
     
     $q3="UPDATE user_rating SET rating='$rating' WHERE user_id='$user' AND recipe_id='$recipeId' ";
     $r3= $model->requete($conn,$q3);
     $newrating=((($globalrating*$nbraters) -$oldrating)+$rating)/$nbraters;
     $q4="UPDATE recipe SET rating='$newrating' WHERE id='$recipeId'";
     $r4=$model->requete($conn,$q4);
     $model->deconnexion($conn);
    }else{
    $q="INSERT INTO user_rating (user_id,recipe_id,rating) VALUES($user,$recipeId,$rating)";
    $r= $model->requete($conn,$q);
    
    $newrating=(($globalrating*$nbraters)+$rating)/($nbraters+1);
    $nbraters=$nbraters+1;
    $q5="UPDATE recipe SET rating='$newrating',nb_raters='$nbraters' WHERE id='$recipeId'";
    $r5=$model->requete($conn,$q5);
    $model->deconnexion($conn);}

    
?>