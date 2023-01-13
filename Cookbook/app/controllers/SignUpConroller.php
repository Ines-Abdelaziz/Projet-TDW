<?php

    require_once './app/models/SignUpModel.php'; 
    require './app/views/SignUpView.php';   

Class SignUpController{
  
    public function index()
    {       
        $v= new SignUpView();
        $v->index(); 
    }
    
    public function checkUser($email)
    {
        $model=new SignUpModel();
        $r=$model->checkUser($email);
        return $r;
    }
    public function insertUser($Fname,$Lname,$sex,$Bdate,$email,$password)
    {
        $model=new SignUpModel();
        $r=$model->insertUser($Fname,$Lname,$sex,$Bdate,$email,$password);
        return $r;
    }
    public function SignUp()
    {   
        if($_SERVER['REQUEST_METHOD'] == "POST"){
        $fname=$_POST['first_name'];
        $lname=$_POST['last_name'];
        $sex=$_POST['sexe'];
        $bd=$_POST['date'];
        $bd=str_replace('/','-',$bd);
        $bd=date("Y-m-d", strtotime($bd));
        $email=$_POST['email'];
        $pswd=$_POST['password'];
        $pswdc=$_POST['confirm_password'];
        if ($pswd==$pswdc){
        $count=$this->checkUser($email);
        if($count > 0){
            echo 'This User Already Exists';
        }else{
            $this->insertUser($fname,$lname,$sex,$bd,$email,$pswd);
        }}else {
            echo "not same password";
        }  }
    }
  
  
  
    
}