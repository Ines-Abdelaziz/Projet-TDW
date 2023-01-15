<?php
require_once ('./app/controllers/FestivalsController.php');
require_once ('./app/views/template.php');


Class SignInView extends template{

public function index(){
    $this->main();
    $this->corps_page();

}

//corps de la page
public function corps_page(){
  ?>
  <body style="background: #0D0D0D !important;">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../public/css/category.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   
    <?php
      $this->header();
      $this->SignInFrom();
      $this->footer();
    ?>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script src="../../public/js/sign.js"></script>
    <link rel="stylesheet" href="../../public/css/sign.css">

  </body>
  <?php
}

public  function header()
{
    ?>
<div class="category-header">
  <img src="../../public/images/news.jpg" alt="">
  <div class="category-title">Sign In</div>  
</div>
<?php    
}
public  function SignInFrom()
{ $cntr=new SignInController(); 
?>
 <div class="form-wrap">
 <div class="signup-form">
    <form action='' method="post">
		<h2>Sign In</h2>
   
        <div class="form-group">
        	<input id="email" type="email" class="form-control" name="email" placeholder="Email" required="required" >
    
        </div>
		<div class="form-group">
            <input id="pwd" type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
        <div id="wrong" hidden>Wrong Email or Password</div>
		<div class="form-group" id="signupdiv">
            <button type="submit"  name='submit' class="signup">Sign In</button>
        </div>
    </form>
	<div class="hint-text">Don't have an account? <a href="#">Sign Up here</a></div>
</div>
 </div>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
   
    $email=$_POST['email'];
    $pswd=$_POST['password'];

    $count=$cntr->Login($email,$pswd);
    if($count > 0){
        $_SESSION["loggedIn"]=true;
        $_SESSION["email"]=$email;
        $_SESSION["user"]=$cntr->getUserId($email);
        if ($cntr->ifAdmin($email,$pswd)==1){
            $_SESSION["role"]="admin";
        }
		$_SESSION["role"]="user";
		echo"<script type='text/javascript'>location.href = '/home';</script>";
        
    }else{
        echo '<script>document.getElementById("wrong").hidden = false;</script>';
      
    }}


}

}