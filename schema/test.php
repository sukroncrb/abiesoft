<?php 

namespace App\Schema;

use Sukroncrb2025\Abiesoft\Sistem\Mysql\DB;
use Sukroncrb2025\Abiesoft\Sistem\Mysql\Schema;
class test extends Schema 
{

    public function buattabel()
    {
        $schema = new Schema;
        /*
            contoh membuat kolom nama VARCHAR
            dengan panjang karakter 50
            $schema->teks(nama: 'nama', panjang: 50);
        */
        $sql = $schema->create('test');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        /*
            DB::terhubung()->input('test', [
                'nama' => '',
            ]);
        */
    }
}
$create = new test();
$create->buattabel();
