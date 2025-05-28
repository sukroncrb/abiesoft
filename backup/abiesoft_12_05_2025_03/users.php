<?php 

namespace App\Schema;

use Sukroncrb2025\Abiesoft\Sistem\Mysql\DB;
use Sukroncrb2025\Abiesoft\Sistem\Mysql\Schema;
class users extends Schema 
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks(nama:'nama');
        $schema->teks(nama:'email');
        $schema->teks(nama:'psw');
        $schema->teks(nama:'salt');
        $schema->paragrap(nama:'photo');
        $schema->enum(nama:'jeniskelamin', data:['Laki-laki','Perempuan']);
        $schema->teks(nama:'grupid');
        $sql = $schema->create('users');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        
        DB::terhubung()->input('users', [
            'id' => '5d6c6f3e-b420-4117-bcc4-33f66a3a4bd6',
            'nama' => 'Sukron',
            'email' => 'sukroncrb2025@gmail.com',
            'psw' => '3a9adbe11a5493fc5c33b6e3d3cd9adb1a15ca51815ea1861f540f023b63945f',
            'salt' => '1a8F',
            'photo' => 'assets/storage/default/pp_lk.png',
            'jeniskelamin' => 'Laki-laki',
            'grupid' => 'eb92460e-237c-44b6-8581-35dd33828949',
            'dibuat' => '2025-05-12 01:23:03',
        ]);
    }
}
$create = new users();
$create->buattabel();
