VsftpdWeb
=========
VsftpdWeb is a simple web interface for vsftpd ftp server.
Vsftpd needs to be configured to virtual users with mysql pam authentications.
The web interface also needs change to sudoers file and shell access.
It is inteneded for internal network use.

http://velkoff.net/vsftpdweb/

=========
---Linux Changes: 
--Sudoers file changes: 

www-data ALL = NOPASSWD: /bin/chown root /etc/vsftpd/vusers/[a-zA-Z0-9]*
www-data ALL = NOPASSWD: /bin/rm /etc/vsftpd/vusers/[a-zA-Z0-9]*

--PAM 
The vsftpd.pam contains the pam template.
Edit the database settings

--VSFTPD

Config file is in this directory.
In the bottom there are the lines you must edit to match your configuration.

  guest_username=vsftpd
  
  local_root=/home/vsftpd/FTP/$USER 

user_config_dir=/etc/vsftpd/vusers --- I reccomend this to be lest as it is. 
  The config part of the web interface is not made to be reconfigured.
  
xferlog_file=/home/vsftpd/xferlog.log --- or something else, you just need to configure it later in the web interface also



---configure MYSQL
Upload the database

Edit - application\config\database.php
 configure log file path and ftp paths in Settings

 
--- Mail
needs cron job for http://localhost/index.php/email
send mail for mails and users in "mail" table for yesterday atm.

--------------------------------
----New Install Instructions----
==========

Install apache (or httpd)

Install mysql-server

Install php and php_mysql

Install pam_mysql

Install vsftpd



set Short_tags=On in php.ini


copy vsftpd web stuff to /var/www/ (or /var/www/html for httpd)


edit the database config file "application/config/database.php" 


Now web interface should work. Default password is admin.


----Here web stuff should appear ok ----

I tend to make another user just for vsftp:  "adduser vsftpd", that is optional.

in the new home dir for test setup make an FTP directory and xferlog.log file. make them fully acessable by all.
So there will be /home/vsftpd/FTP/ and /home/vsftpd/xferlog.log


copy the sample vsftpd.conf and paste it in /etc/vsftpd/vsftpd.conf


now make changes to the last of the lines in the file.


guest_username=vsftpd 

local_root=/home/vsftpd/FTP/$USER   

user_config_dir=/etc/vsftpd/vusers

xferlog_file=/home/vsftpd/xferlog.log


guest_username is the user i made.

local_root and xferlog_file are the log and the main ftp location



mkdir /etc/vsftpd/vusers
set it to 777 access for now.

edit sudoers via "visudo" and add:
www-data ALL = NOPASSWD: /bin/chown root /etc/vsftpd/vusers/[a-zA-Z0-9]* 
www-data ALL = NOPASSWD: /bin/rm /etc/vsftpd/vusers/[a-zA-Z0-9]* 
(or apache instead of www-data for httpd)

edit the /etc/pam.d/vsftpd file with the sample vsftpd.pam file. change the username and password for the database.


