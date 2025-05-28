<?php

namespace Sukroncrb2025\Abiesoft\Sistem\Http;

use Latte\Engine;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Config;
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

}