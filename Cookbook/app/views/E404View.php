<?php
require_once ('./app/controllers/AdminHomeController.php');
require_once ('./app/views/template.php');


Class E404View extends template{

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
      $this->error();
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
  <div class="category-title">404 Error</div>  
</div>
<?php    
}
public function error(){
  ?>
  <div style="text-align: center; font-family:'Helvetica';font-size:120px;font-weight:800;color:#FF9F0D;padding-top:50px;">404</div>
  <div style="text-align: center; font-family:'Inter';font-size:22px;font-weight:500;color:#FFF;padding-top:10px;">Oops! Looks like something went wrong</div>
  <div style="text-align: center; font-family:'Inter';font-size:16px;font-weight:500;color:#C4C4C4;padding-top:15px;">Page Cannot be found! we’ll have it figured out in no time. Meanwhile, check out these fresh recipes</div>
  <a style="display:inline-block;text-align: center; margin-left:48%; text-decoration :none;color:#FFF; background:#FF9F0D; height:45px;width:90px;vertical-align: middle;line-height: 45px;font-size:18px; margin-top:20px;border-radius:5px; font-weight:bold" href="/home">Home</a>
<?php
}

     
}

