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
        $schema->teks(nama:'grupid');
        $sql = $schema->create('users');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        
        DB::terhubung()->input('users', [
            'id' => '7c5990e7-f3a9-4fd6-8ff9-0e6fef48d8f5',
            'nama' => 'Sukron',
            'email' => 'sukroncrb2025@gmail.com',
            'psw' => '64ef97667d13fd10bb9b7e0bd75b99bed666e79fa365b32fcf34af209cb4f836',
            'salt' => '1ZAp',
            'photo' => 'assets/storage/default/pp.png',
            'grupid' => 'grupid',
            'dibuat' => '2025-05-12 00:00:51',
        ]);
    }
}
$create = new users();
$create->buattabel();
