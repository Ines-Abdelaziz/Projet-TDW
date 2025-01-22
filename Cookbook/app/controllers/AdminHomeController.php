<?php

    require '../views/AdminHomeView.php';   

Class AdminHomeController{
  
    public function index()
    {       
        $v= new AdminHomeView();
        $v->index(); 
    }

    
  
    
}