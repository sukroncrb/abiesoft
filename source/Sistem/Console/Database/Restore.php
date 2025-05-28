<?php 

namespace Sukroncrb2025\Abiesoft\Sistem\Console\Database;

use Sukroncrb2025\Abiesoft\Sistem\Mysql\DB;

trait Restore {

    public function runRestore()
    {
        $dir = __DIR__ . "/../../../../backup";
        if (file_exists($dir)) {
            echo "\nSilahkan pilih data yang akan direstore?\n";
            if (count(scandir($dir)) > 2) {
                $no = -1;
                foreach (scandir($dir) as $d) {
                    if ($d != "." and $d != "..") {
                        echo "[".$this->coloringTextOnly($no,'hijau')."] ".$d."\n";
                    }
                    $no++;
                }
                echo "Tekan [".$this->coloringTextOnly('Enter','hijau')."] untuk membatalkan\n";
                echo "Angka pilihan anda : ";
                $formjawab = fopen("php://stdin", "r");
                $jawab = trim(fgets($formjawab));
                if (is_numeric($jawab)) {
                    return $this->pilihanRestore($jawab);
                } else {
                    echo "\n".$this->coloringWithBox('Dibatalkan!', 'merah')."\n\n";
                    die();
                }
            } else {
                echo "\n".$this->coloringWithBox('Belum ada data yang dibackup!', 'merah')."\n\n";
                die();
            }
        } else {
            echo "\n".$this->coloringWithBox('Belum ada data yang dibackup!', 'merah')."\n\n";
            die();
        }
    }

    public function pilihanRestore($angka)
    {
        $dir = __DIR__ . "/../../../../backup";
        $no = -1;
        foreach (scandir($dir) as $d) {
            if ($d != "." and $d != "..") {
                if ($no == $angka) {
                    $this->restoreData($d);
                }
            }
            $no++;
        }
    }

    public function restoreData($folder)
    {
        $isifolder = __DIR__ . "/../../../../backup/" . $folder;
        $no = 3;
        echo "\n";
        foreach (scandir($isifolder) as $i => $v) {
            if ($v != "." and $v != "..") {
                $tabel = explode(".", $v)[0];
                $hpstabel = DB::terhubung()->query("DROP TABLE " . $tabel . " ");
                if ($hpstabel) {
                    include_once $isifolder . "/" . $v;
                    echo "-- Tabel ".$this->coloringTextOnly($tabel,'hijau')." sudah direstore. \n";
                }
                if ($no == count(scandir($isifolder))) {
                    $total = count(scandir($isifolder)) - 2;
                    echo "\n\e".$this->coloringWithBox('Sukses!','hijau')."\n ".$this->coloringTextOnly('Total: ','biru') . $total . " tabel dipulihkan\n\n";
                }
                $no++;
            }
        }
    }

}