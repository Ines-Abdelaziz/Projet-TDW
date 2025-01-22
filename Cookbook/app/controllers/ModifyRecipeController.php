<?php
    require __DIR__.'/../models/ModifyRecipeModel.php'; 
    require __DIR__.'/../views/ModifyRecipeView.php';  

Class ModifyRecipeController{
  
    public function index()
    {       
        $v= new ModifyRecipeView();
        $v->index(); 
    }

    public function getIngredients(){
        $model=new AddRecipeModel();
        $r=$model->getIngredients();
        return $r;
    }
    public function getIngredient($id){
        $model=new AddRecipeModel();
        $r=$model->getIngredient($id);
        return $r;
    }
    public function getUnit($unitId){
        $model=new AddRecipeModel();
        $r=$model->getUnit($unitId);
        return $r;
    }
    public function getRecipe($recipeId){
        $model=new AddRecipeModel();
        $r=$model->getRecipe($recipeId);
        return $r;
    }
    public function getRecipeStep($recipeId){
        $model=new AddRecipeModel();
        $r=$model->getRecipeStep($recipeId);
        return $r;
    }
    public function getRecipeIngr($recipeId){
        $model=new AddRecipeModel();
        $r=$model->getRecipeIngr($recipeId);
        return $r;
    }
    
  
    
}