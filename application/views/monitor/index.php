

<div class="grid_16">
<h1>Service monitor</h1>
<table class="monitor">
<?php  foreach ($mon1 as $line) {


if  (preg_match("/LISTENER/", $line)  ) {
echo "<tr><th colspan =2>VSFTPD server is online</th></tr>";
}
}
 foreach ($mon1 as $line) {


if  (preg_match("/LISTENER/", $line)  ) {

//echo "<tr><th colspan =2>VSFTPD server is online</th></tr>";
}
else if (preg_match("/IDLE/", $line)  ){

$user = strstr($line, "IDLE", true);
$pos = strrpos($user, "/") + 1;
$user = substr($user,$pos);
/*
$pid = strstr($line, "?", true);
$pos = strrpos($pid, ":");
$pid = substr($pid,$pos);

$a = "?action=monitor&pid=$pid";
*/
echo "<tr><td id = inf><strong>$user</strong> is doing nothing </td><td id = log>M: $line </td></tr>";
}

else if (preg_match("/STOR/", $line) ) {
		$file = strstr($line, "STOR");
		$file = substr($file, 4);
		
		$user = strstr($line, "STOR", true);
		$pos = strrpos($user, "/") + 1;
		$user = substr($user,$pos);
/*		
		$pid = strstr($line, "?", true);
		$pos = strrpos($pid, ":");
		$pid = substr($pid,$pos);

		$a = "?action=monitor&pid=$pid";
*/
echo "<tr><td id = inf>  <strong>$user</strong> is uploading file: <strong>$file</strong> </td><td id = log>M: $line </td></tr>";
}
else if (preg_match("/RETR/", $line) ) {

		$file = strstr($line, "RETR");
		$file = substr($file, 4);
		
		$user = strstr($line, "RETR", true);
		$pos = strrpos($user, "/") + 1;
		$user = substr($user,$pos);
/*		
		$pid = strstr($line, "?", true);
		$pos = strrpos($pid, ":");
		$pid = substr($pid,$pos);

		$a = "?action=monitor&pid=$pid";
*/
echo "<tr><td id = inf>  <strong>$user</strong> is downloading file: <strong>$file</strong> </td><td id = log>M: $line </td></tr>";
}
else {
/*
		$pid = strstr($line, "?", true);
		$pos = strrpos($pid, ":");
		$pid = substr($pid,$pos);

		$a = "?action=monitor&pid=$pid";

*/
echo "<tr><td></td><td id = log>M: $line </td></tr>";
}


}


 ?>
</table>
 </div>
 
<br />
<br />

<div class="grid_16">
<h1>Users Connected</h1>

<table class="monitor">
<?php  foreach ($mon2 as $line) {

$line = substr($line,0,-16);
$user = strstr($line, "vsftpd", true);
echo "<tr><td id = inf>    <strong>$user</strong> is logged in </td><td>U: $line </td></tr>";


}


 ?>
 
 </table>
 </div>