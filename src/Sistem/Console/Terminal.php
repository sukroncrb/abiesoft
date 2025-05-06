<?php 

namespace Sukroncrb2025\Abiesoft\Sistem\Console;

use Sukroncrb2025\Abiesoft\Sistem\Console\Database\Backup;
use Sukroncrb2025\Abiesoft\Sistem\Console\Database\Import;
use Sukroncrb2025\Abiesoft\Sistem\Console\Database\Refresh;
use Sukroncrb2025\Abiesoft\Sistem\Console\Database\Restore;
use Sukroncrb2025\Abiesoft\Sistem\Console\Do\Action;
use Sukroncrb2025\Abiesoft\Sistem\Console\Schema\DeleteSchema;
use Sukroncrb2025\Abiesoft\Sistem\Console\Schema\MakeSchema;

class Terminal {

    use Opsi, Action, MakeSchema, DeleteSchema, Import, Refresh, Backup, Restore;

    public function command(String $action = "", String $value = "", String $opsi = "") {
        $model = "";

        if(isset(explode(":",$action)[1])){
            $model = explode(":",$action)[1];
            $action = explode(":",$action)[0];
        }

        return match($action){
            "start" => $this->start(),
            "make" => $this->make($model, $value),
            "delete" => $this->delete($model, $value),
            "database" => $this->database($value),
            default => $this->help()
        };
    }

    protected function make(string $model, string $value) {
        return match($model){
            'schema' =>$this->buatSchema($value),
            default => $this->help()
        };
    }

    protected function delete(string $model, string $value) {
        return match($model){
            'schema' =>$this->deleteSchema($value),
            default => $this->help()
        };
    }

    protected function database(string $value) {
        return match($value){
            'import' => $this->runImport(),
            'refresh' => $this->runRefresh(),
            'backup' => $this->runBackup(),
            'restore' => $this->runRestore(),
            default => $this->help()
        };
    }

    protected function help() {
        echo "\n\n".$this->ColoringWithBox('Help!', 'hijau')."\n\n";
        echo $this->ColoringTextOnly('Aplikasi', 'biru')."\n";
        echo "   start\n\n";
        echo $this->ColoringTextOnly('Schema', 'biru')."\n";
        echo "   make:schema namatabel \n";
        echo "   delete:schema namatabel \n\n";
        echo $this->ColoringTextOnly('Database', 'biru')."\n";
        echo "   database import \n";
        echo "   database refresh ".$this->ColoringTextOnly('// Mereset database menjadi kosong lagi seperti awal di import', 'abuabu')."\n";
        echo "   database backup \n";
        echo "   database restore \n";
        echo "\n\n";
    }

}