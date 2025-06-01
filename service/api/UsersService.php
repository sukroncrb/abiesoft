<?php 

namespace App\Service\Api;

use Sukroncrb2025\Abiesoft\Sistem\Http\Controller;
use Sukroncrb2025\Abiesoft\Sistem\Mysql\DB;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Generate;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Input;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Reader;

final class UsersService extends Controller {

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
        $model = Input::get("model");
        Input::unset('model');
        return match($model){
            // 'ADD_MEMBER' => $this->addMembers(),
            default => $this->addUser()
        };
    }

    protected function addUser() {
        $salt = Generate::salt();
        $psw = Reader::env("DEFAULT_PSW");
        $password = Generate::password($psw, $salt);

        if(Input::get("jeniskelamin") == "Laki-laki"){
            $photo = "assets/storage/default/pp_lk.png";
        }else{
            $photo = "assets/storage/default/pp_pr.png";
        }

        $nama = Input::get('nama');
        $email = Input::get('email');
        $grupid = Input::get('grupid');
        $jeniskelamin = Input::get('jeniskelamin');

        $already = DB::terhubung()->query("SELECT id FROM users WHERE email = ? '' ", [$email]);

        if($already->hitung() == 0){
            $input = DB::terhubung()->input("users", [
                'nama' => $nama,
                'email' => $email,
                'grupid' => $grupid,
                'jeniskelamin'=> $jeniskelamin,
                'photo' => $photo,
                'salt' => $salt,
                'psw' => $password
            ]);    

            if($input){
                echo $this->result(200, $_POST);
            }else{
                echo $this->result(400, "Gagal menginput data");
            }
        }else{
            echo $this->result(400, "Email ".$email." sudah digunakan.");
        }

    }

    // protected function addMembers() {
    //     echo $this->result(200, "member");
    // }

}