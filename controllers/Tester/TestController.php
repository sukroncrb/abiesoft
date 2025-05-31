<?php 

namespace App\Controller\Tester;

use Sukroncrb2025\Abiesoft\Sistem\Http\Controller;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Cookies;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Generate;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Reader;

class TestController extends Controller 
{

    public function index($params)
    {
        $cf = Cookies::lihat("_cf",);
        print_r(Reader::secretCode($cf, Reader::env('SECRET_KEY')));
        die();
        $formid = Generate::formID(__CLASS__."index");
        $this->view(
            model:"test",
            template:"home/index",
            data: [
                'title' => "Unit test",
                'formid' => $formid,
                'csrf' => Generate::csrf($formid),
            ]
        );
    }

    public function post()
    {
        echo $this->result(200,$_POST);
    }

}

