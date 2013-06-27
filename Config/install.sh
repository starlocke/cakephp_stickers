#!/bin/bash

######################
#
# This should automate most of the install commands.
# Manual TODO items:
# - setup database and tables
# - set VirtualHost's ServerName
# - reload apache2
#
# This script targets Ubuntu 12.04
#
######################

sudo apt-get -y install \
  apache2 \
  phpunit \
  git-core \
  libapache2-mod-php5 \

sudo adduser `whoami` www-data
sudo mkdir /usr/local/lib/cakephp
sudo chown `whoami`:`whoami` /usr/local/lib/cakephp
git clone -b postgres_array_columns git://github.com/starlocke/cakephp.git /usr/local/lib/cakephp
sudo ln -s /usr/local/lib/cakephp/lib /usr/local/lib/cake
sudo a2dissite default
sudo chown -R `whoami`:www-data /var/www
sudo find /var/www/ -type f -exec chmod ug+rw {} \;
sudo find /var/www/ -type d -exec chmod ug+rwx {} \;
sudo find /var/www/ -type d -exec chmod g+s {} \;

git clone git://github.com/starlocke/cakephp_stickers.git /var/www/cakephp_stickers
sudo ln -s /var/www/cakephp_stickers/Config/apache2/cakephp_stickers.conf /etc/apache2/sites-available/
sudo a2ensite cakephp_stickers.conf
sudo a2enmod rewrite
sudo service apache2 restart
sudo cp /var/www/cakephp_stickers/Config/php5/include_path.ini /etc/php5/apache2/conf.d/

echo "--- Manually: setup the schema in '/var/www/cakephp_stickers/Config/Schema/stickers.sql' ---"

