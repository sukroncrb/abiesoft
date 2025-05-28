<?php 

namespace Sukroncrb2025\Abiesoft\Sistem\Console\Controller;

trait DeleteController {

    public function deleteController($nama, $opsi = "") {

        $nama = ucFirst(str_replace("controller","",strtolower($nama))."Controller");
        
        if($opsi == "--f"){
            $dir = __DIR__."/../../../../controllers/Frontend/";
        }else{
            $dir = __DIR__."/../../../../controllers/Backend/";
        }

        if(!$this->fileControllerAlreadyCheck($dir, $nama, $opsi)){
            die($this->fileControllerAlreadyCheck($dir, $nama, $opsi));
        }

    }

    protected function fileControllerAlreadyCheck($dir, $nama, $opsi) {

        if (file_exists($dir . $nama . ".php")) {
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
                unlink($dir . $nama . ".php");
                echo "\n";
                echo $this->ColoringWithBox('Dihapus!', 'hijau');
                echo "\n";
                echo $this->ColoringTextOnly('Lokasi Controller:','biru'); 
                if($opsi == "--f"){
                    echo "\e[9mcontroller/Frontend/" . $nama . ".php";
                }else{
                    echo "\e[9mcontroller/Backend/" . $nama . ".php";
                }
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