<?php 

namespace Sukroncrb2025\Abiesoft\Sistem\Console\Schema;

trait MakeSchema {

    public function buatSchema($nama) {
        
        if(!$this->folderSchemaCheck()){
            die($this->folderSchemaCheck());
        }

        $dir = __DIR__."/../../../../schema/";

        if(!$this->fileSchemaExistCheck($dir, $nama)){
            die($this->fileSchemaExistCheck($dir, $nama));
        }

        $this->releaseFileSchema($dir, $nama);

    }

    protected function folderSchemaCheck() {
        $dir = __DIR__."/../../../../schema";
        if(!file_exists($dir)) {
            mkdir($dir,0777, true);
            return true;
        }
        return "Gagal membuat folder schema";
    }

    protected function fileSchemaExistCheck($dir, $nama) {
        $nama = strtolower($nama);
        if(file_exists($dir.$nama.".php")) {
            echo "\n";
            echo $this->ColoringWithBox('Hati-hati!','merah');
            echo "\n";
            echo "File " . $nama . ".php sudah ada. Ingin menimpanya?";
            echo "\n";
            echo "Ketik [".$this->ColoringTextOnly('Ya','hijau')."] untuk menimpah file";
            echo "\n";
            echo "Tekan [".$this->ColoringTextOnly('Enter','hijau')."] untuk membatalkan";
            echo "\n";
            echo "Pilihan anda : ";
            $formjawab = fopen("php://stdin", "r");
            $jawab = trim(fgets($formjawab));
            if ($jawab == "Ya" || $jawab == "Y" || $jawab == "ya" || $jawab == "y" || $jawab == "Yes" || $jawab == "yes") {
                return true;
            } else {
                echo "\n\e[0m\e[0;101m Dibatalkan! \e[0m\n\n";
                die();
            }
        }
        return true;
    }

    protected function releaseFileSchema($dir, $nama) {
        $file = fopen($dir . "/" . $nama . ".php", 'w') or die("Tidak Dapat Membuka File");
        $isi = "<?php \n\n";
        fwrite($file, $isi);
        $isi = "namespace App\Schema;\n\n";
        fwrite($file, $isi);
        $isi = "use Sukroncrb2025\Abiesoft\Sistem\Mysql\DB;\n";
        fwrite($file, $isi);
        $isi = "use Sukroncrb2025\Abiesoft\Sistem\Mysql\Schema;\n";
        fwrite($file, $isi);
        $isi = "class " . $nama . " extends Schema \n";
        fwrite($file, $isi);
        $isi = "{\n\n";
        fwrite($file, $isi);

        $isi = "    public function buattabel()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "schema = new Schema;\n";
        fwrite($file, $isi);
        $isi = "        /*\n";
        fwrite($file, $isi);
        $isi = "            contoh membuat kolom nama VARCHAR\n";
        fwrite($file, $isi);
        $isi = "            dengan panjang karakter 50\n";
        fwrite($file, $isi);
        $isi = "            $" . "" . "schema->teks(nama: 'nama', panjang: 50);\n";
        fwrite($file, $isi);
        $isi = "        */\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "sql = $" . "" . "schema->create('" . $nama . "');\n";
        fwrite($file, $isi);
        $isi = "        DB::terhubung()->query($" . "" . "sql);\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "this->buatdata();\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);

        $isi = "    public function buatdata()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        /*\n";
        fwrite($file, $isi);
        $isi = "            DB::terhubung()->input('" . $nama . "', [\n";
        fwrite($file, $isi);
        $isi = "                'nama' => '',\n";
        fwrite($file, $isi);
        $isi = "            ]);\n";
        fwrite($file, $isi);
        $isi = "        */\n";
        fwrite($file, $isi);
        $isi = "    }\n";
        fwrite($file, $isi);

        $isi = "}\n";
        fwrite($file, $isi);

        $isi = "$" . "" . "create = new " . $nama . "();\n";
        fwrite($file, $isi);
        $isi = "$" . "" . "create->buattabel();\n";
        fwrite($file, $isi);

        fclose($file);
        echo "\n";
        echo $this->ColoringWithBox('Sukses!','hijau');
        echo "\n";
        echo $this->ColoringTextOnly('Lokasi Schema','biru').": schema/" . $nama . ".php";
        echo "\n\n";
    }

}