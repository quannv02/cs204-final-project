<?php

class Auth {
    public static $status = false;
    public static $user_id;
    public static $user_role;
    public static $user_name;

    public static function setState() {
        self::$status = $_SESSION['logged_in'];
        if(self::$status) {
            self::$user_id = $_SESSION['user_id'];
            self::$user_role = $_SESSION['user_role'];
            self::$user_name = $_SESSION['user_name'];
        }
    }

    public static function reqAuth() {
        if(self::$status === false) {
            Messenger::setMsg("You must be logged in to perform this action", "danger");
            Router::redirect("");
            exit;
        }
    }

    public static function getRole() {
        return self::$user_role;
    }

    public static function getId() {
        return self::$user_id;
    }

    public static function getName() {
        return self::$user_name;
    }
    public static function getStatus() {
        return self::$status;
    }

}