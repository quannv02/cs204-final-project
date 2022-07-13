<?php

class User {
    // properties
    public $user_name;
    public $user_email;
    public $user_password;
    public $user_password_confirm;
    public $user_hash;
    public $user_role;
    public $user_verified;
    public $conn;
    public $errors = [];
    public $user = [];
    public $users = [];

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // get user by name -> return $this
    public function getUserByName($username) {
        $sql = "SELECT * FROM users WHERE users.username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $this->user = $result->fetch_assoc();
        return $this;
    } 

    // check if user exists return $this [create err if no user]
    public function checkUserExists() {
        if(!empty($this->user)) {
            return true;
        } else {
            return false;
        }
    }

    // validate user 
    public function validateLogin($req) {
        if(!password_verify($req['password'], $this->user['password_hash'])) {
            $this->errors[] = "Invalid password!";
        }
        
        $this->user_name = $req['username'];
        $this->user_verified = 1;
        $sql = "SELECT *
                FROM users
                WHERE users.username = ? AND (users.verified = ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $this->user_name, $this->user_verified);
        $stmt->execute();
        $results = $stmt->get_result();

        if($results->num_rows !== 1) {
            $this->errors[] = "Shipper has not been qualified!";
        }

        return $this;
    }

    public function success() {
        if(empty($this->errors)) {
            return true;
        } else {
            return false;
        }
    }

    public function login() {
        $_SESSION['user_name'] = $this->user['username'];
        $_SESSION['user_role'] = $this->user['role'];
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $this->user['id'];
    }

    public function create() {
        // password_hash the user password
        $this->user_hash = password_hash($this->user_password, PASSWORD_DEFAULT);
        // insert new user
        $sql = "INSERT INTO users (username, email, password_hash, role, verified) VALUES (?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssii", $this->user_name, $this->user_email, $this->user_hash, $this->user_role, $this->user_verified);
        $stmt->execute();
        if($stmt->affected_rows === 1) {
            $this->getUserByName($this->user_name);
        } else {
            $this->errors[] = "There was a problem creating the user";
        }
        return $this;
    } 

    public function validateNewUser($user) {
        // if there are any errors add them to $this->errors arr
        //move user attributes from $user arr to User properties (sanitize name + email)
        $this->user_name = htmlspecialchars($user['username']);
        $this->user_email = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
        $this->user_password = $user['password'];
        $this->user_password_confirm = $user['password_confirm'];

        if($user['role'] == "shipper") {
            $this->user_role = 1;
            $this->user_verified = 0;
        } else {
            $this->user_role = 2;
            $this->user_verified = 1;
        }

        //var_dump($user);
        // (3) if statements to check username (should not exist), email is valid, 
        if($this->getUserByName($this->user_name)->checkUserExists()) {
            $this->errors[] = "Username is already taken!";
        }
        //validate email 
        if(!filter_var($this->user_email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Invalid email!";
        }
        // passwords match && !empty
        if($this->user_password !== $this->user_password_confirm || empty($this->user_password)) {
            $this->errors[] = "Password must match and cannot be empty!";
        }

        return $this;
    }

    public function search($user) {
        $this->user_name = $user['search'];

        $sql = "SELECT *
                FROM users
                WHERE users.username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $this->user_name);
        $stmt->execute();
        $results = $stmt->get_result();

        if($results->num_rows !== 1) {
            $this->errors[] = "No Shipper Found!";
        } else {
            $this->users = $results->fetch_all(MYSQLI_ASSOC);
        }
        return $this;
    }

    public function fetchShippers() {
        $this->user_role = 1;
        $sql = "SELECT *
                FROM users
                WHERE users.role = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $this->user_role);
        $stmt->execute();
        $results = $stmt->get_result();
        if($results->num_rows === 0) {
            $this->users[] = "Couldn't retrieve resource!";
        } else {
            $this->users = $results->fetch_all(MYSQLI_ASSOC);
        }
        return $this;
    }

    public function getShippers() {
        return $this->users;
    }

    public function update($username, $status) {
        $this->user_verified = $status;
        $this->user_name = $username;
        $sql = "UPDATE users SET verified = ? WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("is", $this->user_verified, $this->user_name);
        $stmt->execute();
    }
}