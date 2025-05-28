<?php 

namespace Sukroncrb2025\Abiesoft\Sistem;

use Sukroncrb2025\Abiesoft\Sistem\Http\Route;

class App {

    public static function start() {
        $route = new Route;
        $route->current();
    }

}