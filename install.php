<?php



class Install {

    /*** change to your need ***/
    private $wwwRoot = "";
    private $resetWeeklyCron = false;
    private $resetMonthlyCron = false;
    private $resetYearlyCron = false;
    /******/

    private $env = '.env';
    private $zipFile = 'iventorycontrol-master.zip';
    private $isWin = false;
    private $update = false;
    private $zipFile = "";

    public function __construct() {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
          $this->isWin = true;  
        }    
        
    }
    
    public function install() {
        
        if($this->isWin == false) {
            $icrootPath = $wwwRoot . '/inventorycontrol/';

            $this->extract();
            $this->renameDir();
            $this->copyDir();
            $this->copyEnvFile();

            $this->generteKey($icrootPath);
            $this->migrate($icrootPath);

            $this->createcronJob();
            return true;
        } else {
            echo "Windows not yet supported!\n";
            echo "You have to install it manualy!\n";
            return false;
        }
        
    }

    private function extract() {
         
        $retCode = exec("unzip $zipFile", $retArr, $retVal);
        
    }

    private function renameDir() {
        $retCode = rename('iventorycontrol-master', 'iventorycontrol');
    }
    
    private function copyDir() {
        
        $retCode = copy('iventorycontrol', $this->wwwRoot);
    }
    
    private function copyEnvFile() {
        $retCode = copy('.env', $this->wwwRoot . '/inventorycontrol/.env');
    }
    
    private function createcronJob() {
        
        if($this->resetWeeklyCron == true) {
            
        }
        if($this->resetMonthlyCron == true) {
            
        }
        if($this->resetYearlyCron == true) {
            
        }
    }
    
    private function generteKey($icrootpath) {
        $command = "php " . $icrootpath . "/artisan key:generate";
        $retCode = exec($command, $retArr, $retVal);        
    }

    private function migrate($icrootpath) {
        $command = "php " . $icrootpath . "/artisan migrate";
        $retCode = exec($command, $retArr, $retVal);        
        
    }
}



$install = new Install;

$install->install();