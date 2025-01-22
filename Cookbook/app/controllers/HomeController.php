<?php

    require_once '../models/HomeModel.php'; 
    require '../views/HomeView.php';   

Class HomeController{
    
    

    public function index()
    {
       
        $v= new HomeView();
        $v->index(); 
    }
    

    public function diaporama()
    {
        $homemodel = new HomeModel();
        $r=$homemodel->diaporama();
        return $r;
    }
    
    public function Appetizers()
    {
        $homemodel=new HomeModel();
        $r=$homemodel->Appetizers();
        return $r;
    }
    public function Mains()
    {
        $homemodel=new HomeModel();
        $r=$homemodel->Mains();
        return $r;
    }
    public function Desserts()
    {
        $homemodel=new HomeModel();
        $r=$homemodel->Desserts();
        return $r;
    }
    public function Drinks()
    {
        $homemodel=new HomeModel();
        $r=$homemodel->Drinks();
        return $r;
    }
    public function getImage($recpeId){
        $homemodel=new HomeModel();
        $r=$homemodel->getImage($recpeId);
        return $r;
    }
    public function getNews($newsId){
        $homemodel=new HomeModel();
        $r=$homemodel->getNews($newsId);
        return $r;
    }
    public function getRecipe($recpeId){
        $homemodel=new HomeModel();
        $r=$homemodel->getRecipe($recpeId);
        return $r;
    }
   
    public function updateRating($recpeId,$rating){
        $homemodel=new HomeModel();
        $r=$homemodel->updateRating($recpeId,$rating);
        return $r;
    }

   
   
}