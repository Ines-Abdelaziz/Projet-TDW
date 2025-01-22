<?php
    require __DIR__.'/../models/AdminNutrtionModel.php';   
    require __DIR__.'/../views/AdminNutritionView.php';   


Class AdminNutritionController{
  
    public function index()
    {       
        $v= new AdminNutritionView();
        $v->index(); 
    }
    public function ingredients()
    {
        $model=new AdminNutritionModel();
        $r=$model->ingredients();
        return $r;
    }
    public function getUnit($id)
    {
        $model=new AdminNutritionModel();
        $r=$model->getUnit($id);
        return $r;
    }
    public function getSeason($id)
    {
        $model=new AdminNutritionModel();
        $r=$model->getSeason($id);
        return $r;
    }
   
    
  
    
}