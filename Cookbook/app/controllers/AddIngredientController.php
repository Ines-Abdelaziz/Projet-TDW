<?php

    require './app/views/AddIngredientView.php';  
    require './app/models/AddIngredientModel.php'; 

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