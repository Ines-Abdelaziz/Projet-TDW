<?php

    require_once './app/models/RecipeModel.php'; 
    require './app/views/RecipeView.php';   

Class RecipeController{
  
    public function index($recipetitle)
    {
        $v= new RecipeView();
        $v->index($recipetitle); 
    }

    public function getRecipe($recipetitle){
        $model=new RecipeModel();
        $r=$model->getRecipe($recipetitle);
        return $r;
    }
    public function getMedia($recpeId){
        $model=new RecipeModel();
        $r=$model->getMedia($recpeId);
        return $r;
    }
    public function getRecipeSteps($recpeId){
        $model=new RecipeModel();
        $r=$model->getRecipeSteps($recpeId);
        return $r;
    }
    public function getRecipeIngredients($recpeId){
        $model=new RecipeModel();
        $r=$model->getRecipeIngredients($recpeId);
        return $r;
    }
    public function getIngredient($ingredientId){
        $model=new RecipeModel();
        $r=$model->getIngredient($ingredientId);
        return $r;
    }
    public function getUnit($ingredientId){
        $model=new RecipeModel();
        $r=$model->getUnit($ingredientId);
        return $r;
    }
    
    public function decimalToFraction($decimal){
        $model=new RecipeModel();
        $r=$model->decimalToFraction($decimal);
        return $r;
    }


    
   
}