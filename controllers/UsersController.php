<?php

class UsersController extends Controller {
    // properties

    // constructor 
    public function __construct()
    {   
        parent::__construct();
    }

    public function getLogin() {
        include "views/login.php";
    }

    public function getSignup() {
        include "views/signup.php";
    }

    public function login() {
       $user = new User($this->conn);
       // check user exists
       if($user->getUserByName($this->req['username'])->checkUserExists()) {
            if($user->validateLogin($this->req)->success()) {
                $user->login();
                //Messenger::setMsg("Logged in!", "success");
                Router::redirect("");
            } else {
                $errors[] = "Password fail!";
                include "views/login.php";
               //var_dump($user->user);
            }
       } else {
            $errors[] = "User does not exist!";
            include "views/login.php";
       }
    }

    public function create() {
        // create a new User model
        $user = new User($this->conn);
        // call User validateNewUser($this->req)->success()
        if($user->validateNewUser($this->req)->success()) {
            if($user->create()->success()) {
                $successNoti = "Sign up successfully!";
                include "views/login.php";
            }
        } else {
            $errors = $user->errors;
            include "views/signup.php";
        }
    }

    public function logout() {
        //Messenger::setMsg("Logged out!", "warning");
        $_SESSION = [];
        Router::redirect("");
    }
}