<?php
require_once ('./app/controllers/AddRecipeController.php');
require_once ('./app/views/template.php');


Class AddRecipeView extends template{

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
{  $cntr= new AddRecipeController();
    $q=$cntr->getIngredients();
    $ingrs='';
    foreach($q as $i){
      $iname=$i['name'];
      $iunit=($cntr->getUnit($i['unit_id']))->fetchColumn(1);
      $ingrs=$ingrs."<option>$iname ($iunit)</option>";
    }?>
     <script>
        var ingredients="<?php echo $ingrs ?>";
   </script>
<div class="category-slogan">New Recipe</div>
 <form method="post" action="./app/controllers/apiroute.php" enctype="multipart/form-data" >
  <div class="form-group">
    <label for="r-title">Title</label>
    <input required type="text" class="form-control" id="r-title" name="title" placeholder="Recipe title">
  </div>
  <div class="form-group">
    <label for="r-desc">Description</label>
    <textarea required class="form-control" id="r-desc" name="desc" rows="3" placeholder="Recipe Description .."></textarea>
  </div>
  <div class="form-group">
  <label for="image" class="form-label">Recipe Image</label>
  <input required class="form-control " name="image" id="image" type="file">
</div>
  <div class="row">
    <div class="col">
      <input required type="number" name="preparation_time" class="form-control" placeholder="Preparation time (min)">
    </div>
    <div class="col">
      <input required type="number"   name="cooking_time" class="form-control" placeholder="Cooking time (min)">
    </div>
    <div class="col">
      <input required type="number"  name="rest_time" class="form-control" placeholder="Rest time (min)">
    </div>
  </div>
  <div class="row">
    <div class="col">
                <label for="diff">Difficulty</label>
                <select required class="form-control" id="diff" name="diff">
                <option>Easy</option>
                <option>Intermediate</option>
                <option>Advanced</option>
                </select>
    </div>
    <div class="col">
                <label for="category">Category</label>
                <select required class="form-control" id="category" name="category">
                <option>Appetizers</option>
                <option>Mains</option>
                <option>Desserts</option>
                <option>Beverages</option>
                </select>
    </div>
    </div>
    <div class="row">
    <div class="col">
      <input required type="number" name="calories" class="form-control" placeholder="Calories">

    </div>
    <div class="col">
        <div class="form-check">
            <input required  name="healthy" class="form-check-input" type="checkbox" value="" id="healthy">
            <label class="form-check-label" for="healthy">
                Healthy
            </label>
        </div>
    </div>
  </div>

 <div class="form-group">
    <label>Recipe ingredients</label>
    <div id="form-placeholder1"></div>
    <button id="btn-add1" type="button" class="btn btn-primary">Add</button>
  </div>
  <div class="form-group">
    <label>Recipe Steps</label>
    <div id="form-placeholder"></div>
    <button id="btn-add" type="button" class="btn btn-primary">Add</button>

  </div>
  

  <div class="row">
  <button id="submit"  onclick="this.form.submit()" name="recipesubmit"  class="btn btn-primary btn-lg btn-block">Submit</button>
 </div>
</form>
    <?php
   
}
     
}

