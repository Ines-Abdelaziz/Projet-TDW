<?php
    require __DIR__.'/../models/AdminNewsModel.php';   
    require __DIR__.'/../views/AdminNewsView.php';   


Class AdminNewsController{
  
    public function index()
    {       
        $v= new AdminNewsView();
        $v->index(); 
    }
    public function news()
    {
        $model=new AdminNewsModel();
        $r=$model->news();
        return $r;
    }
    public function recipes()
    {
        $model=new AdminNewsModel();
        $r=$model->recipe();
        return $r;
    }
    public function newsPageRecipes()
    {
        $model=new AdminNewsModel();
        $r=$model->newsPageRecipes();
        return $r;
    }
    public function newsPageNews()
    {
        $model=new AdminNewsModel();
        $r=$model->newsPageNews();
        return $r;
    }
    public function isDisplayedRecipe($id)
    {
        $model=new AdminNewsModel();
        $r=$model->isDisplayedRecipe($id);
        return $r;
    }
    public function isDisplayedNews($id)
    {
        $model=new AdminNewsModel();
        $r=$model->isDisplayedNews($id);
        return $r;
    }
    public function getRecipeById($id)
    {
        $model=new AdminNewsModel();
        $r=$model->getRecipeById($id);
        return $r;
    }
    public function getNewsById($id)
    {
        $model=new AdminNewsModel();
        $r=$model->getNewsById($id);
        return $r;
    }
    
  
    
}