README
======

What is PPI ?
--------------
The PPI Framework is a micro to light full-stack web framework. It focuses on having a light footprint, convenient and minimalistic. It allows developers to rapidly develop web applications and utilize features from 3rd party libraries without the tedious integration of them into your project. It also allows developers to build better and easy to maintain websites/web applications.

Why is PPI Different?
---------------------
PPI is not another framework to re-invent the wheel. The idea behind it is to build a more pragmatic, simplistic and easier version of the wheel. It's built re-using the core components of other web frameworks such as Symfony2, Doctrine2 and ZendFramework2.

PPI pre-integrates third libraries for you (aka autoloading) so that you can drop their components into your Vendor folder and you're up and running instantly. From PPI you're able to seamlessly have plug and play, moreso play because that's the fun part!

PPI doesn't just stop at the PHP side of things, the skeleton application comes pre-bundled with the latest and greatest trending libraries for frontend development such as: HTML5Boilerplate and TwitterBootstrap.


Installation
------------

Linux
------------
Just ensure you have Docker installed and run the following commands:

```
docker run -p 3306:3306 --name mysql -e MYSQL_ROOT_PASSWORD=ppi mysql
docker build -t ppi .
docker run -p 80:80 -v `pwd`:/var/www --link mysql ppi
```

You can now browse to your ppi application at http://192.168.66.66

OSX
------------
Just ensure you have Vagrant installed and run:

```
vagrant up
```

You can now browse to your ppi application at http://192.168.66.66

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
* PHP 5.3.3+ (this is the base requirement of symfony2, so we must comply with that)
