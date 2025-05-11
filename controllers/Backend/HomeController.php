<?php

namespace App\Controller\Backend;

use Sukroncrb2025\Abiesoft\Sistem\Http\Controller;

class HomeController extends Controller{
    public function index() {
        $this->view(
            model:"backend",
            template:"home/index",
            data: [
                'title' => "Selamat datang" 
            ]
        );
    }
}