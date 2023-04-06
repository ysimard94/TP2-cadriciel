## Projet

Ceci est un projet Laravel avec une base de données MySQL. Il est possible de s'enregistrer, se connecter, ajouter des articles ainsi que des fichiers.

## Installation

### Utiliser la commande suivante pour installer les dépendances nécessaires dans le terminal à la racine du projet :
composer install

## Utiliser les requêtes dans le fichier database.sql à la racine pour créer la base de données avec les données de base.

## Créer un fichier .htaccess à la racine avec ce contenu :

<IfModule mod_rewrite.c>
<IfModule mod_negotiation.c>
    Options -MultiViews
</IfModule>

RewriteEngine On


RewriteCond %{REQUEST_FILENAME} -d [OR]
RewriteCond %{REQUEST_FILENAME} -f
RewriteRule ^ ^$1 [N]

RewriteCond %{REQUEST_URI} (\.\w+$) [NC]
RewriteRule ^(.*)$ public/$1

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ server.php
</IfModule>

### Créer un fichier .env à la racine du projet avec ce contenu, modifier les informations DB(database) selon ce qui est nécessaire :  

APP_NAME=Maisonneuve2194679
APP_ENV=local
APP_KEY=base64:ttNKzzt/7/UlMbmxVlmvaLmPUtKXLodmaOM/xQQ7nvc=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=maisonneuve2194679
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
