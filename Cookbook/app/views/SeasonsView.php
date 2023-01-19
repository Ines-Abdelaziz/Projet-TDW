<?php
require_once ('./app/controllers/SeasonsController.php');
require_once ('./app/views/template.php');


Class SeasonsView extends template{

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
      $this->management();
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
  <img src="../../public/images/Seasons.jpg" alt="">
  <div class="category-title">Seasons</div>  
</div>
<?php    
}
public function management(){
    ?>
    <div style="height: 100px;"></div>
    <div class="category-header1" onclick="location.href='/Autumn'">
        <img src="../../public/images/Fall.jpg" alt="">
        <div class="category1-title1">Autumn</div>  
    </div>
    <div style="height: 100px;"></div>
    <div class="category-header1" onclick="location.href='/Winter'">
        <img src="../../public/images/Winter.jpg" alt="">
        <div class="category1-title">Winter</div>  
    </div>
    <div style="height: 100px;"></div>
    <div class="category-header1" onclick="location.href='/Spring'">
        <img src="../../public/images/Spring.jpg" alt="">
        <div class="category1-title1">Spring</div>  
    </div>
    <div style="height: 100px;"></div>
    <div class="category-header1" onclick="location.href='/Summer'">
        <img src="../../public/images/Summer.jpg" alt="">
        <div class="category1-title">Summer</div>  
    </div>


<?php
}
     
}

