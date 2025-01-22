<?php

    require __DIR__.'/../views/AdminHomeView.php';   

Class AdminHomeController{
  
    public function index()
    {       
        $v= new AdminHomeView();
        $v->index(); 
    }

    
  
    
}