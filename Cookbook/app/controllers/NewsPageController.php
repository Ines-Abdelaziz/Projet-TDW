<?php

    require_once __DIR__.'/../models/NewsPageModel.php'; 
    require __DIR__.'/../views/NewsPageView.php';   

Class NewsPageController{
  
    public function index()
    {
        $v= new NewsPageView();
        $v->index(); 
    }

    public function getCards(){
        $model=new NewsPageModel();
        $r=$model->getCards();
        return $r;
    }
    public function getMedia($recpeId){
        $model=new NewsPageModel();
        $r=$model->getMedia($recpeId);
        return $r;
    }
    
    public function getNews($newsId){
        $model=new NewsPageModel();
        $r=$model->getNews($newsId);
        return $r;
    }
    public function getRecipe($recpeId){
        $model=new NewsPageModel();
        $r=$model->getRecipe($recpeId);
        return $r;
    }
   


    
   
}