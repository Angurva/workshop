# Installation and configuration #


### extract zip and rename workshop-main to workshop

#### $ git clone https://github.com/Angurva/workshop.git

$ sudo mv workshop-main/ workshop/

### copy to /var/www/html

$ sudo cp -R workshop /var/www/html/

$ cd /var/www/html/workshop

### create initial database with user workshop

$ sudo mysql
password

mysql> CREATE DATABASE workshop;
mysql> CREATE USER 'workshop'@'localhost' IDENTIFIED BY 'workshop';
mysql> GRANT ALL PRIVILEGES ON workshop.* TO 'workshop'@'localhost';
mysql> FLUSH PRIVILEGES;
mysql>quit;

$ cat src/workshop_bdd.sql | mysql -u workshop -p workshop

### script to create admin user
$ php src/script_admin_user.php

### fill database
$ cat src/datas.sql | mysql -u workshop -p workshop

$ composer install 

#admin login
 login : admin@localhost
 password : workshop

