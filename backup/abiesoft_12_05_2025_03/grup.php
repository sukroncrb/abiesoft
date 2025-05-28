<?php 

namespace App\Schema;

use Sukroncrb2025\Abiesoft\Sistem\Mysql\DB;
use Sukroncrb2025\Abiesoft\Sistem\Mysql\Schema;
class grup extends Schema 
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks(nama:'nama');
        $sql = $schema->create('grup');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        
        DB::terhubung()->input('grup', [
            'id' => 'e167b963-3553-42c6-a429-d9bd0870fe1f',
            'nama' => 'Standar User',
            'dibuat' => '2025-05-12 00:00:51',
        ]);
        
        DB::terhubung()->input('grup', [
            'id' => 'eb92460e-237c-44b6-8581-35dd33828949',
            'nama' => 'Administrator',
            'dibuat' => '2025-05-12 00:00:51',
        ]);
    }
}
$create = new grup();
$create->buattabel();
