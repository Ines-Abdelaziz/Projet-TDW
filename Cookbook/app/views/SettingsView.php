<?php
require_once ('./app/controllers/SettingsController.php');
require_once ('./app/views/template.php');


Class SettingsView extends template{

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
      $this->diaporama();
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
  <div class="category-title">Settings</div>  
</div>
<?php    
}

public function diaporama(){
    ?>  <div class="category-slogan">Diaporama Display</div>
    <form method="post" action="./app/controllers/apiroute.php" >
        <div class="form-group" style="padding-left: 120px !important;">
        <label for="recipeselect">Recipes to be displayed in diaporama</label>
        <select name='diapo_recipes[]' id="recipeselect" class="selectpicker" multiple data-live-search="true" onchange="this.form.submit()">
       
            <?php
             $cntr=new SettingsController();
             $q=$cntr->recipes();
             while($fetch=$q->fetch(PDO::FETCH_ASSOC)){
                ?>
                <option <?php if($cntr->isDisplayedRecipe($fetch['id'])) { echo 'selected="selected"' ;}?> value="<?php echo $fetch['id']; ?>" > <?php echo $fetch['name'] ?> </option>
                <?php
             }
            ?>
        </select>
        </div>
    </form>
        <div class="container">
            <table id="table" 
                    data-toggle="table"
                    data-search="true"
                    data-filter-control="true" 
                    data-click-to-select="true"
                    data-toolbar="#toolbar"
            class="table-responsive">
            <thead>
                <tr>
                <th data-field="id" data-filter-control="input" data-sortable="true">Id</th>
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
                $cntr=new SettingsController();
                $recipes=$cntr->diapoRecipes();
                foreach($recipes as $r){
                    $r=($cntr->getRecipeById($r['recipe_id']))->fetch(PDO::FETCH_ASSOC);
                    ?><tr>
                        <td><?php echo $r['id'] ;?></td>
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
        <form method="post" action="./app/controllers/apiroute.php">
        <div style="padding-left: 120px !important;" class="form-group">
        <label for="recipeselect">News to be displayed in Diaporama</label>
        <select name='diapo_news[]' id="recipeselect" class="selectpicker " multiple data-live-search="true"  onchange="this.form.submit()">
        
        <?php
             $cntr=new SettingsController();
             $q=$cntr->news();
             while($fetch=$q->fetch(PDO::FETCH_ASSOC)){
                ?>
                <option <?php if($cntr->isDisplayedNews($fetch['id'])) { echo 'selected="selected"' ;}?> value="<?php echo $fetch['id']; ?>" > <?php echo $fetch['title'] ?> </option>
                <?php
             }
            ?>
        </select>
        <script>$('select').selectpicker();</script>
        </div>
        </form>
        <div class="container">
                <table id="table" 
                        data-toggle="table"
                        data-search="true"
                        data-filter-control="true" 
                        data-click-to-select="true"
                        data-toolbar="#toolbar"
                class="table-responsive">
                <thead>
                    <tr>
                    <th data-field="id" data-filter-control="input" data-sortable="true">Id</th>
                        <th   data-field="title" data-filter-control="input" data-sortable="true">Title </th>
                        <th  data-field="desc" data-filter-control="input" data-sortable="true">Description</th>
                        <th  data-field="article" data-filter-control="input" data-sortable="true">Article</th>
                        <th  data-field="image">Image</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $cntr=new SettingsController();
                    $recipes=$cntr->diapoNews();
                    foreach($recipes as $r){
                        $r=($cntr->getNewsById($r['news_id']))->fetch(PDO::FETCH_ASSOC);
                        ?><tr>
                            <td><?php echo $r['id'] ;?></td>
                            <td><?php echo $r['title'] ;?></td>
                            <td><?php echo $r['description'] ;?></td>
                            <td><?php $c= $r['content'] ;
                            $out = strlen($c) > 50 ? substr($c,0,200)."..." : $c;
                            echo $out;
                            ?></td>
                            <td><a href="/news/article/<?php $title = str_replace(' ', '_', $r['title']); echo $title ;?>">View</a></td>
                            <td><?php echo '<img style="height: 300px;
                width: 300px; 
                object-fit: contain;" src="data:image/jpeg;base64,'.base64_encode($r['img']).'"/>' ;?></td>
                           
                        </tr><?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    <?php
   

}    
}

