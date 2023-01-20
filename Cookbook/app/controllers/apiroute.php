<?php
include_once("../models/apirouteModel.php");

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
if (isset($_POST['deletenews'])){
    $newsid=$_POST['deletenews'];
    deleteNews($newsid);
    header("location:/AdminNews");
}
if (isset($_POST['deleteing'])){
    $ingid=$_POST['deleteing'];
    deleteIng($ingid);
    header("location:/AdminNutrition");
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
if (isset($_POST['modifynews'])){
    $_SESSION['news']=$_POST['modifynews'];
    header("location:/ModifyNews");
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
    
    header("location: /AdminRecipes");
}

if (isset($_POST['newssubmit'])) {
    $title= $_POST['title'];
    $desc = $_POST['desc'];
    $photo= fopen($_FILES['image']["tmp_name"], 'rb');
    $content = $_POST['content'];
   
    addNews($title,$desc,$content);
    addNewsImage(getNews($title),$photo);
    header("location: /AdminNews");    
}
if (isset($_POST['modifynewssubmit'])){
    $id=$_POST['modifynewssubmit'];
    $title= $_POST['title'];
    $desc = $_POST['desc'];
    if (isset($_FILES['image'])){
    $photo= fopen($_FILES['image']["tmp_name"], 'rb');
    updateNewsImage($id,$photo);
    }
    $content = $_POST['content'];
    $news=getNewsById($id);
    if(($title!=$news['title'])or ($desc!=$news['description']) or ($content!=$news['content'])){
        updateNews($id,$title,$desc,$content);
    }
   
    header("location: /AdminNews");  
}
if(isset($_POST['newspage_recipes'])){
    deleteNewspageRecipes();
    $recipes=$_POST['newspage_recipes'];
    $len= count( $recipes);
    for ($i=0 ;$i<$len;$i++){
        addNewspageRecipe($recipes[$i]);
    }
    echo "<script>window.location.href='/AdminNews'</script>";
}
if(isset($_POST['diapo_recipes'])){
    deleteDiapoRecipes();
    $recipes=$_POST['diapo_recipes'];
    $len= count( $recipes);
    for ($i=0 ;$i<$len;$i++){
        addDiapoRecipe($recipes[$i]);
    }
    echo "<script>window.location.href='/Settings'</script>";
}
if(isset($_POST['diapo_news'])){
    deleteDiapoNews();
    $news=$_POST['diapo_news'];
    $len= count( $news);
    for ($i=0 ;$i<$len;$i++){
        addDiapoNews($news[$i]);
    }
    echo "<script>window.location.href='/Settings'</script>"; 
}
if(isset($_POST['newspage_news'])){
    deleteNewspageNews();
    $news=$_POST['newspage_news'];
    $len= count( $news);
    for ($i=0 ;$i<$len;$i++){
        addNewspageNews($news[$i]);
    }
    echo "<script>window.location.href='/AdminNews'</script>"; 
}
if (isset($_POST['ingsubmit'])) {
    $name= $_POST['name'];
    $calories = $_POST['calories'];
    $fat = $_POST['fat'];
    $carbs = $_POST['carbs'];
    $protien = $_POST['protein'];
    $unit = $_POST['unit'];
    $season = $_POST['season'];
    $healthy =( $_POST['healthy'])/100;
    AddIngredient($name,$calories,$protien,$fat,$carbs,$unit,$healthy,$season);
    header("location: /AdminNutrition");    
}
if (isset($_POST['modifying'])){
    $_SESSION['ing']=$_POST['modifying'];
    header("location:/ModifyIngredient");
}
if (isset($_POST['modifyingsubmit'])){
    $id=$_POST['modifyingsubmit'];
    $i=getIngr($id);
    $name= $_POST['name'];
    $calories = $_POST['calories'];
    $fat = $_POST['fat'];
    $carbs = $_POST['carbs'];
    $protien = $_POST['protein'];
    $unit = $_POST['unit'];
    $season = $_POST['season'];
    $healthy =( $_POST['healthy']/100);
   
    if(($name!=$i['name'])or ($calories!=$i['calories']) or ($fat!=$i['fat'])or($carbs!=$i['carbohydrates']) or(($protien!=$i['protein']))or($unit!=$i['unit_id'])or(($season!=$i['season_id']))or($healthy!=$i['healthy'])){
        updateIng($id,$name,$calories,$fat,$protien,$carbs,$unit,$season,$healthy);
    }
   
    header("location: /AdminNutrition");  
}

?>