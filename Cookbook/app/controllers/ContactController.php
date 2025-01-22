<?php
    require __DIR__.'/../models/ContactModel.php';   
    require __DIR__.'/../views/ContactView.php';   

Class ContactController{
  
    public function index()
    {       
        $v= new ContactView();
        $v->index(); 
    }
    public function sendFeedback($user,$message)
   {
    $model=new ContactModel();
    $r=$model->sendFeedback($user,$message);
    return $r;
}
    
  
    
}