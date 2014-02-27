README
======

What is PPI ?
--------------
PPI is a skeleton framework with the necessary wiring to let you drop in parts of existing frameworks and use their best bits, all under the one application. It allows developers to rapidly develop web applications and utilize features from the top frameworks without the tedious integration of them into your project.

PPI doesn't just stop at the core framework side of things, the skeleton application comes pre-bundled with the latest and greatest trending libraries for frontend development such as: HTML5Boilerplate and TwitterBootstrap already setup for you.


Installation
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
