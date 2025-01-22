<?php

    require '../views/SeasonsView.php';   

Class SeasonsController{
  
    public function index()
    {       
        $v= new SeasonsView();
        $v->index(); 
    }

    
  
    
}