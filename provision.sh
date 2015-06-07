#!/usr/bin/env bash

sudo apt-get update
sudo apt-get install -y git php5 php5-curl php5-xsl
curl -sL https://deb.nodesource.com/setup | sudo bash -
sudo apt-get install -y nodejs
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
composer install
npm install
