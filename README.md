VsftpdWeb
=========
VsftpdWeb is a simple web interface for vsftpd ftp server.
Vsftpd needs to be configured to virtual users with mysql pam authentications.
The web interface also needs change to sudoers file and shell access.
It is inteneded for internal network use.

http://velkoff.net/vsftpdweb/

WARNING
==========
Software is currently not compatible with php7

Install Instructions
==========

Required Linux packages:
-----------------------

* apache (or httpd)
* mysql-server
* php and php_mysql
* pam_mysql
* vsftpd

If php_mysql is missing only a blank page will be displayed and no errors will be produced.

Instalation steps:
-----------------

* set Short_tags=On in php.ini
* copy VsftpdWeb files to /var/www/ (or /var/www/html for httpd)
* create database vsftpd;
* import the default schema: `mysql vsftpd < VsftpdWeb/install_readme/vsftpd.sql`
* add a mysql user for vsftpd `CREATE USER 'vsftpd'@'localhost' IDENTIFIED BY 'secureftp2014';`
* add privileges for his database `GRANT ALL privileges ON vsftpd.* TO 'vsftpd'@'localhost' IDENTIFIED BY 'secureftp2014';`
* edit the database config file `application/config/database.php`


Now web interface should work. *Default password is admin.*

----Here web stuff should appear ok ----


Make another user just for vsftp:  "adduser vsftpd". This is optional.

In the new home dir make an FTP directory and xferlog.log file.
So there will be /home/vsftpd/FTP/ and /home/vsftpd/xferlog.log

Then the propper permissions whould be configured:
`chmod -R 770 /home/vsftpd`
`chown -R vsftpd:apache /home/vsftpd`

Copy the sample vsftpd.conf and paste it in /etc/vsftpd/vsftpd.conf

Now make changes to the last of the lines in the file.


    guest_username=vsftpd 
    local_root=/home/vsftpd/FTP/$USER   
    user_config_dir=/etc/vsftpd/vusers
    xferlog_file=/home/vsftpd/xferlog.log


guest_username is the user you made previously.

local_root and xferlog_file are the log and the main ftp location



`mkdir /etc/vsftpd/vusers`
Set it to 777 access for now.

edit sudoers via "visudo" and add:
    www-data ALL = NOPASSWD: /bin/chown root /etc/vsftpd/vusers/[a-zA-Z0-9]* 
    www-data ALL = NOPASSWD: /bin/rm /etc/vsftpd/vusers/[a-zA-Z0-9]* 
(or apache instead of www-data for httpd)

Edit the /etc/pam.d/vsftpd file with the sample vsftpd.pam file. change the username and password for the database.
If debugging is necessary add "verbose=1 debug=1" at the end of each line.



If you have only one directory where you keep your FTP data, in the admin interface you should most likely use `/home/vsftpd/` for "Disk path", "Disk2" and "Disk3".

The mail functionality needs a cron job for http://localhost/index.php/email send mail for mails and users in "mail" table for yesterday atm.

If you need to install in directory different than root edit the `$config['base_url']` line in `"\application\config\config.php"`

##Enjoy!
