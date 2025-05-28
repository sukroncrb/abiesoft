<?php 

namespace Sukroncrb2025\Abiesoft\Sistem\Console\Controller;

trait MakeController {

    public function buatController($nama, $opsi = "") {

        $nama = ucFirst(str_replace("controller","",strtolower($nama))."Controller");
        
        if(!$this->folderControllerCheck()){
            die($this->folderControllerCheck());
        }

        if($opsi == "--f"){
            $dir = __DIR__."/../../../../controllers/Frontend/";
        }else{
            $dir = __DIR__."/../../../../controllers/Backend/";
        }

        if(!$this->fileControllerExistCheck($dir, $nama)){
            die($this->fileControllerExistCheck($dir, $nama));
        }

        $this->releaseFileController($dir, $nama, $opsi);

    }

    protected function folderControllerCheck() {
        $dir = __DIR__."/../../../../controller";
        if(!file_exists($dir)) {
            mkdir($dir,0777, true);
            return true;
        }
        return "Gagal membuat folder controller";
    }

    protected function fileControllerExistCheck($dir, $nama) {
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

    protected function releaseFileController($dir, $nama, $opsi) {

        $file = fopen($dir . "/" . $nama . ".php", 'w') or die("Tidak Dapat Membuka File");
        $isi = "<?php \n\n";
        fwrite($file, $isi);
        $model = "";
        if($opsi != ""){
            $isi = "namespace App\Controller\Frontend;\n\n";
            $model = "frontend";
        }else{
            $isi = "namespace App\Controller\Backend;\n\n";
            $model = "backend";
        }
        fwrite($file, $isi);
        $isi = "use Sukroncrb2025\Abiesoft\Sistem\Http\Controller;\n\n";
        fwrite($file, $isi);
        $isi = "class ".$nama." extends Controller \n";
        fwrite($file, $isi);
        $isi = "{\n\n";
        fwrite($file, $isi);

        $isi = "    public function index()\n";
        fwrite($file, $isi);
        $isi = "    {\n";
        fwrite($file, $isi);
        $isi = "        /*\n";
        fwrite($file, $isi);
        $isi = "        $" . "" . "this->view(\n";
        fwrite($file, $isi);
        $isi = "            model:'".$model."',\n";
        fwrite($file, $isi);
        $isi = "            template:'home/index',\n";
        fwrite($file, $isi);
        $isi = "            data: [\n";
        fwrite($file, $isi);
        $isi = "                'title' => 'Selamat datang'\n";
        fwrite($file, $isi);
        $isi = "            ]\n";
        fwrite($file, $isi);
        $isi = "        );\n";
        fwrite($file, $isi);
        $isi = "        */\n";
        fwrite($file, $isi);
        $isi = "    }\n\n";
        fwrite($file, $isi);
        $isi = "}\n\n";
        fwrite($file, $isi);

        

        fclose($file);
        echo "\n";
        echo $this->ColoringWithBox('Sukses!','hijau');
        echo "\n";
        if($opsi != ""){
            echo $this->ColoringTextOnly('Lokasi Controller','biru').": controllers/Frontend/" . $nama . ".php";
        }else{
            echo $this->ColoringTextOnly('Lokasi Controller','biru').": controllers/Backend/" . $nama . ".php";
        }
        echo "\n\n";
    }

}