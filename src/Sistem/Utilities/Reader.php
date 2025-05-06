<?php

namespace Sukroncrb2025\Abiesoft\Sistem\Utilities;

use Symfony\Component\Yaml\Yaml;

class Reader {

    public static function env($key):mixed{
        $dir = __DIR__.'/../../../';
        return parse_ini_file($dir.'.env')[$key];
    }

    public static function yaml(string $nama) :array{
        $dir = __DIR__.'/../../../config/';
        return Yaml::parseFile($dir.$nama.'.yaml');
    }

}