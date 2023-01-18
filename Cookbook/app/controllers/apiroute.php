<?php
session_start();
require_once ("../models/Model.php");
 function addRecipeUser($userId,$recipeId){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "INSERT INTO user_recipe (recipe_id,user_id)
    VALUES ('$recipeId','$userId');";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r; 
 }
 function addRecipe($title,$desc,$ptime,$ctime,$rtime,$diff,$cat,$healthy,$calories){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "INSERT INTO recipe (name,description,preparation_time,cooking_time,rest_time,difficulty,category_id,is_healthy,calories )
    VALUES ('$title','$desc',$ptime,'$ctime','$rtime','$diff','$cat','$healthy','$calories');";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r; 
 }
 function updateRecipe($recipeId,$title,$desc,$ptime,$ctime,$rtime,$diff,$cat,$healthy,$calories){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "UPDATE recipe SET name='$title',description='$desc',preparation_time='$ptime',cooking_time='$ctime',rest_time='$rtime',difficulty='$diff',category_id='$cat',is_healthy='$healthy',calories='$calories' where id='$recipeId';";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r; 
 }
 function addRecipeTemp($title,$desc,$ptime,$ctime,$rtime,$diff,$cat,$healthy,$calories,$user){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "INSERT INTO recipe_temp (name,description,preparation_time,cooking_time,rest_time,difficulty,category_id,is_healthy,calories,user_id )
    VALUES ('$title','$desc',$ptime,'$ctime','$rtime','$diff','$cat','$healthy','$calories','$user');";
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
 function getRecipeById($recipeId){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM recipe where id='$recipeId' LIMIT 1";
    $r= ($model->requete($conn,$q))->fetch(PDO::FETCH_ASSOC);
    $model->deconnexion($conn);
    return $r; 
 }
 function getRecipeTemp($name){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM recipe_temp where name='$name'";
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
 function updateRecipeingr($recipeId,$ingredientId,$quantity){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "UPDATE recipe_ingredients SET quantity='$quantity' WHERE recipe_id='$recipeId' and ingredient_id='$ingredientId';";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r; 
 }
 function ifRecipeingr($recipeId,$ingredientId){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT count(*)FROM recipe_ingredients  WHERE recipe_id='$recipeId' and ingredient_id='$ingredientId';";
    $r= ($model->requete($conn,$q))->fetchColumn();
    $model->deconnexion($conn);
    if($r>0){return true;}else{
        return false;
    }
 }
 function getRecipeIngrQua($recipeId,$ingredientId){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM recipe_ingredients where recipe_id='$recipeId' and ingredient_id='$ingredientId' ";
    $r= ($model->requete($conn,$q))->fetchColumn(2);
    $model->deconnexion($conn);
    return $r; 
 }
 function addRecipeingrTemp($recipeId,$ingredientId,$quantity){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "INSERT INTO recipe_ingredients_temp (recipe_id,ingredient_id,quantity )
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
 function updateRecipestep($recipeId,$step,$instruction){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "UPDATE recipe_step SET instructions='$instruction' where recipe_id='$recipeId' and step_number='$step';";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r; 
 }
 function ifRecipeStep($recipeId,$nbStep){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT count(*) FROM recipe_step WHERE recipe_id='$recipeId' and step_number='$nbStep' ";
    $r= ($model->requete($conn,$q))->fetchColumn();
    $model->deconnexion($conn);
    if ($r>0) {return true;}else {return false;}
 }
 function getRecipeStep($recipeId,$nbStep){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM recipe_step WHERE recipe_id='$recipeId' and step_number='$nbStep' ";
    $r= ($model->requete($conn,$q))->fetch(PDO::FETCH_ASSOC);
    $model->deconnexion($conn);
    return $r;
 }
 function addRecipestepTemp($recipeId,$step,$instruction){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "INSERT INTO recipe_step_temp (recipe_id,step_number,instructions)
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
 function updateRecipeImage($recipeId,$image){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "UPDATE  recipemedia  SET imageurl=:image where recipe_id=:recipeId ;";
    $step=$conn->prepare($q);
    $step->bindParam(':recipeId',$recipeId,PDO::PARAM_INT);
    $step->bindParam(':image',$image,PDO::PARAM_LOB);
    $step->execute();
    $model->deconnexion($conn);
    return true; 
 }
 function addRecipeImageTemp($recipeId,$image){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "INSERT INTO recipemedia_temp (recipe_id,imageurl )
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
function validateRecipe($recipeId,$userId){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q0="SELECT * FROM recipe_temp where id='$recipeId' LIMIT 1";
    $r0= $model->requete($conn,$q0);
    $fetch=$r0->fetch(PDO::FETCH_ASSOC);
    $name=$fetch['name'];
    $desc=$fetch['description'];
    $ptime=$fetch['preparation_time'];
    $ctime=$fetch['cooking_time'];
    $rtime=$fetch['rest_time'];
    $diff=$fetch['difficulty'];
    $ptime=$fetch['preparation_time'];
    $cat=$fetch['category_id'];
    $healthy=$fetch['is_healthy'];
    $ptime=$fetch['preparation_time'];
    $calories=$fetch['calories'];
    addRecipe($name,$desc,$ptime,$ctime,$rtime,$diff,$cat,$healthy,$calories);
    $recipe=getRecipe($name);
    addRecipeUser($userId,$recipe);
    $q2="SELECT * FROM recipe_step_temp where recipe_id='$recipeId'";
    $r2=$model->requete($conn,$q2);
    while ($fetch1 = $r2->fetch(PDO::FETCH_ASSOC)) {
        $nbstep=$fetch1['step_number'];
        $instruction=$fetch1['instructions'];
        addRecipestep($recipe,$nbstep,$instruction);
    }
    $q3= "SELECT * FROM recipe_ingredients_temp where recipe_id='$recipeId'";
    $r3=$model->requete($conn,$q3);
    while ($fetch2 = $r3->fetch(PDO::FETCH_ASSOC)) {
        $ingid=$fetch2['ingredient_id'];
        $quantity=$fetch2['quantity'];
        addRecipeingr($recipe,$ingid,$quantity);
    }
    $q1="DELETE FROM recipe_temp WHERE id='$recipeId'";
    $r1= $model->requete($conn,$q1);
    $model->deconnexion($conn);
    return true; 
}
function invalidate($userId){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q1="DELETE FROM user_temp WHERE id='$userId'";
    $r1= $model->requete($conn,$q1);
    $model->deconnexion($conn);
    return $r1; 
}
function invalidateRecipe($recipeId){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q1="DELETE FROM recipe_temp WHERE id='$recipeId'";
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
if (isset($_POST['validaterecipe'])){
    $userid=$_POST['validaterecipeu'];
    $recipeid=$_POST['validaterecipe'];
    validateRecipe($recipeid,$userid);
    header("location:/AdminRecipes");
}
if (isset($_POST['invalidate'])){
    $userid=$_POST['invalidate'];
    unset($_POST['invalidate']);
    invalidate($userid);
    header("location:/AdminUsers");
}
if (isset($_POST['invalidaterecipe'])){
    $recipeid=$_POST['invalidaterecipe'];
    invalidateRecipe($recipeid);
    header("location:/AdminRecipes");
}
if (isset($_POST['recipesubmit'])) {
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
    if ($_SESSION['role']=='admin'){
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
    header("location: /AdminRecipes");}
    elseif ($_SESSION['role']=='user'){
    addRecipeTemp($title,$desc,$ptime,$ctime,$rtime,$diff,$category,$healthy,$calories,$_SESSION['user']);
    $recipeId=getRecipeTemp($title);
    for ($x = 0; $x < $count; $x++) {
        $step=$_POST["step$x"];
        addRecipestepTemp($recipeId,$x+1,$step);
    }
    
    for ($x1 = 0; $x1 < $count1; $x1++) {
        $ing=$_POST["ing$x1"];
        $ing=preg_replace("/\([^)]+\)/","",$ing);
        $ing=rtrim($ing);
        $quantity=$_POST["qua$x1"];
        addRecipeingrTemp($recipeId,getIng($ing),$quantity);
    }
    
    addRecipeImageTemp($recipeId,$photo);
    header("location: /home");
    }
}
if (isset($_POST['modifyrecipe'])){
    $_SESSION['recipe']=$_POST['modifyrecipe'];
    header("location:/ModifyRecipe");
}
if (isset($_POST['modifyrecipesubmit'])) {
    $id=$_POST['modifyrecipesubmit'];
    $orecipe=getRecipeById($id);
    $title= $_POST['title'];
    $desc = $_POST['desc'];
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
    if(($title!=$orecipe['name']) or ($desc!=$orecipe['description']) or($ptime!=$orecipe['preparation_time']) or($ctime!=$orecipe['cooking_time']) or($rtime!=$orecipe['rest_time'])or ($diff!=$orecipe['difficulty']) or($category!=$orecipe['category_id']) or ($healthy!=$orecipe['is_healthy']) or($calories!=$orecipe['calories']) )
    {updateRecipe($id,$title,$desc,$ptime,$ctime,$rtime,$diff,$category,$healthy,$calories);}
    for ($x = 0; $x < $count; $x++) {
        $step=$_POST["step$x"];
        if(ifRecipeStep($id,$x+1)){
        $ostep=getRecipeStep($id,$x+1);
        if ($step!=$ostep['instructions']){
            updateRecipestep($id,$x+1,$step);
        }
        }else{
        addRecipestep($id,$x+1,$step);}
    }
    
    for ($x1 = 0; $x1 < $count1; $x1++) {
        if(isset($_POST["ing$x1"])){
        $ing=$_POST["ing$x1"];
        $ing=preg_replace("/\([^)]+\)/","",$ing);
        $ing=rtrim($ing);
        $quantity=$_POST["qua$x1"];
        $ingId=getIng($ing);
        if(ifRecipeingr($id,$ingId)){
            if ($quantity !=getRecipeIngrQua($id,$ingId)){
                updateRecipeingr($id,$ingId,$quantity);
            }
        }else{
            addRecipeingr($id,$ingId,$quantity);
        }}else{$x1++;}
    }
    if(isset($_FILES['image'])){
        $photo= fopen($_FILES['image']["tmp_name"], 'rb');
        updateRecipeImage($id,$photo);
    }
    
    header("location: /AdminRecipes");}
    


?>