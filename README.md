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
As PPI2 is in development you have to switch over to the 2.0 branches on both the skeletonapp and framework repos.
Clone this repo, drop it in your document root somewhere.

cd /var/www; mkdir skeletonapp; git clone <ppi_skeletonapp_repo_url> .; git checkout 2.0

Then you need to download PPI repo and switch that to 2.0 branch
cd PPI; git clone <ppi_framework_repo_url>; git checkout 2.0

That's it! Now just browse to http://localhost/skeletonapp

Documentation
-------------
The documentation for PPI 2.0 is yet to be released.

Contributing
------------
PPI is an open source, community-driven project. If you'd like to contribute, please read the http://www.ppi.io/contributing page. If you're submitting a pull request, please do so on your own branch on github.

Requirements
------------
* PHP 5.3.0+
