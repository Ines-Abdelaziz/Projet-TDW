<?php

    require './app/views/SeasonsView.php';   

Class SeasonsController{
  
    public function index()
    {       
        $v= new SeasonsView();
        $v->index(); 
    }

    
  
    
}