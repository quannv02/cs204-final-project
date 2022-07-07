<?php
// register routes in your app

Router::get("", function() {
    $homeController = new HomeController;
    $homeController->index();
});

Router::get("user/login", function() {
    $usersController = new UsersController;
    $usersController->getLogin();
});

Router::post("user/login", function() {
    $usersController = new UsersController;
    $usersController->login();
});

Router::get("user/signup", function() {
    $usersController = new UsersController;
    $usersController->getSignup();
});

Router::post("user/signup", function() {
    $usersController = new UsersController;
    $usersController->create();
});