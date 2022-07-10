<?php

class ShippersController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function pickUp() {
      $order = new Order($this->conn);
      $order->pickUp($this->req);
      //Router::redirect("my-page");
    }

    public function completeOrder($order_id) {
      $order = new Order($this->conn);
      $order->completeOrder($this->req);
      Router::redirect("");
    }
}
