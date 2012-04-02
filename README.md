## Installing the PPI Skeleton App

* Download the skeleton app into a folder your document root, such as /var/www/skeleton
* Download the PPI framework somewhere in your document root, such as /var/www/skeleton/PPI
* Success! you just installed PPI.

## Configuring the skeleton app

#### Update your base_url to match that of your environment, it must end in a slash.
Update your config file at ``App/Config/general.ini`` modify ``system.base_url`` to match something like ``http://localhost/skeleton/``

### Using the default user features

 In the ``/sql/`` folde there's a ``user`` table for you to insert into a mysql DB. This lets you it