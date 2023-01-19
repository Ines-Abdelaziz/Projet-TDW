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
require_once './app/controllers/E404Controller.php';
require_once './app/controllers/AdminHomeController.php';
require_once './app/controllers/AdminUserController.php';
require_once './app/controllers/AdminRecipeController.php';
require_once './app/controllers/AddRecipeController.php';
require_once './app/controllers/ModifyRecipeController.php';
require_once './app/controllers/AdminNewsController.php';
require_once './app/controllers/AddNewsController.php';
require_once './app/controllers/ModifyNewsController.php';
require_once './app/controllers/AdminNutritionController.php';
require_once './app/controllers/AddIngredientController.php';
require_once './app/controllers/ModifyIngredientController.php';
require_once './app/controllers/SettingsController.php';
require_once './app/controllers/NutritionController.php';
require_once './app/controllers/SeasonsController.php';
require_once './app/controllers/SeasonController.php';
require_once './app/controllers/HealthyController.php';
require_once './app/controllers/RecipeIdeasController.php';







session_start();  
if (isset($_SESSION['role'])){
    $role=$_SESSION['role'];
}else{
    $role='';
}
$action = $_SERVER['REQUEST_URI'];
if (str_starts_with($action,'/recipe/')){
 $recipetitle=trim($action,'/recipe/');
 $recipetitle=str_replace('_',' ',$recipetitle);
 $action='/recipe';
}
if (($action=='/AdminHome') and($role!='admin')){
    $action='/SignIn';
}
if (($action=='/AdminUsers') and($role!='admin')){
    $action='/SignIn';
}
if (($action=='/AdminRecipes') and($role!='admin')){
    $action='/SignIn';
}
if (($action=='/ModifyRecipe') and($role!='admin')){
    $action='/SignIn';
}
if (($action=='/AddNews') and($role!='admin')){
    $action='/SignIn';
}
if (($action=='/AdminNutrition') and($role!='admin')){
    $action='/SignIn';
}
if (($action=='/AddIngredient') and($role!='admin')){
    $action='/SignIn';
}
if (($action=='/ModifyIngredient') and($role!='admin')){
    $action='/SignIn';
}
if (($action=='/Settings') and($role!='admin')){
    $action='/SignIn';
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
route('/404Error', function () {
    $c = new E404Controller();
    $c->index();
});
route('/AdminHome', function () {
    $c = new AdminHomeController();
    $c->index();
});
route('/AdminUsers', function () {
    $c = new AdminUserController();
    $c->index();
});
route('/AdminRecipes', function () {
    $c = new AdminRecipeController();
    $c->index();
});
route('/AddRecipe', function () {
    $c = new AddRecipeController();
    $c->index();
});
route('/ModifyRecipe', function () {
    $c = new ModifyRecipeController();
    $c->index();
});
route('/AdminNews', function () {
    $c = new AdminNewsController();
    $c->index();
});
route('/AddNews', function () {
    $c = new AddNewsController();
    $c->index();
});
route('/ModifyNews', function () {
    $c = new ModifyNewsController();
    $c->index();
});
route('/AdminNutrition', function () {
    $c = new AdminNutritionController();
    $c->index();
});
route('/AddIngredient', function () {
    $c = new AddIngredientController();
    $c->index();
});
route('/ModifyIngredient', function () {
    $c = new ModifyIngredientController();
    $c->index();
});
route('/Settings', function () {
    $c = new SettingsController();
    $c->index();
});
route('/Nutrition', function () {
    $c = new NutritionController();
    $c->index();
});
route('/Seasons', function () {
    $c = new SeasonsController();
    $c->index();
});
//season winter
route('/Winter', function () {
    $c = new SeasonController();
    $c->index(1);
});
//season summer
route('/Summer', function () {
    $c = new SeasonController();
    $c->index(2);
});
//season spring
route('/Spring', function () {
    $c = new SeasonController();
    $c->index(3);
});
//season autumn
route('/Autumn', function () {
    $c = new SeasonController();
    $c->index(4);
});
route('/Healthy', function () {
    $c = new HealthyController();
    $c->index();
});
route('/RecipeIdeas', function () {
    $c = new RecipeIdeasController();
    $c->index();
});
dispatch($action);