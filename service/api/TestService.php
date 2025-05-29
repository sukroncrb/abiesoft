<?php 

namespace App\Service\Api;

use Sukroncrb2025\Abiesoft\Sistem\Http\Controller;

final class TestService extends Controller {

    public function load($param)
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $this->authentication($method);
        return match ($method) {
            'get' => $this->get($param),
            default => $this->post($param)
        };
    }

    public function get($param) 
    {
        echo $this->result(200, "GET");
    }

    public function post($param) 
    {
        $this->formguard();
        echo $this->result(200, "POST");
    }

}