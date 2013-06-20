<html>
<head>
    <style type="text/css">

	table {
	width:100%;
}

th, td {
	padding:7px 15px;
	text-align:left;
	border-bottom:1px solid red;
}
	
	
    </style>
</head>
<body>

<h1><?=exec('hostname -f')?> FTP LOG</h1>
<table class="log">
<tr><th>Info</th><th>Size</th><th>State</th><th>User</th><th>File Name</th></tr>
<?

		echo $load;


?>
</table>

</body>
</html>