<?php
require_once ('./app/controllers/RecipeController.php');
require_once ('./app/controllers/CategoryController.php');
require_once ('./app/views/template.php');


Class RecipeView extends template{

public function index($recipetitle){
    $this->main();
    $this->corps_page($recipetitle);

}

//corps de la page
public function corps_page($recipetitle){
  ?>
  <body>
  <link rel="stylesheet" href="../../public/css/recipe.css">
  <link rel="stylesheet" href="../../public/css/category.css">
    <?php
      $this->Recipe($recipetitle);
      $this->footer();
    ?>
   <script src="../../public/js/recipe.js"></script>
  </body>
  <?php
}

public function Recipe($recipetitle)
{ 
  $cntr=new RecipeController();
  $q=$cntr->getRecipe($recipetitle);
  foreach($q as $r){
    $cntr1=new CategoryController();
    $q1=$cntr1->getCategory($r['category_id']);
    foreach($q1 as $c){
    ?>
<div class="category-header">
  <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($c['image']).'"/>'; ?>
  <div class="category-title"><a href="/<?php echo $c['name']; ?>"><?php echo $c['name'];?></a></div>  
</div>

<?php  }
    ?>
    <div class="r-title"><?php echo $r['name'] ;?></div>
    <div class="info">
    <div class="calories"><i class="fa-solid fa-fire-flame-curved  "></i><?php echo $r['calories']?> CAL</div>
    <div class="time"><i class="fa-solid fa-clock  "></i>
    <?php $time=$r['preparation_time']+$r['cooking_time']+$r['rest_time']; echo $time?>min
  </div>
    <div class="level"><i class="fa-solid fa-mug-hot  "></i><?php $level=$r['difficulty'];
    if ($level==1) {
    echo "Easy";} 
    elseif ($level==2) {
    echo "Intermediate";} 
    else {
    echo "Advanced";}?>
  </div>
    </div>
    <div class="recipe-wrap">
    <div class="ingredients">
      <div class="r-ingr-title">Ingredients</div>
      <div class="r-ingr-wrap">
      <?php 
      $ringrs=$cntr->getRecipeIngredients($r['id']);
      foreach($ringrs as $ri){
        ?>
        <div class="r-ingr"><?php $quantity=$cntr->decimalToFraction($ri['quantity']) ;
        echo "<span>$quantity</span>";
        echo ' ';
        $ing=$cntr->getIngredient($ri['ingredient_id']);
        foreach($ing as $i){
          $unit=$cntr->getUnit($i['unit_id']);
          foreach($unit as $u){
            echo $u['name'];
            if( $quantity>1){ echo 's ';}else{ echo ' '; }
          }
          echo $i['name'];
        }
        ?></div>
        <?php
      } 
      
      ?>
    <div class="r-detail-title">Time Details</div>
    
    <div class="time-wrap"> Preparation  <span> <?php echo $r['preparation_time'] ?>min </span> </div>
    <div class="time-wrap">Cooking <span> <?php echo $r['cooking_time'] ?>min </span> </div>
     <?php if($r['rest_time']!=0){ echo " <div class='time-wrap'> Rest  <span>";echo $r['rest_time']; echo "min</span></div>";}?>
     
    </div>
    </div>
    <div class="steps">
    <div class="r-steps-title">Preparation</div>
    <div class="r-steps-wrap">
    <?php
    $steps=$cntr->getRecipeSteps($r['id']);
    foreach($steps as $s){
      ?><div class="r-step"><div class="r-step-number"><?php echo $s['step_number']; ?></div> <?php echo $s['instructions'] ?></div><?php
    }
    
    $media=$cntr->getMedia($r['id']);
    foreach($media as $m){
     if ($m['videourl']!=NULL){
       echo "<video id='video'  src='../../public/videos/";echo $m['videourl'];echo"' preload='auto' controls autoplay></video>";
     }
    }
    ?>
   </div>
    </div>
    <div class="r-img">
      <?php 
      $media=$cntr->getMedia($r['id']);
        foreach($media as $m){
        echo '<img src="data:image/jpeg;base64,'.base64_encode($m['imageurl']).'"/>';
       }
      ?>
    </div>
    </div>
   <?php
  
}
}
}
