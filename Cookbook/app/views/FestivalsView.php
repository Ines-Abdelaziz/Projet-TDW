<?php
require_once ('./app/controllers/FestivalsController.php');
require_once ('./app/views/template.php');


Class FestivalsView extends template{

public function index(){
    $this->main();
    $this->corps_page();

}

//corps de la page
public function corps_page(){
  ?>
  <body>
  <link rel="stylesheet" href="../../public/css/category.css">
    <?php
      $this->header();
      $this->recipes();
      $this->footer();
    ?>
    <script src="../../public/js/festivals.js"></script>
  </body>
  <?php
}

//category image and title
public  function header()
{
    ?>
<div class="category-header">
  <img src="../../public/images/festivals.jpg" alt="">
  <div class="category-title">Festivals</div>  
</div>
<div class="category-slogan">Food is the best part of Festivals</div>
<?php    
}

public function recipes(){
  $cntr=new FestivalsController();
  $sort = isset($_POST['sort']) ? $_POST['sort'] : '1=1';
  ?>
  <form action="" method="post" class="c-sort-form"> 
     <label class="c-sort-label"  for="sort">Filter by : </label>
     <div class="c-select-wrap">
        <select onchange="this.form.submit()" name="sort" id="sort">
        <option selected disabled hidden>Choose a Festival</option>
            <option <?= ($sort ==='achoura') ? 'selected="selected"' : ''?> value="achoura">Achoura</option>
            <option <?= ($sort ==='aid') ? 'selected="selected"' : ''?> value="aid">Aid</option>
            <option <?= ($sort ==='ramadan') ? 'selected="selected"' : ''?> value="ramadan">Ramadan</option>
            <option <?= ($sort ==='weddings') ? 'selected="selected"' : ''?> value="weddings">Weddings</option>
        </select>
     </div>
  </form>
  <div class="c-cards-wrap">
  <?php
 
 switch($sort) {
    case 'achoura':
        $sort = 'festival_id=1' ;
        break;
    case 'weddings':
        $sort = 'festival_id=2';
        break;
    case 'aid':
        $sort = 'festival_id=3';
        break;
    case 'ramadan':
        $sort = 'festival_id=4';
  }
  $q=$cntr->filterBy($sort);
  foreach($q as $r1){
    $q1=$cntr->getRecipe($r1['recipe_id']);
    foreach($q1 as $r){
    ?>
     
     <div class="category-card">
        <div class="category-recipe">
            <div class="image-box"> <a href="<?php $title = str_replace(' ', '_', $r['name']); echo "/recipe/$title" ; ?>">
                <?php  $image = $cntr->getImage($r['id']);
                    foreach ($image as $i){
                        echo '<img src="data:image/jpeg;base64,'.base64_encode($i['imageurl']).'"/>';}?></a>
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
  }}?></div><?php
}
}