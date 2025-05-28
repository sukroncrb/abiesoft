<?php

namespace App\Controller\Frontend;

use Sukroncrb2025\Abiesoft\Sistem\Http\Controller;

class HomeController extends Controller{

    public function index() {
        $this->view(
            model:"frontend",
            template:"home/index",
            data: [
                'title' => "Selamat datang" 
            ]
        );
    }
}