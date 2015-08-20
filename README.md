PPI  Skeleton Application
=======================

Introduction
------------
This is a simple, skeleton application using the PPI MVC layer and module
systems. This application is meant to be used as a starting place for those
looking to get their feet wet with PPI.


What is PPI ?
--------------
PPI is the the PHP Interoperability Framework. It provides an equal and open platform to empower PHP developers to
pick the best tools from the best PHP frameworks

PPI bootstraps framework components for you from the top frameworks such as ZendFrameworks2, Symfony2, Laravel4,
FuelPHP, Doctrine2


Installation using Vagrant and Ansible
---------------------------

Before you can run vagrant you’ll need to install a few system dependencies.

# osx
brew install vagrant ansible node
# linux (ubuntu)
sudo apt-get install vagrant ansible node
# linux (centos)
sudo yum install vagrant ansible node

### Vagrant server

This project supports a basic [Vagrant](http://docs.vagrantup.com/v2/getting-started/index.html) configuration with
an inline shell provisioner to run the Skeleton Application in a [VirtualBox](https://www.virtualbox.org/wiki/Downloads).

1. Run vagrant up command

    vagrant up

2. Visit [http://localhost](http://localhost) in your browser

Look in [Vagrantfile](Vagrantfile) for configuration details.

### Apache setup

To setup apache, setup a virtual host to point to the public/ directory of the
project and you should be ready to go! It should look something like below:
    <VirtualHost *:80>
        ServerName    skeletonapp.ppi
        DocumentRoot  "/var/www/skeleton/public"
        SetEnv        PPI_ENV dev
        SetEnv        PPI_DEBUG true

        <Directory "/var/www/skeleton/public">
            AllowOverride All
            Allow from all
            DirectoryIndex index.php
            Options Indexes FollowSymLinks

            RewriteEngine On
            RewriteCond %{REQUEST_FILENAME} !-d
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteRule ^ index.php [L]

        </Directory>
    </VirtualHost>

### Nginx setup

To setup nginx, open your `/path/to/nginx/nginx.conf` and add an
[include directive](http://nginx.org/en/docs/ngx_core_module.html#include) below
into `http` block if it does not already exist:

   server {
       listen 80;
       server_name skeletonapp.ppi;
       root /var/www/skeleton/public;
       index index.php;

       location / {
           try_files $uri /index.php$is_args$args;
       }

       location ~ \.php$ {
           fastcgi_pass 127.0.0.1:9000;
           include fastcgi_params;
           fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
           fastcgi_param HTTPS off;
       }
   }

Restart the nginx, now you should be ready to go!


Documentation
-------------
[Visit the documentation](http://docs.ppi.io/latest)

Contributing
------------
Fork the repo, push your changes to your fork, and submit a pull request.



