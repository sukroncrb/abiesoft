<?php 

namespace Sukroncrb2025\Abiesoft\Sistem\Http;

use Sukroncrb2025\Abiesoft\Middleware\Middleware;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Reader;

class Route {

    use Request;

    private $route = [];

    public function __construct()
    {
        $dataroute = Reader::yaml("routes");
        foreach($dataroute as $r){
            foreach($r['path'] as $k => $v) {
                $ctr = $v['controller'];
                $fc = $v['function'];

                if(count(explode(",",$v['method'])) > 1){
                    for($i=0; $i<count(explode(",",$v['method'])); $i++){
                        $mt = explode(",",$v['method'])[$i];
                        if(count(explode(",",$fc)) > 1){
                            $this->$mt($k, [$ctr,explode(",",$fc)[$i]]);
                        }else{
                            $this->$mt($k, [$ctr,$fc]);
                        }
                    }
                }else{
                    $mt = $v['method'];
                    $this->$mt($k, [$ctr,$fc]);
                }
            }
        }
    }

    protected function get(string $path, string|array $callback)
    {
        $this->route['get'][$path] = $callback;
    }

    protected function post(string $path, string|array $callback)
    {
        $this->route['post'][$path] = $callback;
    }
    
    protected function patch(string $path, string|array $callback)
    {
        $this->route['patch'][$path] = $callback;
    }

    protected function delete(string $path, string|array $callback)
    {
        $this->route['delete'][$path] = $callback;
    }

    public function getRouteList():array {
        new Route();
        return $this->route;
    }
    
    public function current() {
        $method = $this->method();
        $path = $this->path();
        $params = $this->params();
        $routemodel = $this->routeModel();
        $middleware = true;

        if($routemodel == "backend"){
            $middleware = Middleware::url($path, 'admin'); // grup ini berasal dari sesi 
        }

        $callback = $this->route[$method][$path];

        $data = [
            'callback' => $callback,
            'params' => $params,
            'middleware' => $middleware
        ];

        return match($routemodel){
            'backend' => $this->backend($data),
            'frontend' => $this->frontend($data),
            default => $this->api($data)
        };

    }

    protected function backend($data) {

        $callback = $data['callback'];
        $middleware = $data['middleware'];
        $params = $data['params'];

        if(!$callback){
            return $this->notfound();
        }

        if(!$middleware) {
            return $this->forbidden();
        }

        if(is_array($callback)){
            $file = __DIR__."/../../../controllers/Backend/".$callback[0].".php";
            if(file_exists($file)){
                $controller = "\App\Controller\Backend\\".$callback[0];
                $ctrl = new $controller;
                $fc = $callback[1];
                return $ctrl->$fc($params);
            }else{
                $this->notfound();
            }
        }
        
        if(is_string($callback)){
            die($callback);
        }

    }

    protected function frontend($data) {

        $callback = $data['callback'];
        $middleware = $data['middleware'];
        $params = $data['params'];


        if($callback[0] == "TestController"){
            $controller = "\App\Controller\Tester\\".$callback[0];
            $ctrl = new $controller;
            $fc = $callback[1];
            return $ctrl->$fc($params);
        }

        if(!$callback){
            return $this->notfound();
        }

        if(!$middleware) {
            return $this->forbidden();
        }

        if(is_array($callback)){
            $file = __DIR__."/../../../controllers/Frontend/".$callback[0].".php";
            if(file_exists($file)){
                $controller = "\App\Controller\Frontend\\".$callback[0];
                $ctrl = new $controller;
                $fc = $callback[1];
                return $ctrl->$fc($params);
            }else{
                $this->notfound();
            }
        }
        
        if(is_string($callback)){
            die($callback);
        }

    }

    protected function api($data) {
        
        $callback = $data['callback'];
        $middleware = $data['middleware'];
        $params = $data['params'];

        if(!$callback){
            return $this->notfound();
        }

        if(!$middleware) {
            return $this->forbidden();
        }

        if(is_array($callback)){
            $file = __DIR__."/../../../service/api/".$callback[0].".php";
            if(file_exists($file)){
                $controller = "\App\Service\Api\\".$callback[0];
                $ctrl = new $controller;
                $fc = $callback[1];
                return $ctrl->$fc($params);
            }else{
                $this->notfound();
            }
        }
        
        if(is_string($callback)){
            die($callback);
        }

    }


    protected function notfound() {
        if(Reader::env('MODE') == "develope"){
            die("Not Found");
        }else{
            Lanjut::ke("/");
            die();
        }
    }

    protected function forbidden() {
        if(Reader::env('MODE') == "develope"){
            die("Forbidden");
        }else{
            Lanjut::ke("/");
            
        }
    }

}