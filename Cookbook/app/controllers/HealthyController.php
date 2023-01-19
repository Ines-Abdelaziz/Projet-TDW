<?php

    require_once './app/models/HealthyModel.php'; 
    require './app/views/HealthyView.php';   

Class HealthyController{
  
    public function index()
    {       
        $v= new HealthyView();
        $v->index(); 
    }
    
    public function getImage($recpeId){
        $model=new HealthyModel();
        $r=$model->getImage($recpeId);
        return $r;
    }
    public function getIngredients($recipeId){
        $model=new HealthyModel();
        $r=$model->getIngredients($recipeId);
        return $r;
    }
    public function getIngredient($ingId){
        $model=new HealthyModel();
        $r=$model->getIngredient($ingId);
        return $r;
    }
   
    public function recipes()
 {      
        $array1=array();
        $st=true;
        $model=new HealthyModel();
        $recipes=$model->recipes();
        while($fetch=$recipes->fetch(PDO::FETCH_ASSOC)){
        $ingredients=$model->getIngredients($fetch['id']);
        while($fetch1=$ingredients->fetch(PDO::FETCH_ASSOC)){
        $is=($model->getIngredient($fetch1['ingredient_id']))->fetchColumn(8);
        if(($is<0.6) ){$st=false;
        }
        }
        if($st){array_push($array1,$fetch);}
        $st=true;
        }
        return $array1;
    }
    public function recipesc($c)
    {      
           $array1=array();
           $st=true;
           $model=new HealthyModel();
           $recipes=$model->recipes();
           while($fetch=$recipes->fetch(PDO::FETCH_ASSOC)){
           $ingredients=$model->getIngredients($fetch['id']);
           while($fetch1=$ingredients->fetch(PDO::FETCH_ASSOC)){
           $is=($model->getIngredient($fetch1['ingredient_id']))->fetchColumn(2);
           if(($is>$c )){$st=false;
           }
           }
           if($st){array_push($array1,$fetch);}
           $st=true;
           }
           return $array1;
       }
    
    
}