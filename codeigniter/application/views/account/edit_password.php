<h2>Change password</h2>

<?php echo validation_errors();?>

<?php echo form_open(current_url());?>
	<table>
		<tr>
			<td>Current password:</td>
			<td><input type="password" name="current_password" value="<?php echo set_value('current_password');?>" /></td>
		</tr>
		<tr>
			<td>New password:</td>
			<td><input type="password" name="new_password" value="<?php echo set_value('new_password');?>" /></td>
		</tr>
		<tr>
			<td>Confirm new password:</td>
			<td><input type="password" name="confirm_new_password" value="<?php echo set_value('confirm_new_password');?>" /></td>
		</tr>
	</table>
	
	<input type="submit" name="submitOK" value="Save Changes" />
	<input type="submit" name="submitCancel" value="Cancel" />
<?php echo form_close();?>