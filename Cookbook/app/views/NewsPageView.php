<?php
require_once ('./app/controllers/NewsPageController.php');
require_once ('./app/views/template.php');


Class NewsPageView extends template{

public function index(){
    $this->main();
    $this->corps_page();

}

//corps de la page
public function corps_page(){
  ?>
  <body>
  <link rel="stylesheet" href="../../public/css/newspage.css">

    <?php
      $this->header();
      $this->Cards();
      $this->footer();
    ?>
  <script src="../../public/js/newspage.js"></script>
  </body>
  <?php
}
public  function header()
{ 
?>
<div class="category-header">
 <img src="../../public/images/news.jpg"/> 
  <div class="category-title">News</div>  
</div>
<?php  }  

public function Cards(){
    $cntr=new NewsPageController();
  $q=$cntr->getCards()?>
  <div class="slider0-wrap">
    <div class="slider0">
    <?php
    foreach ($q as $row){
    if ($row['type']=="news"){ 
      $news=$cntr->getNews($row['news_id']);
      foreach ($news as $n){?>
    <div class="slider0-item">
    <div class="img1">
    <?php 
      echo '<img src="data:image/jpeg;base64,'.base64_encode($n['img']).'"/>';?>
    </div>
    <div class="text-wrap0">
    <div class="slogan">News</div>
    <div class="title"><?php echo $n['title']; ?></div>
    <div class="description"><?php echo $n['description'] ?></div>
    
    
    <button class="readmore" onclick="location.href='/news/article/<?php 
    $title = str_replace(' ', '_', $n['title']);
    echo $title ;?>';">Read More</button>
    </div>
    
    </div>
    <?php }} else{
      $recipes=$cntr->getRecipe($row['recipe_id']);
      foreach($recipes as $r){?>
    <div class="slider0-item">
    <div class="text-wrap">
    <div class="slogan">Recipe</div>
    <div class="title"><?php echo $r['name'] ?></div>
    <div class="description"><?php echo $r['description'] ?></div>
    <div class="info">
    <div class="calories"><i class="fa-solid fa-fire-flame-curved "></i><?php echo $r['calories']?> CAL</div>
    <div class="time"><i class="fa-solid fa-clock "></i>
    <?php $time=$r['preparation_time']+$r['cooking_time']+$r['rest_time']; echo $time?>min
  </div>
    <div class="level"><i class="fa-solid fa-mug-hot "></i><?php $level=$r['difficulty'];
    if ($level==1) {
    echo "Easy";} 
    elseif ($level==2) {
    echo "Intermediate";} 
    else {
    echo "Advanced";}?>
  </div>
    </div>
    <button class="readmore" onclick="location.href='/recipe/<?php 
    $title = str_replace(' ', '_', $r['name']);
    echo $title ;?>';">Read More</button>
    </div>
    <div class="img">
    <?php 
    $image = $cntr->getMedia($r['id']);
    foreach ($image as $i){
      echo '<img src="data:image/jpeg;base64,'.base64_encode($i['imageurl']).'"/>';}?>
    </div>
    </div>

      <?php }
    } } ?>
    </div>
  </div>
    
    <?php
}

}