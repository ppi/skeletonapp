README
======

What is PPI ?
--------------
PPI is the the PHP Interoperability Framework. It provides an equal and open platform to empower PHP developers to pick the best tools from the best PHP frameworks

PPI bootstraps framework components for you from the top frameworks such as ZendFrameworks2, Symfony2, Laravel4, FuelPHP, Doctrine2

Installation
------------

Linux
-----
Install vagrant and ansible

```
vagrant up
```

Now you can now browse to your ppi application at http://192.168.66.66

OSX
---
Install vagrant and ansible

```
vagrant up
```

Now you can now browse to your ppi application at http://192.168.66.66

Rolling your own
------------
Drop this skeleton app into your document root somewhere. You need to run the composer library to obtain the vendor dependencies that PPI requires.

``` bash
curl -s http://getcomposer.org/installer | php
php composer.phar install
```

Ideally you'll want to set up a vhost on your httpd web server to point your domain to the /public/ folder of your PPI skeleton app, but for now you're still able to browse to http://localhost/skeletonapp/public/

Documentation
-------------
We have began documenting ppi2, you can see how far we've gotten at http://www.ppi.io/docs

Contributing
------------
Fork the repo, push your changes to your fork, and submit a pull request.

Requirements
------------
* PHP 5.3.10+ - We recommend PHP 5.4 or even better PHP 5.5
