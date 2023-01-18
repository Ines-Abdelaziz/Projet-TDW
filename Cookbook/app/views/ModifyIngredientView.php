<?php
require_once ('./app/controllers/ModifyIngredientController.php');
require_once ('./app/views/template.php');


Class ModifyIngredientView extends template{

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
      $this->ingredient();
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
  <div class="category-title">Modify News </div>  
</div>
<?php    
}

public  function ingredient()
{  $cntr= new ModifyIngredientController();
    $id=$_SESSION['ing'];
    $news=($cntr->getIngredient($id))->fetch(PDO::FETCH_ASSOC);
    ?>
   <script>console.log('<?php echo $id ?>')</script>
<div class="category-slogan">Modify Ingredient</div>
<form id ="form2" method="post" action="./app/controllers/apiroute.php"  >
  <div class="form-group">
    <label for="r-title">Name</label>
    <input required type="text" class="form-control" id="name" name="name" value="<?php echo $news['name'] ?>">
  </div>
 
  <div class="row">
    <div class="col">
      <input required type="number" name="calories" class="form-control" placeholder="Calories" value="<?php echo $news['calories'] ?>">
    </div>
    <div class="col">
      <input required type="number"  name="fat" class="form-control" placeholder="Fat" value="<?php echo $news['fat'] ?>">
    </div>
    <div class="col">
      <input required type="number"   name="protein" class="form-control" placeholder="Protein" value="<?php echo $news['protein'] ?>">
    </div>
    <div class="col">
      <input required type="number"  name="carbs" class="form-control" placeholder="Carbohydrates" value="<?php echo $news['carbohydrates'] ?>">
    </div>
  </div>
  <div class="row">
    <div class="col">
                <label for="category">Unit</label>
                <select required class="form-control" id="category" name="unit" value="<?php echo $news['unit_id'] ?>">
                <?php $cntr=new ModifyIngredientController();
                  $q=$cntr->getUnits();
                  while($fetch=$q->fetch(PDO::FETCH_ASSOC)){
                    $u=$fetch['name'];
                    $uid=$fetch['id'];
                    echo "<option value='$uid'>$u</option>";
                  }
                ?>
                </select>
    </div>
    <div class="col">
    <label for="healthy">Healthy</label>
      <input step=0.01 max=100 min=0 required id="healthy" type="number" name="healthy" class="form-control" value="<?php echo ($news['healthy'])*100 ?>">
    </div>
    <div class="col">
                <label for="diff">Season</label>
                <select required class="form-control" id="diff" name="season" value="<?php echo $news['season_id'] ?>">
                <option value='7'>None</option>
                <option value='1'>Winter</option>
                <option value='3'>Spring</option>
                <option value='2'>Summer</option>
                <option value='4'>Autumn</option>
                <option value='6'>All</option>
                </select>
    </div>
    </div>
  
  <div class="row">
  <button id="submit"  onclick="this.form.submit()" name="modifyingsubmit" value="<?php echo $id ?>" class="btn btn-primary btn-lg btn-block">Submit</button>
 </div>
</form>

    <?php
   
}
     
}

