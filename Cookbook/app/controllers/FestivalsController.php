<?php

    require_once '../models/FestivalsModel.php'; 
    require '../views/FestivalsView.php';   

Class FestivalsController{
  
    public function index()
    {       
        $v= new FestivalsView();
        $v->index(); 
    }
    
    public function filterBy($filter)
    {
        $model=new FestivalsModel();
        $r=$model->filterBy($filter);
        return $r;
    }
    public function getRecipe($recpeId){
        $model=new FestivalsModel();
        $r=$model->getRecipe($recpeId);
        return $r;
    }
    public function getImage($recpeId){
        $model=new FestivalsModel();
        $r=$model->getImage($recpeId);
        return $r;
    }
  
    
}