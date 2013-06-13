<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>FTP Administration</title>
		<link rel="stylesheet" href="/application/views/css/960.css" type="text/css" media="screen" charset="utf-8" />
		
		<link rel="stylesheet" href="/application/views/css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="/application/views/css/colour.css" type="text/css" media="screen" charset="utf-8" />

</head>
<body>


<h1 id="head">

		<span class = "headspan">FTP Administration : <?=exec('hostname -f')?></span>
		<span class = 'free'>
	<ul class ="disk"><li>Main disk : <?=$disk1['space']?>	
		<?php 
	/*	
	$q="SELECT value FROM settings WHERE name = 'diskspace' ;";
	$diskspace = $DB->sq($q);
    $bytes = disk_free_space($diskspace[0]); 
    $si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
    $base = 1024;
    $class = min((int)log($bytes , $base) , count($si_prefix) - 1);
    echo sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class];
	*/
?>
</li>
<li> <? echo $disk2['disk']." : ".$disk2['space'] ?>
<?php 
	/*	
	$q="SELECT value,defval FROM settings WHERE name = 'disk1' ;";
	$disk1 = $DB->sq($q);
	echo "$disk1[1] : ";
    $bytes = disk_free_space($disk1[0]); 
    $si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
    $base = 1024;
    $class = min((int)log($bytes , $base) , count($si_prefix) - 1);
    echo sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class];
	*/
?>
</li>
<li> <? echo $disk3['disk']." : ".$disk3['space'] ?>
<?php
	/*
	$q="SELECT value,defval FROM settings WHERE name = 'disk2' ;";
	$disk2 = $DB->sq($q);
	echo "$disk2[1] : ";	
    $bytes = disk_free_space($disk2[0]); 
    $si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
    $base = 1024;
    $class = min((int)log($bytes , $base) , count($si_prefix) - 1);
    echo sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class];
	*/
?>
</li>
		</span>
		
	</h1>
	
	
		
		<ul id="navigation">
			<li><a href="/index.php/monitor/">FTP Monitor</a></li>
			<li><a href="/index.php/log/">FTP Log</a></li>
			<li><a href="/index.php/users/">FTP User Settings</a></li>
			
			<li><a href="/index.php/settings/">General Settings</a></li>				
			<li><a href="/index.php/logout/">Log Out</a></li>
		</ul>	
	
	
	<div id="content" class="container_16 clearfix">