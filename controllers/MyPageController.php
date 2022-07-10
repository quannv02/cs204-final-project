<?php

class MyPageController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function getMyPage() {
        $orders = [];
        $order = new Order($this->conn);
        $order->fetchOrders();
        $orders = $order->getOrders();
        $shipper = new User($this->conn);
        $shipper->fetchShippers();
        $shippers = $shipper->getShippers();
        include "views/mypage.php";
    }

    public function search() {
        $orders = [];
        $order = new Order($this->conn);

        if($order->search($this->req)->success()) {
          $orders = $order->getOrders();
          include "views/mypage.php";
        } else {
            $errors = $order->errors;
            include "views/mypage.php";
        }
    }
}
