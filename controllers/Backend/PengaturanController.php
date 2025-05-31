<?php 

namespace App\Controller\Backend;

use Sukroncrb2025\Abiesoft\Sistem\Http\Controller;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Generate;

class PengaturanController extends Controller 
{

    public function index()
    {

        $formemailid = Generate::formID(__CLASS__."email");
        $formpasswordid = Generate::formID(__CLASS__."password");

        $this->view(
            model:'backend',
            template:'pengaturan/index',
            data: [
                'title' => 'Seting',
                'formemailid' => $formemailid,
                'formpasswordid' => $formpasswordid,
                'csrfemail' => Generate::csrf($formemailid),
                'csrfpassword' => Generate::csrf($formpasswordid),
            ]
        );
    }

}

