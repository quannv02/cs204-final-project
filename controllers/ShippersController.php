<?php

class ShippersController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function pickUp($order_id) {
      $order = new Order($this->conn);
      $order->pickUp($order_id);
      Router::redirect("my-page");
    }

    public function completeOrder($order_id) {
      $order = new Order($this->conn);
      $order->completeOrder($order_id);
      Router::redirect("my-page");
    }
}
