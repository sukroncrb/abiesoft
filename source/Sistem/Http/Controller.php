<?php

namespace Sukroncrb2025\Abiesoft\Sistem\Http;

use Latte\Engine;
use Sukroncrb2025\Abiesoft\Sistem\Mysql\DB;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Config;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Cookies;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Input;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Reader;

class Controller {

    public function view (string $model = 'frontend', string $template = "", array $data = []) {
        
        $finaldata = [];

        $logged = false;
        $finaldata['sesi'] = [];
        if($logged){
            $finaldata['sesi'] = [
                'id' => "",
                'nama' => "",
                'email' => "",
                'nohp' => "",
                'photo' => "",
                'salt' => "",
                'grupid' => "",
                'namagrup' => "",
            ];
        }

        $finaldata['app'] = [];
        $finaldata['app'] = [
            'url' => Config::baseurl(),
            'title' => Reader::env('APP_NAME'),
            'description' => Reader::env('APP_DESCRIPTION'),
            'cover' => "",
            'bearer' => Cookies::lihat('_cf')
        ];

        $finaldata['baseurl'] = Config::baseurl();
        $finaldata['prefix_admin'] = Reader::env('PREFIX_ADMIN');

        $ucapan = "Halo";
        $jamsaatini = date("H");
        if ($jamsaatini >= 3 && $jamsaatini < 9) {
            $ucapan = "Pagi";
        } elseif ($jamsaatini >= 9 && $jamsaatini < 15) {
            $ucapan = "Siang";
        } elseif ($jamsaatini >= 15 && $jamsaatini < 18) {
            $ucapan = "Sore";
        } else {
            $ucapan = "Malam";
        }
        $finaldata['sapa'] = $ucapan;

        foreach($data as $k => $v){
            $finaldata[$k] = $v;
        }

        $dir = __DIR__ . "/../../../";

        $latte = new Engine();
        $latte->setTempDirectory($dir . "temp");
        
        return match($model) {
            'backend' => $latte->render($dir . "templates/admin/".$template.".latte", $finaldata),
            'frontend' => $latte->render($dir . "templates/website/".$template.".latte", $finaldata),
            default => $latte->render($dir . "templates/test/".$template.".latte", $finaldata)
        };
        
    }

    public function result ($kode = 200, $data = "") {
        $result = [
            'code' => $kode,
            'message' => $this->message($kode),
            'data' => $data
        ];
        return json_encode($result);
    }

    protected function message($kode = "") {
        
        return match($kode){
            200 => 'OK',
            300 => 'Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not found',
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
            default => "OK"
        };

    }


    public function authentication($method) {
        
        // Mengecek bearer
        $authHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
        if (empty($authHeader)) {
            die($this->result(401));
        }

        // Mencocokan kode bearer dengan yang valid
        $kode = str_replace("Bearer ", "", $authHeader);
        $apikey = Reader::secretCode($kode, Reader::env('SECRET_KEY'))['apikey'];
        if($apikey != Reader::env("APIKEY")){
            die($this->result(403, $apikey));
        }
        
        return;
    }

    public function formguard() {

        $idformulir = Input::get('formid');
        $csrf = Input::get('csrf');
        $token = DB::terhubung()->query("SELECT token FROM token WHERE idformulir = ? ", [$idformulir])->teks();
        if($token != $csrf){
            die($this->result(403, "Token Expire"));
        }

        Input::unset('formid');
        Input::unset('csrf');

        return;

    }

}