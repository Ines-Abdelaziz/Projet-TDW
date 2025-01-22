<?php

    require_once __DIR__.'/../models/NewsModel.php'; 
    require __DIR__.'/../views/NewsView.php';   

Class NewsController{
  
    public function index($newstitle)
    {
        $v= new NewsView();
        $v->index($newstitle); 
    }

   
    public function getNews($newstitle){
        $model=new NewsModel();
        $r=$model->getNews($newstitle);
        return $r;
    }
    

    
   
}