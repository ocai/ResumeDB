<h2>Confirm Account Deletion</h2>

<p>Are you sure you want to delete your account? Please provide your password and select the checkbox to confirm you fully understand that all information associated with your account will be lost.</p>

<?php echo validation_errors(); ?>

<?php echo form_open(current_url()); ?>
	<p>
		Current password: <input type="password" name="current_password" value="<?php echo set_value('current_password'); ?>" /><br>
		<label><input type="checkbox" name="confirm_delete" /> Yes, I want to delete my account.</label>
		<br><br>
		<input type="submit" name="submitOK" value="Delete Account" />
		<input type="submit" name="submitCancel" value="Cancel" />
	</p>
<?php echo form_close(); ?>