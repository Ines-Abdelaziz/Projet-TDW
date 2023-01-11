<?php

Class template{

public function main(){
    $this->entete_page();
    $this->menu();
}

public function entete_page(){?>
    <head>
    <link rel="stylesheet" href="../../public/css/template.css"/>
    <meta http-equiv="Pragma" content="no-cache">
    <title>Cookbook</title>
        <meta name="Cookbook" content="Recipes Website"/>
        <link href="https://fonts.cdnfonts.com/css/helvetica-2" rel="stylesheet">
        <script src="https://kit.fontawesome.com/9693a52dfe.js" crossorigin="anonymous"></script>  
        <link rel="preconnect" href="https://rsms.me/">
            <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
            <link href='https://fonts.googleapis.com/css?family=Great Vibes' rel='stylesheet'> 
            
    </head>
    <?php
  }




public  function menu(){
?>
  <div class="menu">
      <img src="../../public/images/Logo.png" >
      <div class="menu-titles">
       <a id="home-menu" href="/home">Home</a>
       <a id="news-menu" href="#">News</a>
       <a id="recipes-menu" href="#">Recipes</a>
       <a id="healthy-menu"href="#">Healthy</a>
       <a id="seasons-menu" href="#">Seasons</a>
       <a id="festivals-menu" href="#">Festivals</a>
       <a id="nutrition-menu" href="#">Nutrition</a>
       <a id="contact-menu" href="#">Contact</a>
      </div>
      <button>Sign Up <i class="fa-solid fa-arrow-right-long"></i></button>
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
                <li><a href="#"><i  class="fa-solid fa-chevron-right fa-xs"></i> Home</a></li>
                <li><a href="#"><i  class="fa-solid fa-chevron-right fa-xs"></i> News</a></li>
                <li><a href="#"><i  class="fa-solid fa-chevron-right fa-xs"></i> Recipes</a></li>

                <li><a href="#"><i  class="fa-solid fa-chevron-right fa-xs"></i> Healthy</a></li>
                <li><a href="#"><i  class="fa-solid fa-chevron-right fa-xs"></i> Seasons</a></li>
                <li><a href="#"><i  class="fa-solid fa-chevron-right fa-xs"></i> Festivals</a></li>
                <li><a href="#"><i  class="fa-solid fa-chevron-right fa-xs"></i> Nutrition</a></li>
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