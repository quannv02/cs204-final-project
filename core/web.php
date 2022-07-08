<?php
// register routes in your app

Router::get("", function() {
    $homeController = new HomeController;
    $homeController->index();
});

Router::get("login", function() {
    $usersController = new UsersController;
    $usersController->getLogin();
});

Router::post("login", function() {
    $usersController = new UsersController;
    $usersController->login();
});

Router::get("signup", function() {
    $usersController = new UsersController;
    $usersController->getSignup();
});

Router::post("signup", function() {
    $usersController = new UsersController;
    $usersController->create();
});

Router::get("logout", function() {
    $usersController = new UsersController;
    $usersController->logout();
});

Router::get("my-page", function() {
    $myPageController = new MyPageController;
    $myPageController->getMyPage();
});