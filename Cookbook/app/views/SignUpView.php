<?php
require_once ('./app/controllers/FestivalsController.php');
require_once ('./app/views/template.php');


Class SignUpView extends template{

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
      $this->SignUpFrom();
      $this->footer();
    ?>
    <script src="../../public/js/jquery-3.3.1.min.js"></script>
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
  <div class="category-title">Sign Up</div>  
</div>
<?php    
}
public  function SignUpFrom()
{ $cntr=new SignUpController();
?>
 <div class="form-wrap">
 <div class="signup-form">
    <form action="<?php $cntr->SignUp()?>" method="post">
		<h2>Sign Up</h2>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
			</div>        	
        </div>
        <div class="form-group row"> 
    <div class="col-8">
      <div class="srow">
      <div class="col">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="sexe" id="radio_0" type="radio" class="form-check-input" value="0"> 
        <label for="radio_0" class="custom-control-label">Female</label>
      </div>
      </div>
     <div class="col"> <div class="custom-control custom-radio custom-control-inline">
        <input name="sexe" id="radio_1" type="radio" class="form-check-input" value="1"> 
        <label for="radio_1" class="custom-control-label">Male</label>
      </div></div>
      </div>
    </div>
  </div> 
  <div class="form-group ">
      <div class="col-sm-10 col-sm-offset-2">
       <div class="input-group">
        
        <input class="form-control" id="date" name="date" placeholder="Birthday " type="text"/>
       </div>
      </div>
     </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
        </div>        
        <div class="form-group">
			<label class="checkbox-inline"><input class="form-check-input" type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group" id="signupdiv">
            <button type="submit"  name='submit' class="signup">Sign Up</button>
        </div>
    </form>
	<div class="hint-text">Already have an account? <a href="#">Login here</a></div>
</div>
 </div>
<?php



}

}