<?php
require_once "route.php";
require_once './app/controllers/HomeController.php';
require_once './app/controllers/CategoryController.php';

//home
route('/home', function () {
    $c = new HomeController();
    $c->index();
});
//category desserts
route('/desserts', function () {
    $c = new CategoryController();
    $c->index(1);
});
//category appetizers
route('/appetizers', function () {
    $c = new CategoryController();
    $c->index(2);
});
//category mains
route('/mains', function () {
    $c = new CategoryController();
    $c->index(3);
});
//category drinks
route('/beverages', function () {
    $c = new CategoryController();
    $c->index(4);
});
$action = $_SERVER['REQUEST_URI'];
dispatch($action);