<?php 

namespace Sukroncrb2025\Abiesoft\Sistem;

use Sukroncrb2025\Abiesoft\Sistem\Http\Route;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Config;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Cookies;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Generate;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Reader;

class App {

    public static function start() {

        if(Cookies::ada("_cf",)){
            $cf = Cookies::lihat("_cf",);
            $inisial = Reader::secretCode($cf, Reader::env('SECRET_KEY'))['inisial'];
            $notifikasi = Reader::secretCode($cf, Reader::env('SECRET_KEY'))['seting']['notifikasi'];
            $suara = Reader::secretCode($cf, Reader::env('SECRET_KEY'))['seting']['suara'];
            $data = [
                'apikey' => Reader::env('APIKEY'),
                'inisial' => $inisial,
                'seting' => [
                    'notifikasi' => $notifikasi,
                    'suara' => $suara
                ]
            ];
            $kode = Generate::secretCode($data, Reader::env('SECRET_KEY'));
            Cookies::simpan("_cf",$kode);
        }else{
            $data = [
                'apikey' => Reader::env('APIKEY'),
                'inisial' => Generate::angka('6'),
                'seting' => [
                    'notifikasi' => true,
                    'suara' => 'popcorn'
                ]
            ];
            $kode = Generate::secretCode($data, Reader::env('SECRET_KEY'));
            Cookies::simpan("_cf",$kode);
        }

        $route = new Route;
        $route->current();
    }

}