<?php

    require_once '../models/NewsModel.php'; 
    require '../views/NewsView.php';   

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