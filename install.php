<?php



class Install {

    /*** change to your need ***/
    private $wwwRoot = "";
    /******/

    private $env = '.env';
    private $zipFile = 'inventorycontrol-master.zip';
    private $isWin = false;
    private $update = false;

    public function __construct() {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
          $this->isWin = true;  
        }    
        
    }
    
    public function install() {
        if($this->wwwRoot == "") {
            echo "No docment root given!\n\n";
            return false;
            
        }
        if(!file_exists($this->zipFile))   {
            echo "File $this->zipFile do not exist in the current directory!\n\n";
            return false;
        }
            
        
        if($this->isWin == false) {
            $icrootPath = $this->wwwRoot . '/inventorycontrol/';

            $this->extract();
            $this->renameDir();
            $this->copyDir();
            $this->copyEnvFile();

            $this->generteKey($icrootPath);
            $this->migrate($icrootPath);
            $this->message();
            return true;
        } else {
            echo "Windows not yet supported!\n";
            echo "You have to install it manualy!\n";
            return false;
        }
        
    }

    private function extract() {
         
        $retCode = exec("unzip $this->zipFile", $retArr, $retVal);
        echo "extract: $retCode\n\n";
        
    }

    private function renameDir() {
        $retCode = rename('inventorycontrol-master', 'inventorycontrol');
        echo "renameDir: $retCode\n\n";
    }
    
    private function copyDir() {
        $dest = $this->wwwRoot . '/inventorycontrol';
        $retCode = exec("mv inventorycontrol $dest");
        //$retCode = rename('./inventorycontrol', $this->wwwRoot . "/inventorycontrol");
        echo "copyDir: $retCode\n\n";
    }
    
    private function copyEnvFile() {
        $retCode = copy($this->env, $this->wwwRoot . "/inventorycontrol/$this->env");
        echo "copyEnvFile: $retCode\n\n";
    }
    
    
    private function generteKey($icrootpath) {
        $command = "php " . $icrootpath . "artisan key:generate";
        //echo "The command: " . $command . "\n";
        $retCode = exec($command, $retArr, $retVal);        
        echo "generteKey: $retCode\n\n";
    }

    private function migrate($icrootpath) {
        $command = "php " . $icrootpath . "artisan migrate";
        echo "Type yes to proceed the migration\n";
        $retCode = exec($command, $retArr, $retVal);        
        echo "migrate: $retCode\n\n";
        
    }
    
    private function message() {
        echo "Add the cron job for couter reset.\n";
        echo "The command have to be called from $this->wwwRoot/inventorycontrol directory.\n"; 
        echo "weekly: php artisan weeklyreset:cron\n";
        echo "monthly: php artisan monthlyreset:cron\n";
        echo "yearly: php artisan yearlyreset:cron\n";
        
    }
}



$install = new Install;

$install->install();


