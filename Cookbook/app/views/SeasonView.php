<?php
require_once ('./app/controllers/SeasonController.php');
require_once ('./app/views/template.php');


Class SeasonView extends template{

public function index($season){
    $this->main();
    $this->corps_page($season);

}

//corps de la page
public function corps_page($season){
  ?>
  <body>
  <link rel="stylesheet" href="../../public/css/category.css">
    <?php
      $this->category($season);
      $this->recipes($season);
      $this->footer();
    ?>
 
  </body>
  <?php
}

//category image and title
public  function category($season)
{ $cntr=new SeasonController();
    $q=$cntr->getSeason($season);
    if($q=="Winter"){
    ?>
<div class="category-header">
  <img src="../../public/images/Winter.jpg" />
  <div class="category-title">Winter</div>  
</div>
<div class="category-slogan">Winter is the time for good food and warmth</div>
<?php }
if($q=="Summer"){
    ?>
<div class="category-header">
  <img src="../../public/images/Summer.jpg" />
  <div class="category-title">Summer</div>  
</div>
<div class="category-slogan">It's the summer, so eat dessert first.</div>
<?php }
if($q=="Autumn"){
    ?>
<div class="category-header">
  <img src="../../public/images/Fall.jpg">
  <div class="category-title">Autumn</div>  
</div>
<div class="category-slogan">It's Autumn, Pumpkin Pie time.</div>
<?php }
if($q=="Spring"){
    ?>
<div class="category-header">
  <img src="../../public/images/Spring.jpg">
  <div class="category-title">Spring</div>  
</div>
<div class="category-slogan">Spring, time to unlock some healthy recipes.</div>
<?php }
}

public function recipes($season){
  $cntr=new SeasonController($season);
  $q=$cntr->recipes($season);
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