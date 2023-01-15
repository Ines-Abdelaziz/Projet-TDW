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
   
  
  
  
    
}