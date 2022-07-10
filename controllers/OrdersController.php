<?php

class OrdersController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function getCreateOrder() {
        include "views/create.php";
    }

    // controller methods
    public function getOrder($id) {
        $order = new Order($this->conn);
        if($order->fetchOrder($id)->success()) {
          $order = $order->getOrder();
          include "views/order.php";
        } else {
          include "views/order.php";
          //include "views/_404.php";
        }
    }

    public function create() {
        $order = new Order($this->conn);
        if($order->validateOrder($this->req)->success()) {
          if($order->createNewOrder()->success()) {
            header("Location: " . ROOT . "order/" . $order->order_id);
          }
        } else {
            $errors = $order->errors;
            include "views/create.php";
        }
    }
}
