<?php
require_once ('./app/controllers/ProfileController.php');
require_once ('./app/views/template.php');


Class ProfileView extends template{

public function index(){
    $this->main();
    $this->corps_page();

}

//corps de la page
public function corps_page(){
  ?>
  <body>
  <link rel="stylesheet" href="../../public/css/category.css">
  <link rel="stylesheet" href="../../public/css/profile.css">
    <?php
      $this->header();
      $this->user();
      $this->recipes();
      $this->footer();
    ?>
  </body>
  <?php
}

//category image and title
public  function header()
{
    ?>
<div class="category-header">
  <img src="../../public/images/news.jpg" alt="">
  <div class="category-title">Profile</div>  
</div>
<?php    
}
public function user(){
    $cntr=new ProfileController();
    $user=$cntr->getUser($_SESSION['user']);
    $user=$user->fetch();
    ?>
     <div class="user">Hello <span><?php echo $user['first_name'];echo" " ;echo $user['last_name'];?></span></div>
    <?php
}

public function recipes(){
  $cntr=new ProfileController();
  ?>
  <div class="favorite-title">My Favorite Recipes</div>
  <div class="c-cards-wrap">
  <?php

  $q=$cntr->getFavorites($_SESSION['user']);
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
               <div class="c-container"> <div class="c-recipe-title"><?php echo $r['name'] ?></div>  </div>
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