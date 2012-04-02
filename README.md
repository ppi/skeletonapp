# Installing the PPI Skeleton App

* Download the skeleton app into a folder your document root, such as /var/www/skeleton
* Download the PPI framework somewhere in your document root, such as /var/www/skeleton/PPI
* Success! you just installed PPI.

## Configuring the skeleton app

#### Update your app's base url 

Update the config file at ``App/Config/general.ini`` modify ``system.base_url`` to match something like ``http://localhost/skeleton/``. It must end in a forward slash.

#### Using the default user features

In the ``/sql/`` folde there's a ``user`` table for you to insert into a mysql DB. This lets you utilize various features such as

* User Registration (/user/register)
* User Login (/user/login)
* View Account (/account)
* Edit Account (/account/edit)
* Edit Password (/account/edit/password)

You can manage these users if your user account has the ``users.is_admin`` flag set to 1, by browsing to ``/manage/users/``.



### For questions, support, problems.

* irc.freenode.net #ppi
* ask on stackoverflow with the tags 'ppi' or 'ppi framework'
* create an 'issue' on the framework's issues area at http://github.com/ppi/framework/issues
* @ppi_framework on twitter.
* email dragoonis@php.net