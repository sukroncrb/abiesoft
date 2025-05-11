<?php

namespace App\Controller\Frontend;

use Sukroncrb2025\Abiesoft\Sistem\Http\Controller;

class TestController extends Controller{
    public function index($params) {
        print_r($params);
    }
}