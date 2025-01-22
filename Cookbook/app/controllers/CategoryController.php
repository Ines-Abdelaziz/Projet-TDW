<?php

    require_once __DIR__.'/../models/CategoryModel.php'; 
    require __DIR__.'/../views/CategoryView.php';   

Class CategoryController{
  
    public function index($category)
    {       
        $v= new CategoryView();
        $v->index($category); 
    }
    
    public function filterBy($category,$filter)
    {
        $model=new CategoryModel();
        $r=$model->filterBy($category,$filter);
        return $r;
    }
    public function getImage($recpeId){
        $model=new CategoryModel();
        $r=$model->getImage($recpeId);
        return $r;
    }
    public function getCategory($category){
        $model=new CategoryModel();
        $r=$model->getCategory($category);
        return $r;
    }
    
}