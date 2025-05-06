<?php

namespace App\Controller;

use Sukroncrb2025\Abiesoft\Sistem\Http\Controller;

class HomeController extends Controller{
    public function index() {
        
        $this->view(
            model:"admin",
            template:"home/index",
            data: [
                'title' => "Selamat datang" 
            ]
        );
    }
}