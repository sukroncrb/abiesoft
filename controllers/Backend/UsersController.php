<?php 

namespace App\Controller\Backend;

use Sukroncrb2025\Abiesoft\Sistem\Http\Controller;
use Sukroncrb2025\Abiesoft\Sistem\Mysql\DB;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Generate;

class UsersController extends Controller 
{

    public function index()
    {
        $formuserid = Generate::formID(__CLASS__."email");
        $this->view(
            model:'backend',
            template:'users/index',
            data: [
                'title' => 'Selamat datang',
                'formuserid' => $formuserid,
                'csrfuser' => Generate::csrf($formuserid),
                'grup' => DB::terhubung()->query("SELECT id, nama FROM grup ORDER BY dibuat DESC")->hasil()
            ]
        );
    }

}

