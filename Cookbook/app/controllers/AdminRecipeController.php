<?php
    require __DIR__.'/../models/AdminRecipeModel.php';   
    require __DIR__.'/../views/AdminRecipeView.php';   


Class AdminRecipeController{
  
    public function index()
    {       
        $v= new AdminRecipeView();
        $v->index(); 
    }
    public function recipes()
    {
        $model=new AdminRecipeModel();
        $r=$model->recipes();
        return $r;
    }
    public function recipesOnHold()
    {
        $model=new AdminRecipeModel();
        $r=$model->recipesOnHold();
        return $r;
    }
    
  
    
}