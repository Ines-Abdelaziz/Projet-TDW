<?php
require_once "route.php";
require_once './app/controllers/HomeController.php';
require_once './app/controllers/CategoryController.php';
require_once './app/controllers/RecipeController.php';
$action = $_SERVER['REQUEST_URI'];
if (str_starts_with($action,'/recipe/')){
 $recipetitle=trim($action,'/recipe/');
 $recipetitle=str_replace('_',' ',$recipetitle);
 $action='/recipe';
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


dispatch($action);