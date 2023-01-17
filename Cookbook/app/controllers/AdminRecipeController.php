<?php
    require './app/models/AdminRecipeModel.php';   
    require './app/views/AdminRecipeView.php';   


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
    
  
    
}