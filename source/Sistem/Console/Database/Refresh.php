<?php 

namespace Sukroncrb2025\Abiesoft\Sistem\Console\Database;

use Sukroncrb2025\Abiesoft\Sistem\Mysql\DB;
use Sukroncrb2025\Abiesoft\Sistem\Utilities\Reader;

trait Refresh {

    public function runRefresh()
    {
        $dir = __DIR__ . "/../../../../schema";
        $this->makeSureRefresh($dir);
    }

    protected function makeSureRefresh(string $dir): void
    {
        if (Reader::env('MODE') === 'production') {
            
            echo "\n";
            echo $this->coloringWithBox('Hati-hati!','merah');
            echo "\n";
            echo "Aplikasi ini sudah running secara online. Tetap lanjutkan?";
            echo "\n";
            echo "Ketik [".$this->coloringTextOnly('Ya','hijau')."] untuk melanjutkan refresh";
            echo "\n";
            echo "Tekan [".$this->coloringTextOnly('Enter','hijau')."] untuk membatalkan";
            echo "\n";
            echo "Pilihan anda : ";

            $formjawab = fopen("php://stdin", "r");
            $jawab = trim(fgets($formjawab));
            if ($jawab == "Ya" || $jawab == "Y" || $jawab == "ya" || $jawab == "y" || $jawab == "Yes" || $jawab == "yes") {
                echo "\n";
                $this->hapus($dir);
                die();
            } else {
                echo "\n".$this->coloringTextOnly('Dibatalkan!','merah')."\n\n";
                die();
            }
        } else {
            echo "\n";
            $this->hapus($dir);
            die();
        }
    }

    protected function hapus(string $dir): void
    {
        $cektabel = DB::terhubung()->query("SELECT * FROM information_schema.tables WHERE table_schema = ? ", [Reader::env('DB_NAME')]);
        if ($cektabel->hitung()) {
            foreach ($cektabel->hasil() as $ct) {
                if ($ct->TABLE_NAME != 'migrasi') {
                    $drop = DB::terhubung()->query("DROP TABLE {$ct->TABLE_NAME}");
                    if ($drop) {
                        DB::terhubung()->hapus('migrasi', array(
                            'tabel', '=', $ct->TABLE_NAME
                        ));
                        echo "-- Tabel \e[31m\e[9m" . $ct->TABLE_NAME . "\e[0m\e[39m sudah dihapus. \n";
                    }
                }
            }
            $this->prosesRefresh($dir);
        }
    }

    protected function prosesRefresh(string $dir): void
    {
        $statusimport = "";
        $total = 0;
        $cektabelmigrasi = DB::terhubung()->query("SELECT * FROM information_schema.tables WHERE table_schema = ? AND table_name = ? ", [Reader::env('DB_NAME'),'migrasi']);

        if ($cektabelmigrasi->hitung()) {
            foreach (scandir("./schema") as $fs => $file) {
                if ($fs != 0 and $fs != 1 and $file != "migrasi.php") {
                    $cekmigrasi = DB::terhubung()->query("SELECT * FROM migrasi WHERE tabel = ? ", [explode('.', $file)[0]]);
                    if (!$cekmigrasi->hitung()) {
                        $input = DB::terhubung()->input("migrasi", array(
                            "tabel" => explode('.', $file)[0]
                        ));
                        if ($input) {
                            include "./schema/" . $file;
                            $total++;
                            if ($fs == count(scandir("./schema")) - 1) {
                                echo "-- Tabel ".$this->coloringTextOnly(explode('.', $file)[0], 'hijau')." sudah diimport. \n";
                                $statusimport = "\n".$this->coloringWithBox('Sukses!', 'hijau')."\n".$this->coloringTextOnly('Total:','biru'). " ". $total . " tabel \n\n";
                            } else {
                                echo "-- Tabel ".$this->coloringTextOnly(explode('.', $file)[0], 'hijau')." sudah diimport. \n";
                            }
                        }
                    } else {
                        if ($total === 0) {
                            $statusimport = "\n".$this->coloringWithBox('Tidak Ada Tabel Yang Diimport!','hijau')."\n\n\n";
                        } else {
                            $statusimport = "\n".$this->coloringWithBox('Sukses!', 'hijau')."\n".$this->coloringTextOnly('Total:','biru'). " ". $total . " tabel \n\n";
                        }
                    }
                }
            }
            echo $statusimport;
        } else {
            include_once __DIR__ . "/../Schema/migrasi.php";
            $this->prosesRefresh($dir);
        }
    }

}