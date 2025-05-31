<?php 

namespace App\Controller\Backend;

use Sukroncrb2025\Abiesoft\Sistem\Http\Controller;

class EditorController extends Controller 
{

    public function index()
    {
        $this->view(
            model:'backend',
            template:'editor/index',
            data: [
                'title' => 'Editor'
            ]
        );
    }

}

