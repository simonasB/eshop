# eshop
Information Systems module project

How to run project using PhpStorm:

Make sure you have installed php. You can download it from http://windows.php.net/download#php-7.0

1. Clone repository
2. Open or File->Open Directory cloned repository
3. Setup composer: 
  Dowload composer from https://getcomposer.org/download/
  In PhpStorm right click on root project folder and on the bottom Composer->Init.
  Select Path to PHP executable
  Path to composer.phar. Note that you will have to download this file separately even if you have composer installed.
3. Ctrl + Shift + x to open console
4. To download all necessary vendors use command: composer install
5. To install npm dependencies: npm install
6. To create database: php bin/console doctrine:schema:create
7. To update database schema: php bin/console doctrine:schema:update --force
8. To load fixtures and fill up database with dummy data: php bin/console doctrine:fixtures:load
9. To start app: php bin/console server:run --port={specifyport}. Note that default port is 8000
