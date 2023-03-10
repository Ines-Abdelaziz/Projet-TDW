<?php
require_once('./app/controllers/SignInController.php');
Class template{

public function main(){
    $this->entete_page();
    $this->menu();
}

public function entete_page(){?>
    <head>
    <link rel="stylesheet" href="../../public/css/template.css"/>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
    <meta http-equiv="Pragma" content="no-cache">
    <title>Cookbook</title>
        <meta name="Cookbook" content="Recipes Website"/>
        <link href="https://fonts.cdnfonts.com/css/helvetica-2" rel="stylesheet">
        <script src="https://kit.fontawesome.com/9693a52dfe.js" crossorigin="anonymous"></script>  
        <link rel="preconnect" href="https://rsms.me/">
            <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
            <link href='https://fonts.googleapis.com/css?family=Great Vibes' rel='stylesheet'> 
            <script src="../../public/js/jquery-3.3.1.min.js"></script>
            
    </head>
    <?php
  }




public  function menu(){
?>
  <div class="menu">
      <img src="../../public/images/Logo.png" >
      <div class="menu-titles">
       <a id="home-menu" href="/home">Home</a>
       <a id="news-menu" href="/news">News</a>
       <a id="recipes-menu" href="/RecipeIdeas">Recipes</a>
       <a id="healthy-menu"href="/Healthy">Healthy</a>
       <a id="seasons-menu" href="/Seasons">Seasons</a>
       <a id="festivals-menu" href="/Festivals">Festivals</a>
       <a id="nutrition-menu" href="/Nutrition">Nutrition</a>
       <a id="contact-menu" href="/Contact">Contact</a>
      </div>
      <?php if (isset($_SESSION['loggedIn'])){if ($_SESSION['loggedIn']==true){
        if ($_SESSION['role']=='admin'){
        ?>
        <form method="post"><button name="logout">Log Out <i class="fa-solid fa-right-from-bracket"></i></button></form> 
        <button onclick="location.href='/AdminHome'" style="padding-left: 130px !important; padding-bottom:10px;">Admin Center <i class="fa-solid fa-screwdriver-wrench"></i></button>
        <?php
          if (isset($_POST['logout'])){
            $cntr= new SignInController();
            $r=$cntr->Logout();
         }
        }else{
      ?> 
      <button onclick="location.href='/Profile'">Profile<i style="padding-left: 10px;" class="fa-solid fa-user"></i></button>
      
      <?php
      }}}else{?>
      <button onclick="location.href='/SignIn'">Sign In <i class="fa-solid fa-arrow-right-long"></i></button>
   <?php }  ?>
    </div>
<?php

}


public  function footer(){
?>
  <footer>
    <div id="footer-line"></div>
    <div class="footer-row">
        <div class="Column" >
            <img  src="../../public/images/Logo.png">
            <p>Cookbook, your one-stop destination for delicious and easy-to-follow recipes!</p>
            <div class="footer-socials">
                <i class="fa-brands fa-facebook-f fa-lg"></i>
                <i class="fa-brands fa-twitter fa-lg"></i>
                <i class="fa-brands fa-instagram fa-lg"></i>
                <i class="fa-brands fa-youtube fa-lg"></i>
            </div>
          
        </div>
        <div class="Column" >
            <h1>Explore</h1>
            <div  class="footer-navbar">
              <ul>
                <li><a href="/home"><i  class="fa-solid fa-chevron-right fa-xs"></i> Home</a></li>
                <li><a href="/news"><i  class="fa-solid fa-chevron-right fa-xs"></i> News</a></li>
                <li><a href="/RecipeIdeas"><i  class="fa-solid fa-chevron-right fa-xs"></i> Recipes</a></li>

                <li><a href="/Healthy"><i  class="fa-solid fa-chevron-right fa-xs"></i> Healthy</a></li>
                <li><a href="/Seasons"><i  class="fa-solid fa-chevron-right fa-xs"></i> Seasons</a></li>
                <li><a href="/Festivals"><i  class="fa-solid fa-chevron-right fa-xs"></i> Festivals</a></li>
                <li><a href="/Nutrition"><i  class="fa-solid fa-chevron-right fa-xs"></i> Nutrition</a></li>
              </ul>
           
            </div>             
        </div>
        <div class="Column" id="footer-contact" >
            <h1>Contact us</h1>
            <div  class="footer-navbar">
              
                <li><a href="#"><i class="fa-solid fa-phone fa-sm"></i> +213 123456789</a></li>
                <li><a href="#"><i class="fa-regular fa-envelope-open fa-sm"></i> JandeDoe@mail.com</a></li>
                <li><a href="#"><i class="fa-regular fa-clock fa-sm"></i> Sun - Sat / 10:00 AM - 8:00 PM</a></li>   

            </div>
        </div>
    </div>
    <div id="footer-rec">

     <img src="../../public/images/footer_img.png" >

    </div>
        
    
</footer>
<?php
}

}