
Script zum Installieren der Lagerverwaltung

Kopieren Sie die Datei inventorycontrol-master.zip in das gleiche Verzeichnis in der Sie das Script 
installiert haben.

Sie müssen auch eine Datenbank in MySQL anlegen. Diese geben Sie dann in DB_DATABASE= an.

Bevor Sie das Script ausführen müssen in der .env in folgenden Sections die Parameter ausfüllen: 

```bash
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
```

******************
WICHTIG!!
Sie müssen in Apache mod rewrite aktivieren!


English version:
----------------
Script to install warehouse management

Copy the file inventorycontrol-master.zip into the same directory where you saved the script
installed.

You also need to create a database in MySQL. You then enter this in DB_DATABASE =.

Before you run the script, fill in the parameters in the .env in the following sections:

```bash
# [Database]
DB_CONNECTION = mysql
DB_HOST = 127.0.0.1
DB_PORT = 3306
DB_DATABASE =
DB_USERNAME =
DB_PASSWORD =

# [Mail]
MAIL_SEND = true
MAIL_DRIVER = smtp
MAIL_HOST = 127.0.0.1
MAIL_PORT = 25
MAIL_USERNAME =
MAIL_PASSWORD =
MAIL_ENCRYPTION = <tls>
MAIL_FROM = <email>
MAIL_FROM_NAME = ""

# [InventoryControl]
# change it to your needs
APP_URL = https: //example.com
LISTEN_DIRECTORY=path/to/resource


# Do not change this!
APP_KEY =
STAND_ALONE = true
APP_ENV = production
APP_DEBUG = false
LOG_CHANNEL = daily
```

******************
IMPORTANT!!
You need to enable mod rewrite in Apache!
