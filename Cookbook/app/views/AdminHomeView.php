<?php
require_once ('./app/controllers/AdminHomeController.php');
require_once ('./app/views/template.php');


Class AdminHomeView extends template{

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
  <img src="../../public/images/news.jpg" alt="">
  <div class="category-title">Admin Home</div>  
</div>
<?php    
}
public function management(){
    ?>
    <div style="height: 100px;"></div>
    <div class="category-header1" onclick="location.href='/AdminRecipes'">
        <img src="../../public/images/gestionrecipe.jpg" alt="">
        <div class="category1-title1">Recipe Management</div>  
    </div>
    <div style="height: 100px;"></div>
    <div class="category-header1" onclick="location.href='/AdminNews'">
        <img src="../../public/images/newsmanage.jpg" alt="">
        <div class="category1-title">News Management</div>  
    </div>
    <div style="height: 100px;"></div>
    <div class="category-header1" onclick="location.href='/AdminUsers'">
        <img src="../../public/images/usermanage.jpg" alt="">
        <div class="category1-title1">Users Management</div>  
    </div>
    <div style="height: 100px;"></div>
    <div class="category-header1" onclick="location.href='/Settings'">
        <img src="../../public/images/settings.jpg" alt="">
        <div class="category1-title">Settings</div>  
    </div>

<?php
}
     
}

