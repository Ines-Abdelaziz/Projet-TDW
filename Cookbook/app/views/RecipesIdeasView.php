<?php
require_once ('./app/controllers/SettingsController.php');
require_once ('./app/views/template.php');


Class RecipeIdeasView extends template{

public function index(){
    $this->main();
    $this->corps_page();

}

//corps de la page
public function corps_page(){
  ?>
  <body style="background: #0D0D0D !important;">
  <link rel="stylesheet" href="../../public/css/category.css">
  <link rel="stylesheet" href="../../public/css/adminuser.css">
  <link rel="stylesheet" href="../../public/css/profile.css">
  <link rel="stylesheet" href="../../public/css/addrecipe.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
  <link rel="stylesheet" type="text/css" href="extensions/filter-control/bootstrap-table-filter-control.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.css">
    <?php
      $this->header();
      $this->recipes();
      $this->footer();
    ?>
  <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/i18n/defaults-*.min.js"></script>
  
  <?php
}

//category image and title
public  function header()
{
    ?>
<div class="category-header">
  <img src="../../public/images/news.jpg" alt="">
  <div class="category-title">Recipe Ideas</div>  
</div>
<?php    
}

public function recipes(){
    ?>  <div class="category-slogan">Find the Recipe that suits you best</div>
    <form method="post" action="" >
        <div class="form-group" style="padding-left: 120px !important;">
        <label for="recipeselect">Ingredients</label>
        <select name='ing[]' id="recipeselect" class="selectpicker" multiple data-live-search="true" >
       
            <?php
             $cntr=new RecipeIdeasController();
             $recipes=array();
             $q=$cntr->ingredients();
             while($fetch=$q->fetch(PDO::FETCH_ASSOC)){
                ?>
                <option  value="<?php echo $fetch['id']; ?>" > <?php echo $fetch['name'] ?> </option>
                <?php
             }
            ?>
        </select>
        <input type='submit' name="ingsubmit" value="submit" />
        </div>
    </form>
    <?php
    $ing=array();
    if (isset($_POST['ingsubmit'])){$ing= $_POST['ing'];  
    $recipes=$cntr->ideas($ing);
    ?>
        <div class="container">
            <table id="table" 
                    data-toggle="table"
                    data-search="true"
                    data-filter-control="true" 
                    data-click-to-select="true"
                    data-toolbar="#toolbar"
                    data-sort-name="rating"
                   data-sort-order="desc"
            class="table-responsive">
            <thead>
                <tr>
                    <th   data-field="name" data-filter-control="input" data-sortable="true">Name </th>
                    <th  data-field="desc" data-filter-control="input" data-sortable="true">Description</th>
                    <th  data-field="ptime" data-filter-control="input" data-sortable="true">Preparation Time</th>
                    <th  data-field="ctime" data-filter-control="input" data-sortable="true">Cooking Time</th>
                    <th  data-field="rtime" data-filter-control="input" data-sortable="true">Rest Time</th>
                    <th  data-field="difficulty" data-filter-control="select" data-sortable="true">Difficulty</th>
                    <th  data-field="category" data-filter-control="select" data-sortable="true">Category</th>
                    <th  data-field="healthy" data-filter-control="select" data-sortable="true">Healthy</th>
                    <th  data-field="calories" data-filter-control="input" data-sortable="true">Calories</th>
                    <th  data-field="rating" data-filter-control="input" data-sortable="true">Rating</th>
                    <th  data-field="nbraters" data-filter-control="input" data-sortable="true">Number of Raters</th>
                    <th></th>
                   
                </tr>
            </thead>
            <tbody>
            <?php 

                
                foreach($recipes as $r){
                    ?><tr>
                        <td><?php echo $r['name'] ;?></td>
                        <td><?php echo $r['description'] ;?></td>
                        <td><?php echo $r['preparation_time'] ;?></td>
                        <td><?php echo $r['cooking_time'] ;?></td>
                        <td><?php echo $r['rest_time'] ;?></td>
                        <td><?php $d=$r['difficulty'] ;if($d==1){echo "Easy";}elseif($d==2){echo "Intermediate";}elseif($d==3){echo "Advanced";}?></td>
                        <td><?php $d=$r['category_id'] ;if($d==1){echo "Desserts";}elseif($d==2){echo "Appetizers";}elseif($d==3){echo "Mains";}elseif($d==4){echo "Beverages";}?></td>
                        <td><?php $d=$r['is_healthy'] ;if($d==1){echo "Yes";}elseif($d==0){echo "No";}?></td>
                        <td><?php echo $r['calories'] ;?></td>
                        <td><?php echo $r['rating'] ;?></td>
                        <td><?php echo $r['nb_raters'] ;?></td>
                        <td><a href="/recipe/<?php $title = str_replace(' ', '_', $r['name']); echo $title ;?>">View</a></td>
                       </tr><?php
                }
                ?>

            </tbody>
            </table>
        </div>
        
    <?php }
   

}    
}

