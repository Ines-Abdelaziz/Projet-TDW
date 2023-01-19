<?php
    require './app/models/RecipeideasModel.php';   
    require './app/views/RecipesIdeasView.php';   


Class RecipeIdeasController{
  
    public function index()
    {       
        $v= new RecipeIdeasView();
        $v->index(); 
    }
    public function ingredients()
    {
        $model=new RecipeIdeasModel();
        $r=$model->ingredients();
        return $r;
    }
    public function recipes()
    {
        $model=new RecipeIdeasModel();
        $r=$model->recipe();
        return $r;
    }
   
    public function getRecipeById($id)
    {
        $model=new RecipeIdeasModel();
        $r=$model->getRecipeById($id);
        return $r;
    }
    public function ideas($ing)
    {
        $array1=array();
           $i=0;
           $model=new RecipeIdeasModel();
           $recipes=$model->recipe();
           while($fetch=$recipes->fetch(PDO::FETCH_ASSOC)){
           $ingredients=$model->getIngredients($fetch['id']);
           $cing=$model->getIngredientsNb($fetch['id']);
           while($fetch1=$ingredients->fetch(PDO::FETCH_ASSOC)){
           if((in_array($fetch1['ingredient_id'],$ing) )){
            $i++;
           }
           }
           if($cing!=0){$p=$i/$cing;
           if($p>0.7){array_push($array1,$fetch);}
           $i=0;
           }}
           unset($_POST['ing']);
           unset($_POST['ingsubmit']);
           return $array1;
    }
  
    
  
    
}