<?php

    require __DIR__.'/../views/SeasonsView.php';   

Class SeasonsController{
  
    public function index()
    {       
        $v= new SeasonsView();
        $v->index(); 
    }

    
  
    
}