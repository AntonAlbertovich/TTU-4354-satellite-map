# TTU-4354-satellite-map
A database of artificial satellites orbiting our planet. Sourced from https://www.ucsusa.org/resources/satellite-database

**FOR LINUX**

To run on a Linux machine you must move the TTU-4354-satellite-map file to the /var/www/html/ directory.  

If this directory does not exits on your machine you will need to make it.

As root cd into the /var/www/html/TTU-4354-satellite-map/ directory.

Set up mysql to not require a log in password for the root user.

Enter the following commands in the terminal:

```
mysql -u 'root' -p < TTU4354satellitemap.sql
mysql
mysql> USE TTU4354satellitemap SELECT * FROM main_table;
mysql> USE TTU4354satellitemap SELECT * FROM ID_table;
mysql> USE TTU4354satellitemap SELECT * FROM orbit_table;
exit;
php -S localhost:8080/TTU-4354-satellite-map
```
If anything goes wrong you may need to kill php via:
```
killall -9 php
```

If all goes well then you should be able to access the site from the link:

http://localhost:8080/TTU-4354-satellite-map

This has been tested on Ubuntu 18.04


