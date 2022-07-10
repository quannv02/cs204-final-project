<?php

class HomeController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        include "views/home.php";
    }

    public function track() {
        $order = new Order($this->conn);
        if($order->track($this->req)->success()) {
          $order = $order->getOrder();
          include "views/home.php";
        } else {
            $errors = $order->errors;
            include "views/home.php";
        }
    }
}
