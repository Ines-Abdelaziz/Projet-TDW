<?php
    require '../models/AddNewsModel.php'; 
    require '../views/AddNewsView.php';  

Class AddNewsController{
  
    public function index()
    {       
        $v= new AddNewsView();
        $v->index(); 
    }

    
    
  
    
}