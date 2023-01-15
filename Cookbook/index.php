<?php
require_once "route.php";
require_once './app/controllers/HomeController.php';
require_once './app/controllers/CategoryController.php';
require_once './app/controllers/RecipeController.php';
require_once './app/controllers/NewsPageController.php';
require_once './app/controllers/NewsController.php';
require_once './app/controllers/FestivalsController.php';
require_once './app/controllers/SignUpConroller.php';
require_once './app/controllers/SignInController.php';
require_once './app/controllers/ProfileController.php';
session_start();  
$action = $_SERVER['REQUEST_URI'];
if (str_starts_with($action,'/recipe/')){
 $recipetitle=trim($action,'/recipe/');
 $recipetitle=str_replace('_',' ',$recipetitle);
 $action='/recipe';
}

if (str_starts_with($action,'/news/article/')){
    $newstitle=ltrim($action,'/news/article/');
    $newstitle=str_replace('_',' ',$newstitle);
    $action='/news/article';
   }
//home
route('/', function () {
    $c = new HomeController();
    $c->index();
});
route('/home', function () {
    $c = new HomeController();
    $c->index();
});


//category desserts
route('/Desserts', function () {
    $c = new CategoryController();
    $c->index(1);
});
//category appetizers
route('/Appetizers', function () {
    $c = new CategoryController();
    $c->index(2);
});
//category mains
route('/Mains', function () {
    $c = new CategoryController();
    $c->index(3);
});
//category drinks
route('/Beverages', function () {
    $c = new CategoryController();
    $c->index(4);
});
//recipes
route('/recipe', function () {
    global $recipetitle;
    $c = new RecipeController();
    $c->index($recipetitle);
});
route('/news', function () {
    $c = new NewsPageController();
    $c->index();
});
route('/news/article', function () {
    global $newstitle;
    $c = new NewsController();
    $c->index($newstitle);
});
route('/Festivals', function () {
    $c = new FestivalsController();
    $c->index();
});
route('/SignUp', function () {
    $c = new SignUpController();
    $c->index();
});
route('/SignIn', function () {
    $c = new SignInController();
    $c->index();
});
route('/Profile', function () {
    $c = new ProfileController();
    $c->index();
});
dispatch($action);