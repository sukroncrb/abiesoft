<?php 

namespace App\Schema;

use Sukroncrb2025\Abiesoft\Sistem\Mysql\DB;
use Sukroncrb2025\Abiesoft\Sistem\Mysql\Schema;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Generate;
class users extends Schema 
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks("nama");
        $schema->teks("email");
        $schema->teks("psw");
        $schema->teks("salt");
        $schema->paragrap("photo");
        $schema->enum(nama:"jeniskelamin", data:['Laki-laki', 'Perempuan']);
        $schema->teks("grupid");
        $sql = $schema->create('users');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        $salt = Generate::salt();
        $psw = "1234";
        $password = Generate::password($psw,$salt);
        DB::terhubung()->input('users', [
            'nama' => 'Sukron',
            'email' => 'sukroncrb2025@gmail.com',
            'psw' => $password,
            'salt' => $salt,
            'photo' => 'assets/storage/default/pp_lk.png',
            'jeniskelamin' => 'Laki-laki',
            'grupid' => 'eb92460e-237c-44b6-8581-35dd33828949',
        ]);
        
    }
}
$create = new users();
$create->buattabel();
