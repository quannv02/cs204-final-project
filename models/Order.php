<?php

class Order {
    // properties
    public $order_id;
    public $order_user_id;
    public $order_shipper_id;
    public $order_sender_name;
    public $order_sender_add;
    public $order_sender_tel;
    public $order_recipient_name;
    public $order_recipient_add;
    public $order_recipient_tel;
    public $order_name;
    public $order_weight;
    public $order_status;
    public $order_date_created;
    public $conn;
    public $order = [];
    public $orders = [];
    public $errors = [];

    // constructor (inject DB conn)
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Post methods
    // //"setter" for the order prop
    public function fetchOrder($id) {
        $this->order_id = $id;
        $sql = "SELECT *
                FROM orders
                WHERE orders.id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $this->order_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows !== 1) {
            $this->errors[] = "Couldn't retrieve resource!";
        } else {
            $this->order = $result->fetch_assoc();
        }
        return $this;
    }

    public function fetchOrders() {
        $this->order_user_id = $_SESSION['user_id'];
        $sql = "SELECT *
                FROM orders
                WHERE orders.user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $this->order_user_id);
        $stmt->execute();
        $results = $stmt->get_result();
        if($results->num_rows === 0) {
            $this->errors[] = "Couldn't retrieve resource!";
        } else {
            $this->orders = $results->fetch_all(MYSQLI_ASSOC);
        }
        return $this;
    }

    public function getOrder() {
        return $this->order;
    }

    public function getOrders() {
        return $this->orders;
    }

    public function validateOrder($order) {
        $this->order_name = htmlspecialchars($order['parcel-name']);
        $this->order_weight = $order['parcel-weight'];

        $this->order_sender_name = htmlspecialchars($order['from-name']);
        $this->order_sender_add = htmlspecialchars($order['from-address']);
        $this->order_sender_tel = htmlspecialchars($order['from-tel']);

        $this->order_recipient_name = htmlspecialchars($order['to-name']);
        $this->order_recipient_add = htmlspecialchars($order['to-address']);
        $this->order_recipient_tel = htmlspecialchars($order['to-tel']);

        if(empty($this->order_name) || empty($this->order_weight) || empty($this->order_sender_name) || empty($this->order_sender_add) || empty($this->order_sender_tel) || empty($this->order_recipient_name) || empty($this->order_recipient_add) || empty($this->order_recipient_tel)) {
            $this->errors[] = "Please fill out all required fields!";
        }

        return $this;
    }

    public function createNewOrder() {
        $this->order_user_id = $_SESSION['user_id'];

        $sql = "INSERT INTO orders (user_id, sender_name, sender_address, sender_tel, recipient_name, recipient_address, recipient_tel, parcel_name, weight)
                VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("isssssssi", $this->order_user_id, $this->order_sender_name, $this->order_sender_add, $this->order_sender_tel, $this->order_recipient_name, $this->order_recipient_add, $this->order_recipient_tel, $this->order_name, $this->order_weight);
        $stmt->execute();
        if($stmt->affected_rows !== 1) {
            $this->errors[] = "Order was not created!";
        } else {
            $this->order_id = $stmt->insert_id;
        }
        return $this;
    }

    // success method, return T / F if $error is empty
    public function success() {
        if(empty($this->errors)) {
            return true;
        } else {
            return false;
        }
    }

    public function search($order) {
        $this->order_id = $order['search'];
        $this->order_user_id = $_SESSION['user_id'];

        $sql = "SELECT *
                FROM orders
                WHERE orders.user_id = ? AND orders.id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii",$this->order_user_id, $this->order_id);
        $stmt->execute();
        $results = $stmt->get_result();

        if($results->num_rows !== 1) {
            $this->errors[] = "No Order Found!";
        } else {
            $this->orders = $results->fetch_all(MYSQLI_ASSOC);
        }
        return $this;
    }

    public function delete($order) {
        $this->order_id = $order['delete'];
        $sql = "DELETE FROM orders WHERE orders.id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $this->order_id);
        $stmt->execute();
    }

}
