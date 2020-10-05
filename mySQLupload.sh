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
