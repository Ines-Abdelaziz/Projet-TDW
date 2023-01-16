<?php

    require './app/views/E404View.php';   

Class E404Controller{
  
    public function index()
    {       
        $v= new E404View();
        $v->index(); 
    }

    
  
    
}