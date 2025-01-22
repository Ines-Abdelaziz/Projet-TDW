<?php
    require __DIR__.'/../models/NutritionModel.php';   
    require __DIR__.'/../views/NutritionView.php';   


Class NutritionController{
  
    public function index()
    {       
        $v= new NutritionView();
        $v->index(); 
    }
    public function ingredients()
    {
        $model=new NutritionModel();
        $r=$model->ingredients();
        return $r;
    }
    public function getUnit($id)
    {
        $model=new NutritionModel();
        $r=$model->getUnit($id);
        return $r;
    }
    public function getSeason($id)
    {
        $model=new NutritionModel();
        $r=$model->getSeason($id);
        return $r;
    }
   
    
  
    
}