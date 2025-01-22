<?php

    require_once '../models/ProfileModel.php'; 
    require '../views/ProfileView.php';   

Class ProfileController{
  
    public function index()
    {       
        $v= new ProfileView();
        $v->index(); 
    }

    public function getUser($userId){
        $model=new ProfileModel();
        $r=$model->getUser($userId);
        return $r;
    }
    
    public function getFavorites($user)
    {
        $model=new ProfileModel();
        $r=$model->getFavorites($user);
        return $r;
    }
    public function getRecipe($recpeId){
        $model=new ProfileModel();
        $r=$model->getRecipe($recpeId);
        return $r;
    }
    public function getImage($recpeId){
        $model=new ProfileModel();
        $r=$model->getImage($recpeId);
        return $r;
    }
  
    
}