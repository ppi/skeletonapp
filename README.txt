Step 1
--------
You need a checkout of the PPI framework.
Check this out to a folder for example: /var/www/ppi-framework/

Checkout the PPI Skeleton App to a folder for example: /var/www/ppi-skeleton-app/

Update your skeleton app's index.php to include the framework's path/init.php file.
For example: include_once('../ppi-framework/PPI/init.php');


Step 2
--------
-> You need to update the skeleton apps config file to suit your HTTP path.
The config file is located: /var/www/ppi-skeleton-app/App/Config/general.ini
This config file has two sections, [development] and [production]. By default you'll be editing [development]
system.base_url = http://localhost/ppi-skeleton-app/  <-- Note this must end in a slash.

You are ready to go!
