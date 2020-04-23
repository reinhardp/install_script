
Script zum Installieren der Lagerverwaltung

Kopieren Sie die Datei inventorycontrol-master.zip in das gleiche Verzeichnis in der Sie das Script 
installiert haben.

Bevor Sie das Script ausführen müssen in der .env in folgenden Sections die Parameter ausfüllen: 

# [Database]
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

# [Mail]
MAIL_SEND=true
MAIL_DRIVER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=25
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=<tls>
MAIL_FROM=<email>
MAIL_FROM_NAME=""

# [InventoryControl]
# change it to your needs
APP_URL=https://example.com

# Do not change this!
APP_KEY=
STAND_ALONE=true
APP_ENV=production
APP_DEBUG=false
LOG_CHANNEL=daily


******************

Außerdem müssen Sie in der install.php folgende Variablen rictig setzen:

private $wwwRoot = "";
private $resetWeeklyCron = false;
private $resetMonthlyCron = false;
private $resetYearlyCron = false;

