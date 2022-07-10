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

Router::get("create", function() {
    $ordersController = new OrdersController;
    $ordersController->getCreateOrder();
});

Router::post("create", function() {
    $ordersController = new OrdersController;
    $ordersController->create();
});

Router::get("order/{id}", function($id) {
    $ordersController = new OrdersController;
    $ordersController->getOrder($id);
});

Router::post("search", function() {
    $myPageController = new MyPageController;
    $myPageController->search();
});

Router::post("pick-up", function() {
    $shippersController = new ShippersController;
    $shippersController->pickUp();
});

Router::post("complete-order", function() {
    $shippersController = new ShippersController;
    $shippersController->completeOrder();
});
