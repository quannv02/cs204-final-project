<?php

class MyPageController extends Controller {

    public function __construct()
    {   
        parent::__construct();
    }

    public function getMyPage() {
        include "views/mypage.php";
    }
}