<?php
require_once ('./app/controllers/NewsController.php');
require_once ('./app/views/template.php');


Class NewsView extends template{

public function index($newstitle){
    $this->main();
    $this->corps_page($newstitle);

}

//corps de la page
public function corps_page($newstitle){
  ?>
  <body>
  <link rel="stylesheet" href="../../public/css/recipe.css">
  <link rel="stylesheet" href="../../public/css/news.css">
    <?php
      $this->News($newstitle);
      $this->footer();
    ?>
   <script src="../../public/js/news.js"></script>
  </body>
  <?php
}

public function News($newstitle)
{ 
  $cntr=new NewsController();
  $q=$cntr->getNews($newstitle);
  
    ?>
<div class="category-header">
<img src="../../public/images/news.jpg"/> 
  <div class="category-title"><a href="/news">News</a></div>  
</div>
 
<?php  foreach($q as $n){ 
    ?>
    <div class="wrap">
    <div class="text-wrap">
    <div class="title"><?php echo $n['title'] ;?></div>
    <div class="desc"><?php echo $n['description']?></div>
    <div class="article"><?php echo $n['content']?></div>
    </div>
    <div class="image"> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($n['img']).'"/>'; ?></div>
    </div>
   
   <?php }
  
}
}

