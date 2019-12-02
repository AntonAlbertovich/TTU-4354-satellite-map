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

**FOR WINDOWS**

First, you must install wampserver which can be located at http://www.wampserver.com/en/#download-wrapper

After installing, you should see the wamp logo in the panel in your task bar. 

Click on it and select phpmyadmin.

It will ask for a username and password. The username is 'root' and no password is required. Click the go button.

Create a new database by selecting the new icon in the left-most pane.

Select the SQL tab from the top row and paste in the text from the SQL file included in this repository.

Hit the go button and the tables should be created.

Next, find your wamp64 folder. Inside it, select the folder titled www

Within the www folder create a folder called TTU-4354-satellite-map and place all of the php scripts inside it.

Make sure you copy the images folder into the TTU-4354-satellite-map folder as well, and make sure the folder name is still images.

Do the same with the css folder. 

Once you have completed the above steps, type http://localhost/TTU-4354-satellite-map/ into your browser bar and hit enter.


