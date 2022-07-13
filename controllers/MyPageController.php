<?php

class MyPageController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function getMyPage() {
        $orders_by_id = [];
        $a_orders = [];
        $p_orders = [];
        $c_orders = [];
        $shippers = [];

        $order = new Order($this->conn);
        $order->fetchOrdersByID();
        $orders_by_id = $order->getOrders();

        $order = new Order($this->conn);
        $order->fetchAOrders();
        $a_orders = $order->getOrders();

        $order = new Order($this->conn);
        $order->fetchPOrders();
        $p_orders = $order->getOrders();

        $order = new Order($this->conn);
        $order->fetchCOrders();
        $c_orders = $order->getOrders();

        $shipper = new User($this->conn);
        $shipper->fetchShippers();
        $shippers = $shipper->getShippers();

        include "views/mypage.php";
    }

    public function search() {
        $orders_by_id = [];
        $order = new Order($this->conn);
        if($order->search($this->req)->success()) {
          $orders_by_id = $order->getOrders();
          include "views/mypage.php";
        } else {
          $errors = $order->errors;
          include "views/mypage.php";
        }
    }

    public function delete() {
        $order =  new Order($this->conn);
        $order->delete($this->req); // $this->req = $_POST
        header("Location: " . ROOT . "my-page");
    }
}
