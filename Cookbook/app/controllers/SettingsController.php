<?php
    require __DIR__.'/../models/SettingsModel.php';   
    require __DIR__.'/../views/SettingsView.php';   


Class SettingsController{
  
    public function index()
    {       
        $v= new SettingsView();
        $v->index(); 
    }
    public function news()
    {
        $model=new SettingsModel();
        $r=$model->news();
        return $r;
    }
    public function recipes()
    {
        $model=new SettingsModel();
        $r=$model->recipe();
        return $r;
    }
    public function diapoRecipes()
    {
        $model=new SettingsModel();
        $r=$model->diapoRecipes();
        return $r;
    }
    public function diapoNews()
    {
        $model=new SettingsModel();
        $r=$model->diapoNews();
        return $r;
    }
    public function isDisplayedRecipe($id)
    {
        $model=new SettingsModel();
        $r=$model->isDisplayedRecipe($id);
        return $r;
    }
    public function isDisplayedNews($id)
    {
        $model=new SettingsModel();
        $r=$model->isDisplayedNews($id);
        return $r;
    }
    public function getRecipeById($id)
    {
        $model=new SettingsModel();
        $r=$model->getRecipeById($id);
        return $r;
    }
    public function getNewsById($id)
    {
        $model=new SettingsModel();
        $r=$model->getNewsById($id);
        return $r;
    }
    
  
    
}