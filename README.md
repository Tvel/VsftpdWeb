VsftpdWeb
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
  It is an easy change, just edit application\views\log\index.php line8: $myfile varriable
  
xferlog_file=/home/vsftpd/xferlog.log --- same for now



---configure MYSQL
Upload the database

Edit - application\config\database.php

