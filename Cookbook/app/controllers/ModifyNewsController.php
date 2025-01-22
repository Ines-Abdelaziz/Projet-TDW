<?php
    require __DIR__.'/../models/ModifyNewsModel.php'; 
    require __DIR__.'/../views/ModifyNewsView.php';  

Class ModifyNewsController{
  
    public function index()
    {       
        $v= new ModifyNewsView();
        $v->index(); 
    }
    public function getNews($id){
        $model=new ModifyNewsModel();
        $r=$model->getNews($id);
        return $r;  
    }

    
    
  
    
}