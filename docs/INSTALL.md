# Cambuzz installation guide

## Step 1: Install Apache
* `$ sudo apt-get update`
* `$ sudo apt-get install apache2`

## Step 2: Install MySQL

* `$ sudo apt-get install mysql-server php5-mysql`

Note : During the installation, your server will ask you to select and confirm a password for the MySQL "root" user. This is an administrative account in MySQL that has increased privileges. Think of it as being similar to the root account for the server itself (the one you are configuring now is a MySQL-specific account however).

* `$ sudo mysql_install_db`
* `$ sudo mysql_secure_installation`


Note : You will be asked to enter the password you set for the MySQL root account. Next, it will ask you if you want to change that password. If you are happy with your current password, type "n" for "no" at the prompt.

## Step 3: Install PHP

1) sudo apt-get install php5 libapache2-mod-php5 php5-mcrypt

2) sudo nano /etc/apache2/mods-enabled/dir.conf

The above mentioned command will open the dir.conf file in a text editor . The file looks as shown below : 

```                      
<IfModule mod_dir.c>
    DirectoryIndex index.html index.cgi index.pl index.php index.xhtml index.htm
</IfModule>
```

Move the PHP index file highlighted above to the first position after the DirectoryIndex specification, like this:

```
<IfModule mod_dir.c>
    DirectoryIndex index.php index.html index.cgi index.pl index.xhtml index.htm
</IfModule>
```

The change has been highlighted. When you are finished, save and close the file.

* `$ sudo service apache2 restart`


## Step 4: Test PHP Processing on your Web Server
1) sudo nano /var/www/html/info.php

2) This will open a blank file named “info.php”. Put the following text, which is valid PHP code, inside the file:

```
<?php
phpinfo();
?>
```
When you are finished, save and close the file.

* Visit the following link on the browser: `http://localhost/info.php`.  
* If this is successful, then PHP is working as expected.

## Step 5: Install phpMyAdmin
* `$ sudo apt-get update`
* `$ sudo apt-get install phpmyadmin`
					
Warning
When the first prompt appears, apache2 is highlighted, but not selected. If you do not hit "SPACE" to select Apache, the installer will not move the necessary files during installation. Hit "SPACE", "TAB", and then "ENTER" to select Apache.

* `$ sudo php5enmod mcrypt`
* `$ sudo service apache2 restart`
* Visit the following link on the browser : `http://localhost/phpmyadmin`.  

If this is successful, then PHP is working as expected. You can now log into the interface using the root username and the administrative password you set up during the MySQL installation.

## Step 6: Clone the repo

Clone the repo in /var/www/html/ . Use sudo in case of permission error.

## Step 7: Setting up database

Now you need to set the password in core/includes/db_connection.php to your phpmyadmin password.
Create a database named cambuzz and import [cambuzz.sql](cambuzz.sql) into the database.

Now you are all set. Check out localhost/core and you can start by signing up.



