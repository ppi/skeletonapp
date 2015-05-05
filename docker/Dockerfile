# Base image
FROM ubuntu:14.04

# Packages
RUN DEBIAN_FRONTEND=noninteractive apt-get update -y
RUN DEBIAN_FRONTEND=noninteractive apt-get install -y apache2 libapache2-mod-php5 php5-imagick php5-gd php5-intl php5-mcrypt php5-apcu php5-curl php5-mysql subversion git

# Remove default html directory and modify default virtualhost to use public directory as web root
ADD virtual-host.conf /etc/apache2/sites-enabled/000-default.conf

# Enable apache2 rewrite module
RUN a2enmod rewrite

# Apache2 environment variables
ENV APACHE_RUN_USER     www-data
ENV APACHE_RUN_GROUP    www-data
ENV APACHE_LOG_DIR      /var/log/apache2
ENV APACHE_PID_FILE     /var/run/apache2.pid
ENV APACHE_RUN_DIR      /var/run/apache2
ENV APACHE_LOCK_DIR     /var/lock/apache2

CMD [ "/var/www/run.sh" ]

ENTRYPOINT [ "/bin/bash" ]
