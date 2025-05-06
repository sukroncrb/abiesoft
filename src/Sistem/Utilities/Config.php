<?php

namespace Sukroncrb2025\Abiesoft\Sistem\Utilities;

class Config {

    public static function baseurl() {
        $domain = Reader::env('DOMAIN');
        $port = ":".Reader::env('PORT');
        $ssl = Reader::env('SSL');
        
        $http = "http://";
        if($ssl){
            $http = "https://";
        }

        if(filter_var($domain, FILTER_VALIDATE_IP)){
            return $http.$domain.$port;
        }else{
            return $http.$domain;
        }


    }

}