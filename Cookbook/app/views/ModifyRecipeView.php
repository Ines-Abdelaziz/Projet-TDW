<?php
require_once ('./app/controllers/ModifyRecipeController.php');
require_once ('./app/views/template.php');


Class ModifyRecipeView extends template{

public function index(){
    $this->main();
    $this->corps_page();

}

//corps de la page
public function corps_page(){
  ?>
  <body style="background: #0d0d0d !important;">
  <link rel="stylesheet" href="../../public/css/category.css">
  <link rel="stylesheet" href="../../public/css/addrecipe.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <?php
      $this->header();
      $this->Recipe();
      $this->footer();
    ?>
  <script src="../../public/js/jquery-3.3.1.min.js"></script>
  <script src="../../public/js/addrecipe.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/i18n/defaults-*.min.js"></script>
  </body>
  <?php
}

//category image and title
public  function header()
{
    ?>
<div class="category-header">
  <img src="../../public/images/news.jpg" alt="">
  <div class="category-title">Add New Recipe </div>  
</div>
<?php    
}

public  function Recipe()
{  $cntr= new ModifyRecipeController();
    $q=$cntr->getIngredients();
    $ingrs='';
    foreach($q as $i){
      $iname=$i['name'];
      $iunit=($cntr->getUnit($i['unit_id']))->fetchColumn(1);
      $ingrs=$ingrs."<option value='$iname' >$iname ($iunit)</option>"; 
    }
    $recipe=$_SESSION['recipe'];
    $r=$cntr->getRecipe($recipe);
    $r=$r->fetch(PDO::FETCH_ASSOC);
    ?>
     <script>
        var ingredients="<?php echo $ingrs ?>";
   </script>
<div class="category-slogan">Modify Recipe</div>
 <form id ="form2" method="post" action="./app/controllers/apiroute.php" enctype="multipart/form-data" >
  <div class="form-group">
    <label for="r-title">Title</label>
    <input required type="text" class="form-control" id="r-title" name="title" value="<?php echo $r['name'] ?>">
  </div>
  <div class="form-group">
    <label for="r-desc">Description</label>
    <textarea required class="form-control" id="r-desc" name="desc" rows="3" ><?php echo $r['description'] ?></textarea>
  </div>
  <div class="form-group">
  <label for="image" class="form-label">Recipe Image</label>
  <input  class="form-control " name="image" id="image" type="file">
</div>
  <div class="row">
    <div class="col">
    <label for="ptime">Preparation Time</label>
      <input id="ptime" required type="number" name="preparation_time" class="form-control" value="<?php echo $r['preparation_time'] ?>">
    </div>
    <div class="col">
    <label for="ctime">Cooking Time</label>
      <input id="ctime" required type="number"   name="cooking_time" class="form-control" value="<?php echo $r['cooking_time'] ?>">
    </div>
    <div class="col">
    <label for="ptime">Rest Time</label>
      <input id='rtime' required type="number"  name="rest_time" class="form-control" value="<?php echo $r['rest_time'] ?>">
    </div>
  </div>
  <div class="row">
    <div class="col">
                <label for="diff">Difficulty</label>
                <select required class="form-control" id="diff" name="diff" value="<?php $d=$r['difficulty'];if($d==1){echo "Easy";}elseif($d==2){echo "Intermediate";}elseif($d==3){echo "Advanced";} ?>">
                <option>Easy</option>
                <option>Intermediate</option>
                <option>Advanced</option>
                </select>
    </div>
    <div class="col">
                <label for="category">Category</label>
                <select required class="form-control" id="category" name="category" value="<?php $d=$r['category_id'];if($d==1){echo "Desserts";}elseif($d==2){echo "Appetizers";}elseif($d==3){echo "Mains";}elseif($d==4){echo "Beverages";} ?>" >
                <option>Appetizers</option>
                <option>Mains</option>
                <option>Desserts</option>
                <option>Beverages</option>
                </select>
    </div>
    </div>
    <div class="row">
    <div class="col">
    <label for="cal">Calories</label>
      <input id="cal" required type="number" name="calories" class="form-control" value="<?php echo $r['calories'] ?>">
      
    </div>
    <div class="col">
        <div class="form-check">
            <input   name="healthy" class="form-check-input" type="checkbox" value="<?php echo $r['is_healthy'] ?>" id="healthy">
            <label class="form-check-label" for="healthy">
                Healthy
            </label>
        </div>
    </div>
  </div>

 <div class="form-group">
    <label>Recipe ingredients</label>
    <div id="form-placeholder1">
    <?php $ingr=$cntr->getRecipeIngr($recipe);
     $id1=0;
     while($fetch=$ingr->fetch(PDO::FETCH_ASSOC)){
       $ing=$fetch['ingredient_id'];
       $q2=$cntr->getIngredient($ing);
       $q2=$q2->fetch(PDO::FETCH_ASSOC);
       $iname=$q2['name'];
       $v=floatval($fetch['quantity']);
       echo "<div id='opt-row1.$id1'  class='form-group row'>
                   <div class='col-3'>
                      <select disabled required  class='selectpicker' data-live-search='true' id='ing$id1'  name='ing$id1'   >$ingrs</select>
                   </div>
                   <script>
                   select =  document.getElementById('ing$id1')
                   select.value = '$iname'</script>
                  <div class='col-2'style='padding-left:50px'>
                       <input  required type='number' class='form-control' id='qua' name='qua$id1'   value='$v'>
                   </div>
                   <div class='col-2'>
                    <button type='button' onclick=delRow1($id1) class='btn btn-danger'>Delete</button>
                   </div>
               </div>";
       $id1++;
       ?>
       
       <script>count1=parseInt(<?php echo $id1?>)</script>
    <?php } ?>
    
    </div>
    <button id="btn-add1" type="button" class="btn btn-primary">Add</button>
  </div>
  <div class="form-group">
    <label>Recipe Steps</label>
    <div id="form-placeholder">
    <?php $steps=$cntr->getRecipeStep($recipe);
     $id=0;
     while($fetch=$steps->fetch(PDO::FETCH_ASSOC)){
       $s=$fetch['instructions'];
       echo"<div id='opt-row$id' class='form-group row'>
        <div class='col'>
        <textarea required rows='2' class='form-control' id='step$id' name='step$id'>$s</textarea> 
        </div>
        <div class='col'>
        <button type='button' onclick=delRow($id) class='btn btn-danger'>Delete</button> 
       </div>
       </div>";
       $id++;
       ?>
       <script>count=parseInt(<?php echo $id?>)</script>
    <?php } ?>
    </div>
    <button id="btn-add" type="button" class="btn btn-primary">Add</button>

  </div>
  

  <div class="row">
  <button id="submit"  onclick="this.form.submit()" name="modifyrecipesubmit" value="<?php echo $recipe?>"  class="btn btn-primary btn-lg btn-block">Submit</button>
 </div>
</form>
    <?php
   
}
     
}

