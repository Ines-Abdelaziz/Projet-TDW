<?php
require_once ('./app/controllers/CategoryController.php');
require_once ('./app/views/template.php');


Class CategoryView extends template{

public function index($category){
    $this->main();
    $this->corps_page($category);

}

//corps de la page
public function corps_page($category){
  ?>
  <body>
  <link rel="stylesheet" href="../../public/css/category.css">
    <?php
      $this->category($category);
      $this->recipes($category);
      $this->footer();
    ?>
 
  </body>
  <?php
}

//category image and title
public  function category($category)
{ $cntr=new CategoryController();
    $q=$cntr->getCategory($category);
    foreach($q as $c){
    ?>
<div class="category-header">
  <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($c['image']).'"/>'; ?>
  <div class="category-title"><?php echo $c['name'];?></div>  
</div>
<div class="category-slogan"><?php echo $c['description'];?></div>
<?php  }  
}

public function recipes($category){
  $cntr=new CategoryController($category);
  $sort = isset($_POST['sort']) ? $_POST['sort'] : 'calories';
  ?>
  <form action="" method="post" class="c-sort-form"> 
     <label class="c-sort-label"  for="sort">Sort by : </label>
     <div class="c-select-wrap">
        <select onchange="this.form.submit()" name="sort" id="sort">
            <option <?= ($sort ==='calories') ? 'selected="selected"' : ''?> value="calories">Calories</option>
            <option <?= ($sort ==='rating') ? 'selected="selected"' : ''?> value="rating">Rating</option>
            <option <?= ($sort ==='cooking_time') ? 'selected="selected"' : ''?> value="cooking_time">Cooking Time</option>
            <option <?= ($sort ==='preparation_time') ? 'selected="selected"' : ''?> value="preparation_time">Preparation Time</option>
        </select>
     </div>
  </form>
  <div class="c-cards-wrap">
  <?php
 

  switch($sort) {
    case 'rating':
        $orderBy = 'rating DESC';
        break;
    case 'cooking_time':
        $orderBy = 'cooking_time ASC';
        break;
    case 'preparation_time':
        $orderBy = 'preparation_time DESC';
        break;
    case 'calories':
        $orderBy = 'calories ASC';
  }
  $q=$cntr->filterBy($category,$orderBy);
  foreach($q as $r){
    ?>
     
     <div class="category-card">
        <div class="category-recipe">
            <div class="image-box"> <a href="<?php $title = str_replace(' ', '_', $r['name']); echo "/recipe/$title" ; ?>">
                <?php  $image = $cntr->getImage($r['id']);
                    foreach ($image as $i){
                        echo '<img src="data:image/jpeg;base64,'.base64_encode($i['imageurl']).'"/>';}?>?></a>
            </div>
            <div class="c-recipe-content">
               <div class="c-container"> <div class="c-recipe-title"><?php echo $r['name'] ?></div> <div class="c-save"><button><i  class="fa-regular fa-bookmark fa-2xl "></i></button></div> </div>
                <div class="c-recipe-desc"><?php echo $r['description'] ?></div>
                <div class="c-info">
                    <div class="c-calories"><i class="fa-solid fa-fire-flame-curved  fa-sm"></i><?php echo $r['calories']?> CAL</div>
                    <div class="c-time"><i class="fa-solid fa-clock fa-sm "></i><?php $time=$r['preparation_time']+$r['cooking_time']+$r['rest_time']; echo $time?>min</div>
                    <div class="c-level"><i class="fa-solid fa-mug-hot fa-sm "></i><?php $level=$r['difficulty'];
                        if ($level==1) {
                        echo "Easy";} 
                        elseif ($level==2) {
                        echo "Intermediate";} 
                        else {
                        echo "Advanced";}?></div>
                    </div>
                
            </div>
        </div>
    </div>
     
    <?php
  }?></div><?php
}
}