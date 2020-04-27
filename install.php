<?php



class Install {

    /*** change to your need ***/
    private $wwwRoot = "";
    /******/

    private $env = '.env';
    private $zipFile = 'iventorycontrol-master.zip';
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
         
        $retCode = exec("unzip $zipFile", $retArr, $retVal);
        echo "extract: $retCode\n";
        
    }

    private function renameDir() {
        $retCode = rename('iventorycontrol-master', 'iventorycontrol');
        echo "renameDir: $retCode\n";
    }
    
    private function copyDir() {
        
        $retCode = copy('iventorycontrol', $this->wwwRoot);
        echo "copyDir: $retCode\n";
    }
    
    private function copyEnvFile() {
        $retCode = copy('.env', $this->wwwRoot . '/inventorycontrol/.env');
        echo "copyEnvFile: $retCode\n";
    }
    
    
    private function generteKey($icrootpath) {
        $command = "php " . $icrootpath . "/artisan key:generate";
        $retCode = exec($command, $retArr, $retVal);        
        echo "generteKey: $retCode\n";
    }

    private function migrate($icrootpath) {
        $command = "php " . $icrootpath . "/artisan migrate";
        $retCode = exec($command, $retArr, $retVal);        
        echo "migrate: $retCode\n";
        
    }
    
    private function message() {
        echo "Add the con job for couter reset\n";
        echo "The command have to be called from $this->wwwRoot/inventorycontrol/ directory"; 
        echo "weekly: php artisan weeklyreset:cron\n";
        echo "monthly: php artisan monthlyreset:cron\n";
        echo "yearly: php artisan yearlyreset:cron\n";
        
    }
}



$install = new Install;

$install->install();


