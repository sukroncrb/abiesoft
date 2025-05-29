<?php 

namespace Sukroncrb2025\Abiesoft\Sistem;

use Sukroncrb2025\Abiesoft\Sistem\Http\Route;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Config;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Cookies;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Generate;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Reader;

class App {

    public static function start() {

        $data = [
            'apikey' => Reader::env('APIKEY')
        ];

        $kode = Generate::secretCode($data, Reader::env('SECRET_KEY'));
        Cookies::simpan("_cf",$kode);

        $route = new Route;
        $route->current();
    }

}