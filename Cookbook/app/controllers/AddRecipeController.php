<?php

    require __DIR__.'/../views/AddRecipeView.php';  
    require __DIR__.'/../models/AddRecipeModel.php'; 

Class AddRecipeController{
  
    public function index()
    {       
        $v= new AddRecipeView();
        $v->index(); 
    }

    public function getIngredients(){
        $model=new AddRecipeModel();
        $r=$model->getIngredients();
        return $r;
    }
    public function getUnit($unitId){
        $model=new AddRecipeModel();
        $r=$model->getUnit($unitId);
        return $r;
    }
    
  
    
}