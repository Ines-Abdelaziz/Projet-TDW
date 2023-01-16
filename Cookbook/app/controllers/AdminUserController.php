<?php

    require_once './app/models/AdminUserModel.php'; 
    require './app/views/AdminUserView.php';   

Class AdminUserController{
  
    public function index()
    {       
        $v= new AdminUserView();
        $v->index(); 
    }
    public function users()
    {
        $model=new AdminUserModel();
        $r=$model->users();
        return $r;
    }
    public function waitingList()
    {
        $model=new AdminUserModel();
        $r=$model->waitingList();
        return $r;
    }

    
 
  
    
}