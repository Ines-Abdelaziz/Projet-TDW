<?php
require_once ('./app/controllers/HomeController.php');
require_once ('./app/views/template.php');


Class HomeView extends template{

public function index(){
    $this->main();
    $this->corps_page();

}

//corps de la page
public function corps_page(){
  ?>
  <body>
    <div class="home_section">
    <div class="layer">
      
    <?php
      
      $this->socials_menu();
      $this->diaporama()?>
    </div>
    </div>
      <?php
      $this->Appetizers();
      $this->Mains();
      $this->Desserts();
      $this->Drinks();
      $this->footer();
    ?>
  <script src="../../public/js/home.js"></script>
  </body>
  <?php
}

//socials menu
public function socials_menu(){?>
<div class="socials-menu">
    <div class="socials-line"></div>
    <div class="socials">
        <div><a href="#"><i class="fa-brands fa-facebook-f "></i></a></div>
        <div><a href="#"><i id="twitter" class="fa-brands fa-twitter "></i></a></div>
        <div><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></div>
    </div>
    <div class="socials-line"></div>
    </div>
<?php
}
//diaporama
public  function diaporama()
{
  $cntr=new HomeController();
  $q=$cntr->diaporama()?>
  <div class="slider0-wrap">
    <div class="slider0">
    <?php
    foreach ($q as $row){
    if ($row['type']=="news"){ 
      $news=$cntr->getNews($row['news_id']);
      foreach ($news as $n){?>
    <div class="slider0-item">
    <div class="text-wrap">
    <div class="slogan">Its Quick & Amusing!</div>
    <div class="title"><?php echo $n['title']; ?></div>
    <div class="description"><?php echo $n['description'] ?></div>
    
    
    <button class="readmore">Read More</button>
    </div>
    <div class="img1">
    <?php 
      echo '<img src="data:image/jpeg;base64,'.base64_encode($n['img']).'"/>';?>
    </div>
    </div>
    <?php }} else{
      $recipes=$cntr->getRecipe($row['recipe_id']);
      foreach($recipes as $r){?>
    <div class="slider0-item">
    <div class="text-wrap">
    <div class="slogan">Its Quick & Amusing!</div>
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
    <button class="readmore">Read More</button>
    </div>
    <div class="img">
    <?php 
    $image = $cntr->getImage($r['id']);
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
//Show Appetizers
 public function Appetizers()
 {
  $cntr=new HomeController();
  $q=$cntr->Appetizers()?>
  <div class="slider-wrap">
    <div onclick="plusSlides(-1)"  class="button-wrap-prev"><div class="next-button"><i class="fa-solid fa-chevron-left"></i></div></div>
    <div class="slider">
    <?php
    foreach ($q as $row)
    {?>
    <div class="slider-item">
    <div class="text-wrap">
    <div class="category"><a href="/appetizers">Appetizers</a></div>
    <div class="title"><?php echo $row['name'] ?></div>
    <div class="description"><?php echo $row['description'] ?></div>
    <div class="info">
    <div class="calories"><i class="fa-solid fa-fire-flame-curved "></i><?php echo $row['calories']?> CAL</div>
    <div class="time"><i class="fa-solid fa-clock "></i>
    <?php $time=$row['preparation_time']+$row['cooking_time']+$row['rest_time']; echo $time?>min
  </div>
    <div class="level"><i class="fa-solid fa-mug-hot "></i><?php $level=$row['difficulty'];
    if ($level==1) {
    echo "Easy";} 
    elseif ($level==2) {
    echo "Intermediate";} 
    else {
    echo "Advanced";}?>
  </div>
    </div>
    <button class="readmore">Read More</button>
    </div>
    <div class="img">
    <?php 
    $image = $cntr->getImage($row['id']);
    foreach ($image as $i){
      echo '<img src="data:image/jpeg;base64,'.base64_encode($i['imageurl']).'"/>';}?>
    </div>
    </div>
    <?php } ?>
    </div>
    <div onclick="plusSlides(1)" class="button-wrap-next"><div class="next-button"><i class="fa-solid fa-chevron-right"></i></div></div> 
    <div class="pagination">
        <div class="pagination-item"></div>
        <div class="pagination-item"></div>
      </div>
    </div>
    
    <?php
}
//Show Main courses
public function Mains()
{
  $cntr=new HomeController();
  $q=$cntr->Mains()?>
  <div class="slider-wrap">
    <div onclick="plusSlides1(-1)"  class="button-wrap-prev"><div class="next-button"><i class="fa-solid fa-chevron-left"></i></div></div>
    <div class="slider">
    <?php
    foreach ($q as $row)
    {?>
    <div class="slider1-item">
    <div class="text-wrap">
    <div class="category"><a href="/mains">Mains</a></div>
    <div class="title"><?php echo $row['name'] ?></div>
    <div class="description"><?php echo $row['description'] ?></div>
    <div class="info">
    <div class="calories"><i class="fa-solid fa-fire-flame-curved "></i><?php echo $row['calories']?> CAL</div>
    <div class="time"><i class="fa-solid fa-clock "></i>
    <?php $time=$row['preparation_time']+$row['cooking_time']+$row['rest_time']; echo $time?>min
  </div>
    <div class="level"><i class="fa-solid fa-mug-hot "></i><?php $level=$row['difficulty'];
    if ($level==1) {
    echo "Easy";} 
    elseif ($level==2) {
    echo "Intermediate";} 
    else {
    echo "Advanced";}?>
  </div>
    </div>
    <button class="readmore">Read More</button>
    </div>
    <div class="img">
    <?php
    $image = $cntr->getImage($row['id']);
    foreach ($image as $i){
      echo '<img src="data:image/jpeg;base64,'.base64_encode($i['imageurl']).'"/>';}?>
    </div>
    </div>
    <?php } ?>
    </div>
    <div onclick="plusSlides1(1)" class="button-wrap-next"><div class="next-button"><i class="fa-solid fa-chevron-right"></i></div></div> 
    <div class="pagination">
        <div class="pagination1-item"></div>
        <div class="pagination1-item"></div>
      </div>
    </div>
    <?php
}
//Show Desserts
public function Desserts()
{
  $cntr=new HomeController();
  $q=$cntr->Desserts()?>
  <div class="slider-wrap">
    <div onclick="plusSlides2(-1)"  class="button-wrap-prev"><div class="next-button"><i class="fa-solid fa-chevron-left"></i></div></div>
    <div class="slider">
    <?php
    foreach ($q as $row)
    {?>
    <div class="slider2-item">
    <div class="text-wrap">
    <div class="category"><a href="desserts">Desserts</a></div>
    <div class="title"><?php echo $row['name'] ?></div>
    <div class="description"><?php echo $row['description'] ?></div>
    <div class="info">
    <div class="calories"><i class="fa-solid fa-fire-flame-curved "></i><?php echo $row['calories']?> CAL</div>
    <div class="time"><i class="fa-solid fa-clock "></i>
    <?php $time=$row['preparation_time']+$row['cooking_time']+$row['rest_time']; echo $time?>min
  </div>
    <div class="level"><i class="fa-solid fa-mug-hot "></i><?php $level=$row['difficulty'];
    if ($level==1) {
    echo "Easy";} 
    elseif ($level==2) {
    echo "Intermediate";} 
    else {
    echo "Advanced";}?>
  </div>
    </div>
    <button class="readmore">Read More</button>
    </div>
    <div class="img">
    <?php 
    $image = $cntr->getImage($row['id']);
    foreach ($image as $i){
      echo '<img src="data:image/jpeg;base64,'.base64_encode($i['imageurl']).'"/>';}?>
    </div>
    </div>
    <?php } ?>
    </div>
    <div onclick="plusSlides2(1)" class="button-wrap-next"><div class="next-button"><i class="fa-solid fa-chevron-right"></i></div></div> 
    <div class="pagination">
        <div class="pagination2-item"></div>
        <div class="pagination2-item"></div>
      </div>
    </div>
    <?php
}
// Show Drinks
public function Drinks()
{
  $cntr=new HomeController();
  $q=$cntr->Drinks()?>
  <div class="slider-wrap">
    <div onclick="plusSlides3(-1)"  class="button-wrap-prev"><div class="next-button"><i class="fa-solid fa-chevron-left"></i></div></div>
    <div class="slider">
    <?php
    foreach ($q as $row)
    {?>
    <div class="slider3-item">
    <div class="text-wrap">
    <div class="category"><a href="/beverages">Beverages</a></div>
    <div class="title"><?php echo $row['name'] ?></div>
    <div class="description"><?php echo $row['description'] ?></div>
    <div class="info">
    <div class="calories"><i class="fa-solid fa-fire-flame-curved "></i><?php echo $row['calories']?> CAL</div>
    <div class="time"><i class="fa-solid fa-clock "></i>
    <?php $time=$row['preparation_time']+$row['cooking_time']+$row['rest_time']; echo $time?>min
  </div>
    <div class="level"><i class="fa-solid fa-mug-hot "></i><?php $level=$row['difficulty'];
    if ($level==1) {
    echo "Easy";} 
    elseif ($level==2) {
    echo "Intermediate";} 
    else {
    echo "Advanced";}?>
  </div>
    </div>
    <button class="readmore">Read More</button>
    </div>
    <div class="img">
    <?php 
    $image = $cntr->getImage($row['id']);
    foreach ($image as $i){
      echo '<img src="data:image/jpeg;base64,'.base64_encode($i['imageurl']).'"/>';}?>
    </div>
    </div>
    <?php } ?>
    </div>
    <div onclick="plusSlides3(1)" class="button-wrap-next"><div class="next-button"><i class="fa-solid fa-chevron-right"></i></div></div> 
    <div class="pagination">
        <div class="pagination3-item"></div>
        <div class="pagination3-item"></div>
      </div>
    </div>
    <?php
}
}