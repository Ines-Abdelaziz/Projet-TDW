<?php

    require_once './app/models/NewsModel.php'; 
    require './app/views/NewsView.php';   

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