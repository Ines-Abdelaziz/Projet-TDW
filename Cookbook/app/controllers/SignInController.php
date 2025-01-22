<?php

    require_once '../models/SignInModel.php'; 
    require '../views/SignInView.php';   

Class SignInController{
  
    public function index()
    {       
        $v= new SignInView();
        $v->index(); 
    }
    
    public function Login($email,$password)
    {
        $model=new SignInModel();
        $r=$model->Login($email,$password);
        return $r;
    }
    public function getUserId($email){
        $model= new SignInModel();
        $r=$model->getUserId($email);
        return $r;
    }
    public function ifAdmin($email,$password)
    {
        $model=new SignInModel();
        $r=$model->ifAdmin($email,$password);
        return $r;
    }
    public function Logout(){
        session_destroy();
        echo"<script type='text/javascript'>location.href = '/home';</script>";
    }
   
   
  
  
  
    
}