<?php 
session_start();
require_once ("../models/Model.php");
 function isDisplayedRecipe($id){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT count(*) FROM `news_page` where recipe_id='$id'  ";
    $r= ($model->requete($conn,$q))->fetchColumn();
    $model->deconnexion($conn);
    if($r>0){return true;}else{return false;}

}
 function isDisplayedNews($id){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT count(*) FROM `news_page` where  news_id='$id' ";
    $r= ($model->requete($conn,$q))->fetchColumn();
    $model->deconnexion($conn);
    if($r>0){return true;}else{return false;}

}
function deleteNewspageNews(){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "DELETE FROM `news_page` where  news_id is not NULL ";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r;

}
function deleteDiapoNews(){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "DELETE FROM `diaporama` where  news_id is not NULL ";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r;

}
function deleteNewspageRecipes(){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "DELETE FROM `news_page` where  recipe_id is not NULL ";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r;

}
function deleteDiapoRecipes(){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "DELETE FROM `diaporama` where  recipe_id is not NULL ";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r;

}
function addNewspageRecipe($recipeId){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "INSERT INTO news_page (recipe_id,type)
    VALUES ('$recipeId','recipe');";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r; 
 }
 function addDiapoRecipe($recipeId){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "INSERT INTO diaporama (recipe_id,type)
    VALUES ('$recipeId','recipe');";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r; 
 }
 function addNewspageNews($newsId){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "INSERT INTO news_page (news_id,type)
    VALUES ('$newsId','news');";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r; 
 }
 function addDiapoNews($newsId){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "INSERT INTO diaporama (news_id,type)
    VALUES ('$newsId','news');";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r; 
 }
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
 function AddIngredient($name,$calories,$protein,$fat,$carbs,$unitId,$healthy,$seasonId){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "INSERT INTO ingredient (name,calories,fat,protein,carbohydrates,unit_id,season_id,healthy )
    VALUES ('$name','$calories',$fat,'$protein','$carbs','$unitId','$seasonId','$healthy');";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r; 
 }
 function addNews($title,$desc,$content){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "INSERT INTO news (title,description,content) VALUES ('$title','$desc','$content');";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r; 
 }
 function updateNews($newsId,$title,$desc,$content){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "UPDATE news SET title='$title',description='$desc',content='$content' where id='$newsId';";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r; 
 }
 function updateIng($ingId,$name,$calories,$fat,$protein,$carbs,$unit,$season,$healthy){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "UPDATE ingredient SET name='$name',calories='$calories',fat='$fat',protein='$protein',carbohydrates='$carbs',unit_id='$unit',season_id='$season',healthy='$healthy' where id='$ingId';";
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
 function getIngr($id){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM ingredient where id='$id'";
    $r= ($model->requete($conn,$q))->fetch(PDO::FETCH_ASSOC);
    $model->deconnexion($conn);
    return $r; 
 }
 function getNews($name){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM news where title='$name'";
    $r= ($model->requete($conn,$q))->fetchColumn();
    $model->deconnexion($conn);
    return $r; 
 }
 function getNewsById($id){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "SELECT * FROM news where id='$id'";
    $r= ($model->requete($conn,$q))->fetch(PDO::FETCH_ASSOC);
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
 function addNewsImage($newsId,$image){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "UPDATE news SET img=:image  where id=:newsId ;";
    $step=$conn->prepare($q);
    $step->bindParam(':newsId',$newsId,PDO::PARAM_INT);
    $step->bindParam(':image',$image,PDO::PARAM_LOB);
    $step->execute();
    $model->deconnexion($conn);
    return true; 
 }
 function updateNewsImage($newsId,$image){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "UPDATE  news  SET img=:image where id=:newsId ;";
    $step=$conn->prepare($q);
    $step->bindParam(':newsId',$newsId,PDO::PARAM_INT);
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
function deleteIng($ingId){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "DELETE FROM `ingredient` WHERE id=$ingId ";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r; 
}
function deleteNews($newsId){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "DELETE FROM `news` WHERE id=$newsId ";
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