<?php 

namespace App\Schema;

use Sukroncrb2025\Abiesoft\Sistem\Mysql\DB;
use Sukroncrb2025\Abiesoft\Sistem\Mysql\Schema;
class token extends Schema 
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks("idformulir");
        $schema->teks("token");
        $sql = $schema->create('token');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        /*
            DB::terhubung()->input('token', [
                'nama' => '',
            ]);
        */
    }
}
$create = new token();
$create->buattabel();
