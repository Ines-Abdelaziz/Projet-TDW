<?php
require_once ('./app/controllers/HealthyController.php');
require_once ('./app/views/template.php');


Class HealthyView extends template{

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
      $this->category();
      $this->recipes();
      $this->recipesc();
      $this->footer();
    ?>
 
  </body>
  <?php
}

//category image and title
public  function category()
{ ?>
<div class="category-header">
  <img src="../../public/images/healthy.jpg" />
  <div class="category-title">Healthy</div>  
</div>
<div class="category-slogan">the best healthy recipes just for you</div>
<?php
}

public function recipes(){
  $cntr=new HealthyController();
  $q=$cntr->recipes();
  ?><div class="category-slogan">Recipes with Healthy Ingredients</div><?php
  foreach($q as $r){
    ?>
     <div class="category-card">
        <div class="category-recipe">
            <div class="image-box"> <a href="<?php $title = str_replace(' ', '_', $r['name']); echo "/recipe/$title" ; ?>">
                <?php  $image = $cntr->getImage($r['id']);
                    foreach ($image as $i){
                        echo '<img src="data:image/jpeg;base64,'.base64_encode($i['imageurl']).'"/>';}?></a>
            </div>
            <div class="c-recipe-content">
               <div class="c-container"> <div class="c-recipe-title"><?php echo $r['name'] ?></div></div>
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
public function recipesc(){
    $cntr=new HealthyController();
    
    ?><div class="category-slogan">Recipes with calories  limit</div><?php
    $calories=0;
    ?>
    <form action="" method="post" class="c-sort-form"> 
       <label class="c-sort-label"  for="sort">Limit: </label>
       <div class="c-select-wrap">
          <input type='number' onchange="this.form.submit()" name="calories" id="sort" />   
          <input type="submit" name='csubmit' value="Submit">    
       </div>
    </form><?php
    if (isset($_POST['csubmit'])){$calories= $_POST['calories'];}  
    $q=$cntr->recipesc($calories);
    foreach($q as $r){
      ?>
       <div class="category-card">
          <div class="category-recipe">
              <div class="image-box"> <a href="<?php $title = str_replace(' ', '_', $r['name']); echo "/recipe/$title" ; ?>">
                  <?php  $image = $cntr->getImage($r['id']);
                      foreach ($image as $i){
                          echo '<img src="data:image/jpeg;base64,'.base64_encode($i['imageurl']).'"/>';}?></a>
              </div>
              <div class="c-recipe-content">
                 <div class="c-container"> <div class="c-recipe-title"><?php echo $r['name'] ?></div></div>
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