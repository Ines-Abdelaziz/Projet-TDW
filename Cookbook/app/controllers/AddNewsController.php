<?php
    require './app/models/AddNewsModel.php'; 
    require './app/views/AddNewsView.php';  

Class AddNewsController{
  
    public function index()
    {       
        $v= new AddNewsView();
        $v->index(); 
    }

    
    
  
    
}