<?php
require_once ('./app/controllers/ModifyNewsController.php');
require_once ('./app/views/template.php');


Class ModifyNewsView extends template{

public function index(){
    $this->main();
    $this->corps_page();

}

//corps de la page
public function corps_page(){
  ?>
  <body style="background: #0d0d0d !important;">
  <link rel="stylesheet" href="../../public/css/category.css">
  <link rel="stylesheet" href="../../public/css/addrecipe.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <?php
      $this->header();
      $this->news();
      $this->footer();
    ?>
  <script src="../../public/js/jquery-3.3.1.min.js"></script>
  <script src="../../public/js/addrecipe.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/i18n/defaults-*.min.js"></script>
  </body>
  <?php
}

//category image and title
public  function header()
{
    ?>
<div class="category-header">
  <img src="../../public/images/news.jpg" alt="">
  <div class="category-title">Modify News </div>  
</div>
<?php    
}

public  function news()
{  $cntr= new ModifyNewsController();
    $id=$_SESSION['news'];
    $news=($cntr->getNews($id))->fetch(PDO::FETCH_ASSOC);
    ?>
   
<div class="category-slogan">Modify News</div>
 <form id ="form2" method="post" action="./app/controllers/apiroute.php" enctype="multipart/form-data" >
  <div class="form-group">
    <label for="r-title">Title</label>
    <input required type="text" class="form-control" id="r-title" name="title" value="<?php echo $news['title'] ?>">
  </div>
  <div class="form-group">
    <label for="r-desc">Description</label>
    <textarea required class="form-control" id="r-desc" name="desc" rows="3" ><?php echo $news['description'] ?></textarea>
  </div>
  <div class="form-group">
    <label for="content">Article</label>
    <textarea required class="form-control" rows="10" id="content" name="content" ><?php echo $news['content']?></textarea>
  </div>
  <div class="form-group">
  <label for="image" class="form-label">News Image</label>
  <input  class="form-control " name="image" id="image" type="file">
</div>
  
  <div class="row">
  <button id="submit"  onclick="this.form.submit()" name="modifynewssubmit" value="<?php echo $id ?>" class="btn btn-primary btn-lg btn-block">Submit</button>
 </div>
</form>

    <?php
   
}
     
}

