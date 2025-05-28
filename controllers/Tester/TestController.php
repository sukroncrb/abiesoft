<?php 

namespace App\Controller\Tester;

use Sukroncrb2025\Abiesoft\Sistem\Http\Controller;

class TestController extends Controller 
{

    public function index($params)
    {
        $this->view(
            model:"test",
            template:"home/index",
            data: [
                'title' => "Unit test" 
            ]
        );
    }

}

