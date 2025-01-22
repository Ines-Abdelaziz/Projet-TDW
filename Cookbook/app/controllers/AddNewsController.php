<?php
    require __DIR__.'/../models/AddNewsModel.php'; 
    require __DIR__.'/../views/AddNewsView.php';  

Class AddNewsController{
  
    public function index()
    {       
        $v= new AddNewsView();
        $v->index(); 
    }

    
    
  
    
}