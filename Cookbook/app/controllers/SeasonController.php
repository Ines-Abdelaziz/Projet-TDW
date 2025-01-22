<?php

    require_once __DIR__.'/../models/SeasonModel.php'; 
    require __DIR__.'/../views/SeasonView.php';   

Class SeasonController{
  
    public function index($season)
    {       
        $v= new SeasonView();
        $v->index($season); 
    }
    
   

    public function getImage($recpeId){
        $model=new SeasonModel();
        $r=$model->getImage($recpeId);
        return $r;
    }
    public function getIngredients($recipeId){
        $model=new SeasonModel();
        $r=$model->getIngredients($recipeId);
        return $r;
    }
    public function getIngredient($ingId){
        $model=new SeasonModel();
        $r=$model->getIngredient($ingId);
        return $r;
    }
    public function getSeason($season){
        $model=new SeasonModel();
        $r=$model->getSeason($season);
        return $r;
    }
    public function recipes($season)
 {      
        $array=array();
        $st=true;
        $model=new SeasonModel();
        $recipes=$model->recipes();
        while($fetch=$recipes->fetch(PDO::FETCH_ASSOC)){
        $ingredients=$model->getIngredients($fetch['id']);
        while($fetch1=$ingredients->fetch(PDO::FETCH_ASSOC)){
        $is=($model->getIngredient($fetch1['ingredient_id']))->fetchColumn(7);
        if(($is!==$season)and($is!==6) ){$st=false;
        }
        }
        if($st){array_push($array,$fetch);}
        $st=true;
        }
        return $array;
    }
    
    
}