*** installs ***
using Ubuntu
install apache2 webserver
install mysql-server
install mysql-client
### must install the connector ###
mysql_config --libs
mysql_config --cflags
sudo apt-get install libmysqlclient -dev

install PHP
install phpMyAdmin

*** imortant ***
COMPILING WITH MYSQL
gcc -o main $(mysql_config --cflags) main.c $(mysql_config --libs)

*** enabling cgi on apache2 - run c program on webpage ***
https://code-maven.com/set-up-cgi-with-apache
check cgi is on at /etc/apache2/conf-available/serve-cgi-bin.conf
check cgi is on at /etc/apache2/conf-enabled/serve-cgi-bin.conf
create a symbolic link to cgi.load
cd /etc/apache2/mod-enabled
sudo ln -s ../mods-available/cgi.load
sudo service apache2 reload

*** write a webpage with c ***
http://www.i-visionblog.com/2014/02/creating-website-using-c-programming.html

b/c Andorra country code is AND, I could not create a table named AND in mySQL, so Andorra's tabel is name AMD

*** access mysql ***
sudo mysql -u root

added apt: unzip and rename

changed the file names of all the country data spreadsheets:
used the rename command:
rename 's/^.*-//' *.csv


changed the column names to lower case using the sed comand
sed -i 's/GHG Emissions/ghg_emissions/g' *.csv

Changed Excel line breaks  (cntrl V, cntrl M) into \n
sed -i 's//\n/g' *.csv

created a bash script to upload each spread sheet to the mysql database

#!/bin/bash

dir="country-data"

for entry in "$dir"/*
do
	echo "$entry"

	inputString=$entry
	subString=$(echo $inputString|cut -b 14-16)
	echo $subString
        
	sudo mysql -u "root" -e "USE countrydata; SELECT DATABASE(); CREATE TABLE $subString(year INT(4), country VARCHAR(128), code VARCHAR(4), export FLOAT(14,2), import FLOAT(14,2), hunger FLOAT(7,2), poverty FLOAT(7,2), ghg_emissions FLOAT(14,2));" 
	sudo mysql -u "root" -e "USE countrydata; LOAD DATA LOCAL INFILE './$entry' INTO TABLE $subString FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 ROWS;"

done



**** web environment ****
installed curl
sudo apt install curl

installed Nodesource and nodejs
https://github.com/nodesource/distributions
# Using Ubuntu
curl -sL https://deb.nodesource.com/setup_13.x | sudo -E bash -
sudo apt-get install -y nodejs

installed chartjs
npm install chart.js --save
