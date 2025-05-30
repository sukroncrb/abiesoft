<?php 

namespace App\Controller\Backend;

use Sukroncrb2025\Abiesoft\Sistem\Http\Controller;

class SetingController extends Controller 
{

    public function index()
    {
        $this->view(
            model:'backend',
            template:'seting/index',
            data: [
                'title' => 'Seting'
            ]
        );
    }

}

