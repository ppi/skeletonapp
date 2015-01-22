#!/bin/sh
cd /var/www
php -r "readfile('https://getcomposer.org/installer');" | php
php composer.phar install

/usr/sbin/apache2 -DFOREGROUND
