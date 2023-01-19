<?php
    require './app/models/ContactModel.php';   
    require './app/views/ContactView.php';   

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