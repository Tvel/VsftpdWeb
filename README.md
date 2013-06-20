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
