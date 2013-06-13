<h1>Change FTP User settings : <?=$user_item['username']?></h1>

<?=form_open('users/change');?>
<input type="hidden" name="id" value="<?=$user_item['id']?>">
<input type="hidden" name="username" value="<?=$user_item['username']?>"> 
<input type="hidden" name="disk1" value="<?=$getdisk1?>"> 
<input type="hidden" name="disk2" value="<?=$getdisk2?>"> 


<table align="center">
			
			<tr>
				<td >Select path:</td>
				<td ><input type="radio" name="dir" value="def"<? if($checked == 1) echo 'checked'; ?> /> Default user path</td>
			</tr>
			<tr>
				<td ></td>
				<td ><input type="radio" name="dir" value="disk1" <? if($checked == 2) echo 'checked'; ?> /> <?=$getdisk1?></td>
			</tr>
			<tr>
				<td ></td>
				<td ><input type="radio" name="dir" value="disk2" <? if($checked == 3) echo 'checked'; ?> /> <?=$getdisk2?></td>
			</tr>
			<tr>
				<td width=150>Home dir:</td>
				<td width=300><input type="text" name="path" size=30 value="<? if ($user_item['path'] != 'none') echo $checkpath;?>"></td>
			</tr>
			<tr>
				<td width=150></td>
				<td width=300><input type="checkbox" name="write" value="yes" <?if ($user_item['perm'] == 'w' | $user_item['perm'] == 'wd') echo 'checked'; ?> />Write / Upload access</td>
			</tr>
			<tr>
				<td width=150></td>
				<td width=300><input type="checkbox" name="delete" value="yes" <?if ($user_item['perm'] == 'wd') echo 'checked'; ?> />Delete / Rename restriction</td>
			</tr>
			<tr>
				<td colspan=2 align="center"><input type="submit" name="submit" value="Save" onclick=""></td>
			</tr>
		</table>
		
</form>
<h1>Change FTP User Password</h1>
<?=form_open('users/changepass');?>
	<input type="hidden" name="id" value="<?=$user_item['id']?>"> 
		<table align="center">
			<tr>
				<th colspan=2>New Password</th>
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
				<td colspan=2 align="center"><input type="submit" name="submit" value="Save" onclick=""></td>
			</tr>
		</table>
	</form>