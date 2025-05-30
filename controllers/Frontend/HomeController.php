<?php

namespace App\Controller\Frontend;

use Sukroncrb2025\Abiesoft\Sistem\Http\Controller;
use Sukroncrb2025\Abiesoft\Sistem\Http\Lanjut;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Reader;

class HomeController extends Controller{

    public function index() {
        Lanjut::ke("/".Reader::env("PREFIX_ADMIN"));
        // $this->view(
        //     model:"frontend",
        //     template:"home/index",
        //     data: [
        //         'title' => "Selamat datang" 
        //     ]
        // );
    }
}