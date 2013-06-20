

<h1>General Settings</h1>
	
	
	<?=form_open('settings/change');?>
	<input type=hidden name="settings" value="1"> 
		<table align=center>
			<tr>
        		<th colspan=3>General Settings</th>
        	</tr>
			<tr>
        		<td width=150>Site URL:</td>
				<td width=300><input type='text' name="site_url" size=30 value="<?=$site_url?>"></td>
        	</tr>
			<tr>
        		<td width=150>Path of log file:</td>
				<td width=300><input type='text' name="log_path" size=30 value="<?=$log_path?>"></td>
        	</tr>
			<tr>
        		<td width=150>Default user dir(only in web):</td>
				<td width=300><input type='text' name="user_path" size=30 value="<?=$def_path?>"></td>
        	</tr>
			<tr>
        		<td width=150>Disk path:</td>
				<td width=300><input type='text' name="disk1" size=30 value="<?=$getdisk1?>"></td>
				<td width=50><input type='text' name="disk1n" size=30 value="<?=$getdisk1_def?>"></td>
        	</tr>
			<tr>
        		<td width=150>Disk2:</td>
				<td width=300><input type='text' name="disk2" size=30 value="<?=$getdisk2?>"></td>
				<td width=50><input type='text' name="disk2n" size=30 value="<?=$getdisk2_def?>"></td>
        	</tr>
			<tr>
        		<td width=150>Disk3:</td>
				<td width=300><input type='text' name="disk3" size=30 value="<?=$getdisk3?>"></td>
				<td width=50><input type='text' name="disk3n" size=30 value="<?=$getdisk3_def?>"></td>
        	</tr>
			
			<tr>
        		<td colspan=3 align=center><input type="submit" name="submit" value="Save Settings"></td>
         	</tr>
			<tr>
        		<th colspan=3>Mail Settings</th>
        	</tr>
			
			<tr>
        		<td width=150>Mail Server:</td>
				<td width=300><input type='text' name="mail_server" size=30 value="<?=$mail_server?>"></td>
        	</tr>
			<tr>
        		<td width=150>Mail Server port:</td>
				<td width=300><input type='text' name="mail_port" size=30 value="<?=$mail_port?>"></td>
        	</tr>
			<tr>
        		<td width=150>Mail User:</td>
				<td width=300><input type='text' name="mail_user" size=30 value="<?=$mail_user?>"></td>
        	</tr>
			<tr>
        		<td width=150>Mail User password:</td>
				<td width=300><input type="password" name="mail_password" size=30 value="<?=$mail_password?>"></td>
        	</tr>
			<tr>
        		<td width=150>Mail From:</td>
				<td width=300><input type='text' name="mail_from" size=30 value="<?=$mail_from?>"></td>
        	</tr>
			
			
			
			
			<tr>
        		<td colspan=3 align=center><input type="submit" name="submit" value="Save Settings"></td>
         	</tr>
			</table>
			</form>
			
			<?php echo validation_errors(); ?>
	<?=form_open('settings/changepass');?>
	
	<input type=hidden name=pass value=0> 
		<table align="center">
			<tr>
				<th colspan=2>Administrator's Password</th>
			</tr>
			<tr>
				<td width=150>Change Password:</td>
				<td width=300><input type="password" name="adminpass" size=30></td>
			</tr>
			<tr>
				<td width=150>Confirm Password:</td>
				<td width=300><input type="password" name="repass" size=30></td>
			</tr>
			<tr>
				<td colspan=2 align=center><input type="submit" name="submit" value="Save Password"></td>
			</tr>
		</table>
	</form>
   	   
