<?php
require_once ('./app/controllers/ContactController.php');
require_once ('./app/views/template.php');


Class ContactView extends template{

public function index(){
    $this->main();
    $this->corps_page();

}

//corps de la page
public function corps_page(){
  ?>
  <body style="background:#0D0D0D!important">
  <link rel="stylesheet" href="../../public/css/category.css">
  <link rel="stylesheet" href="../../public/css/category.css">
  <link rel="stylesheet" href="../../public/css/addrecipe.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
   
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
  <div class="category-title">Contact Us</div>  
</div>
<?php    
}
public function error(){
  ?>
  <form method="post" style="width:600px!important;padding-top:100px;padding-left:100px;">
  <div class="form-group">
    <label for="r-desc">Contact Us</label>
    <textarea required class="form-control" id="r-desc" name="message" rows="3" placeholder="Send Us a message ..."></textarea>
  </div>
  <div class="row" >
  <button id="submit"style="width:200px!important;"  onclick="this.form.submit()" name="messagesubmit" value="<?php echo $_SESSION['user'] ?>" class="btn btn-primary btn-lg btn-block">Submit</button>
 </div>
</form>
<?php
if(isset($_POST['messagesubmit'])){
  $user=$_POST['messagesubmit'];
  $msg=$_POST['message'];
  $cntr= new ContactController();
  unset($_POST['messagesubmit']);
  unset($_POST['message']);
  $cntr->sendFeedback($user,$msg);

}


}

     
}

