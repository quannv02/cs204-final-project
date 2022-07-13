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

Router::post("search-shipper", function() {
    $myPageController = new MyPageController;
    $myPageController->searchShipper();
});

Router::post("delete", function() {
    $myPageController = new MyPageController;
    $myPageController->delete();
});

Router::get("admin/qualify/{username}", function($username) {
    $userController = new UsersController;
    $userController->verify($username, 1);
});

Router::get("admin/disqualify/{username}", function($username) {
    $userController = new UsersController;
    $userController->verify($username, 0);
});

Router::post("track", function() {
    $homeController = new HomeController;
    $homeController->track();
});

Router::get("pick-up/{id}", function($order_id) {
    $shippersController = new ShippersController;
    $shippersController->pickUp($order_id);
});

Router::get("complete-order/{id}", function($order_id) {
    $shippersController = new ShippersController;
    $shippersController->completeOrder($order_id);
});

Router::get("reset", function() {
    Router::redirect("my-page");
});
