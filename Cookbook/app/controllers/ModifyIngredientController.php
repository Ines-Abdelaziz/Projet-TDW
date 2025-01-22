<?php
    require __DIR__.'/../models/ModifyIngredientModel.php'; 
    require __DIR__.'/../views/ModifyIngredientView.php';  

Class ModifyIngredientController{
  
    public function index()
    {       
        $v= new ModifyIngredientView();
        $v->index(); 
    }
    public function getIngredient($id){
        $model=new ModifyIngredientModel();
        $r=$model->getIngredient($id);
        return $r;  
    }
    public function getUnits(){
        $model=new ModifyIngredientModel();
        $r=$model->getUnits();
        return $r;  
    }

    
    
  
    
}