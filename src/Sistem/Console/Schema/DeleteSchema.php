<?php 

namespace Sukroncrb2025\Abiesoft\Sistem\Console\Schema;

trait DeleteSchema {

    public function deleteSchema($nama) {

        $dir = __DIR__."/../../../../schema/";

        if(!$this->fileSchemaAlreadyCheck($dir, $nama)){
            die($this->fileSchemaAlreadyCheck($dir, $nama));
        }

    }

    protected function fileSchemaAlreadyCheck($dir, $nama) {

        if (file_exists($dir . "/" . $nama . ".php")) {
            echo "\n";
            echo $this->ColoringWithBox('Hati-hati!', 'merah');
            echo "\n";
            echo "Yakin ingin menghapus file " . $nama . ".php?";
            echo "\n";
            echo "Ketik [".$this->ColoringTextOnly('Ya','hijau')."] untuk menghapus file";
            echo "\n";
            echo "Tekan [".$this->ColoringTextOnly('Enter','hijau')."] untuk membatalkan";
            echo "\n";
            echo "Pilihan anda : ";
            $formjawab = fopen("php://stdin", "r");
            $jawab = trim(fgets($formjawab));
            if ($jawab == "Ya" || $jawab == "Y" || $jawab == "ya" || $jawab == "y" || $jawab == "Yes" || $jawab == "yes") {
                unlink($dir . "/" . $nama . ".php");
                echo "\n";
                echo $this->ColoringWithBox('Dihapus!', 'hijau');
                echo "\n";
                echo $this->ColoringTextOnly('Lokasi Schema:','biru'); 
                echo "\e[9mschema" . $nama . ".php";
                echo "\n\n";
                die();
            } else {
                echo "\n";
                echo $this->ColoringWithBox('Dibatalkan!', 'merah');
                echo "\n\n";
                die();
            }
        } else {
            echo "\n";
            echo "File ".$this->ColoringTextOnly($nama.".php", 'merah')." Tidak ditemukan!";
            echo "\n\n";
            die();
        }

    }

}