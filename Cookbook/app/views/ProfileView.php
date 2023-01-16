<?php
require_once ('./app/controllers/ProfileController.php');
require_once ('./app/controllers/SignInController.php');
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
    if (isset($_SESSION['role'])){
        if ($_SESSION['role']=="admin"){
            $userId=$_SESSION['userid'];
            }else{
            $userId=$_SESSION['user'];
            }
        }
    
    $user=$cntr->getUser($userId);
    $user=$user->fetch();
    ?>
     <div style="display: flex; justify-content: space-between;">
     <div class="user">Hello <span><?php echo $user['first_name'];echo" " ;echo $user['last_name'];?></span></div>
     <?php if(isset($_SESSION['role'])){
        if ($_SESSION['role']=='user'  ) {
            ?>
      <div class="logoutwrap" ><form method="post"><button class="logout" name="logout">Log Out <i class="fa-solid fa-right-from-bracket"></i></button></form> </div>

            <?php
        }
     }  ?>
    
    </div>
    <?php
      if (isset($_POST['logout'])){
        $cntr= new SignInController();
        $r=$cntr->Logout();
     }
}

public function recipes(){
  $cntr=new ProfileController();
  ?>
  <div class="favorite-title">My Favorite Recipes</div>
  <div class="c-cards-wrap">
  <?php
   if (isset($_SESSION['role'])){
    if ($_SESSION['role']=="admin"){
        $userId=$_SESSION['userid'];
        }else{
        $userId=$_SESSION['user'];
        }
    }
  $q=$cntr->getFavorites($userId);
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