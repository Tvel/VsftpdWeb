

<h1>Users</h1>
<table class="users" >
<tr> <th>Username</th>  <th></th> <th></th> <th>Path</th> <th>Permissions</th></tr>
<? 
$base_url = base_url();
foreach ($users as $user_item){


$del = "".$base_url."index.php/users/delete/".$user_item['id'];
$pw = "".$base_url."index.php/users/".$user_item['id'];



if ($user_item['path'] == 'none') $path = $def_path.$user_item['username'];
else $path = $user_item['path'];

if ($user_item['perm'] == 'r' || $user_item['perm'] == '0') $perm = 'Read';
else if ($user_item['perm'] == 'w') $perm = 'Write';
else if ($user_item['perm'] == 'wd') $perm = 'Write -DR';

?> <tr>
<td><strong> <?=$user_item['username']?> </strong></td> 
<td> <a href=<?=$del?> class="delete">Delete</a> </td>
<td> <a href=<?=$pw?> class="edit">Settings</a> </td> 

<td><?=$path?></td>
<td><?=$perm?></td>
<?
}
 
?>
</table>


<?php echo validation_errors(); ?>

<?php echo form_open(); ?>

<h1>New FTP User</h1>
		<table align="center">
			<tr>
				<th colspan=2>New Username</th>
			</tr>
			<tr>
				<td width=150>Username:</td>
				<td width=300><input type="text" name="user" size=30></td>
			</tr>
			<tr>
				<td width=150>Password:</td>
				<td width=300><input type="password" name="upass" size=30></td>
			</tr>
			<tr>
				<td width=150>Confirm Password:</td>
				<td width=300><input type="password" name="repass" size=30></td>
			</tr>
			<tr>
				<td colspan=2 align="center"><input type="submit" name="submit" value="Create User" /> </td>
			</tr>
		</table>
	</form>
