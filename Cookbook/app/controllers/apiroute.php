<?php
session_start();
require_once ("../models/Model.php");
 function addRecipe($title,$desc,$ptime,$ctime,$rtime,$diff,$cat,$healthy,$calories){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "INSERT INTO recipe (name,description,preparation_time,cooking_time,rest_time,difficulty,category_id,is_healthy,calories )
    VALUES ('$title','$desc',$ptime,'$ctime','$rtime','$diff','$cat','$healthy','$calories');";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r; 
 }
 function getIng($name){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM ingredient where name='$name'";
    $r= ($model->requete($conn,$q))->fetchColumn();
    $model->deconnexion($conn);
    return $r; 
 }
 function getRecipe($name){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM recipe where name='$name'";
    $r= ($model->requete($conn,$q))->fetchColumn();
    $model->deconnexion($conn);
    return $r; 
 }

 function addRecipeingr($recipeId,$ingredientId,$quantity){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "INSERT INTO recipe_ingredients (recipe_id,ingredient_id,quantity )
    VALUES ('$recipeId','$ingredientId','$quantity');";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r; 
 }
 function addRecipestep($recipeId,$step,$instruction){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "INSERT INTO recipe_step (recipe_id,step_number,instructions)
    VALUES ('$recipeId','$step','$instruction');";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r; 
 }
 function addRecipeImage($recipeId,$image){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "INSERT INTO recipemedia (recipe_id,imageurl )
    VALUES (:recipeId,:image);";
    $step=$conn->prepare($q);
    $step->bindParam(':recipeId',$recipeId,PDO::PARAM_INT);
    $step->bindParam(':image',$image,PDO::PARAM_LOB);
    $step->execute();
    $model->deconnexion($conn);
    return true; 
 }
 function deleteUser($userId){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "DELETE FROM `user` WHERE id=$userId ";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r; 
}
function deleteRecipe($recipeId){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "DELETE FROM `recipe` WHERE id=$recipeId ";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r; 
}
 function makeAdmin($userId){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "UPDATE `user` SET is_admin=1 WHERE id=$userId ";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r; 
}
function validate($userId){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q0="SELECT * FROM user_temp where id='$userId' LIMIT 1";
    $r0= $model->requete($conn,$q0);
    $fetch=$r0->fetch(PDO::FETCH_ASSOC);
    $Fname=$fetch['first_name'];
    $Lname=$fetch['last_name'];
    $sex=$fetch['sexe'];
    $Bdate=$fetch['birth_date'];
    $email=$fetch['email'];
    $password=$fetch['password'];
    $q="INSERT INTO user (first_name, last_name, sexe, birth_date, email, password,is_admin)
        VALUES ('$Fname','$Lname',$sex,'$Bdate','$email','$password','0');";
    $r= $model->requete($conn,$q);
    $q1="DELETE FROM user_temp WHERE id='$userId'";
    $r1= $model->requete($conn,$q1);
    $model->deconnexion($conn);
    return $r; 
}
function invalidate($userId){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q1="DELETE FROM user_temp WHERE id='$userId'";
    $r1= $model->requete($conn,$q1);
    $model->deconnexion($conn);
    return $r1; 
}

if (isset($_POST['delete'])){
    $userid=$_POST['delete'];
    unset($_POST['delete']);
    deleteUser($userid);
    header("location:/AdminUsers");
}
if (isset($_POST['deleterecipe'])){
    $recipeid=$_POST['deleterecipe'];
    unset($_POST['deleterecipe']);
    deleterecipe($recipeid);
    header("location:/AdminRecipes");
}
if (isset($_POST['makeadmin'])){
    $userid=$_POST['makeadmin'];
    unset($_POST['makeadmin']);
    makeAdmin($userid);
    header("location:/AdminUsers");
}
if (isset($_POST['profile'])){
    $userid=$_POST['profile'];
    unset($_POST['profile']);
    $_SESSION['userid']=$userid;
    header("location:/Profile");
}
if (isset($_POST['validate'])){
    $userid=$_POST['validate'];
    unset($_POST['validate']);
    validate($userid);
    header("location:/AdminUsers");
}
if (isset($_POST['invalidate'])){
    $userid=$_POST['invalidate'];
    unset($_POST['invalidate']);
    invalidate($userid);
    header("location:/AdminUsers");
}
if (isset($_POST['title'])) {
    $title= $_POST['title'];
    $desc = $_POST['desc'];
    $photo= fopen($_FILES['image']["tmp_name"], 'rb');
    $ptime = $_POST['preparation_time'];
    $ctime = $_POST['cooking_time'];
    $rtime = $_POST['rest_time'];
    $diff = $_POST['diff'];
    switch($diff) {
        case 'Easy':
            $diff = 1;
            break;
        case 'Intermediate':
            $diff = 2;
            break;
        case 'Advanced':
            $diff = 3;
            break;
     }
    $category = $_POST['category'];
    switch($category) {
        case 'Appetizers':
            $category = 2;
            break;
        case 'Mains':
            $category = 3;
            break;
        case 'Desserts': 
            $category = 1;
            break;
        case 'Beverages':
            $category = 4;
            break;
     }
    $calories = $_POST['calories'];
    $healthy = $_POST['healthy'];
    $count=$_COOKIE['count'];
    $count1=$_COOKIE['count1'];
    addRecipe($title,$desc,$ptime,$ctime,$rtime,$diff,$category,$healthy,$calories);
    $recipeId=getRecipe($title);
    for ($x = 0; $x < $count; $x++) {
        $step=$_POST["step$x"];
        addRecipestep($recipeId,$x+1,$step);
    }
    
    for ($x1 = 0; $x1 < $count1; $x1++) {
        $ing=$_POST["ing$x1"];
        $ing=preg_replace("/\([^)]+\)/","",$ing);
        $ing=rtrim($ing);
        $quantity=$_POST["qua$x1"];
        addRecipeingr($recipeId,getIng($ing),$quantity);
    }
    addRecipeImage($recipeId,$photo);
    header("location: /home");
}
?>