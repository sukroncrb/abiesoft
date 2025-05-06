<?php 

namespace Sukroncrb2025\Abiesoft\Sistem\Console\Schema;

use Sukroncrb2025\Abiesoft\Sistem\Mysql\DB;
use Sukroncrb2025\Abiesoft\Sistem\Mysql\Schema;

class migrasi extends Schema
{
    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks(nama: 'tabel');
        $sql = $schema->create('migrasi');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        /*
            DB::terhubung()->input('migrasi', [
                'nama' => '',
            ]);
        */
    }
}
$create = new migrasi();
$create->buattabel();