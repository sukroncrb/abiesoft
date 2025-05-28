<?php 

namespace Sukroncrb2025\Abiesoft\Sistem\Http;

use Sukroncrb2025\Abiesoft\Sistem\Utilities\Config;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Reader;

trait Request {

    public function method ():string {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function routeModel () {
        $model = "frontend";
        $uri = filter_var($_SERVER['REQUEST_URI'],FILTER_SANITIZE_URL);
        if(explode("/", $uri)[1] == Reader::env('PREFIX_ADMIN')){
            $model = "backend";
        }else if(explode("/", $uri)[1] == "api"){
            $model = "api";
        }else{
            $model = "frontend";
        }
        return $model;
    }

    public function path () {
        $path = "";
        $uri = filter_var($_SERVER['REQUEST_URI'],FILTER_SANITIZE_URL);
        
        // Jika karakter terakhirnya garis miring /
        // maka akan dihilangkan garis miringnya
        if(substr($uri, -1) == "/" && $uri != "/") {
            $uri = substr($uri, 0, -1);
        }

        if(count(explode("?", $uri)) > 1){
            $page = explode("?",$uri);
            if(substr($page[0], -1) == "/"){
                $path = substr($page[0], 0,-1)."/:params";
            }else{
                $path = $page[0]."/:params";
            }
        }else{
            $page = explode("/",$uri);
            if($page[1] != ""){
                if(isset($page[2])){
                    if(isset($page[3])){
                        $path = "/$page[1]/$page[2]/:params";
                    }else{
                        $path = "/$page[1]/$page[2]";
                    }
                }else{
                    $path = "/$page[1]";
                }
            }else{
                $path = "/";
            }
        }

        return $path;
    }

    public function params () {
        $result = [];
        $uri = filter_var($_SERVER['REQUEST_URI'],FILTER_SANITIZE_URL);

        if(count(explode("?", $uri)) > 1){
            $uriParams = explode("&",explode("?", $uri)[1]);
            for ($i=0; $i<count($uriParams); $i++) {
                $key = explode("=",$uriParams[$i])[0];
                $val = explode("=",$uriParams[$i])[1];
                $result[$key] = $val;
            }
        }else{
            $result = explode("/",$uri);
            unset($result[0]);
            unset($result[1]);
            unset($result[2]);
            $result = array_values($result);
        }

        return $result;
        
    }

}
    