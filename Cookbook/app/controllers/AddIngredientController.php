<?php

    require_once __DIR__.'/../views/AddIngredientView.php';  
    require_once __DIR__.'/../models/AddIngredientModel.php'; 

Class AddIngredientController{
  
    public function index()
    {       
        $v= new AddIngredientView();
        $v->index(); 
    }

   
    public function getUnits(){
        $model=new AddIngredientModel();
        $r=$model->getUnits();
        return $r;
    }
    
  
    
}