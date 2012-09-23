<h2>Company Registration</h2>

<?php echo validation_errors();?>

<?php echo form_open(current_url());?>
	<table>
		<tr>
			<td>Title:</td>
			<td>
				<?php
				$options = array(
					'Mr.' 	=> 'Mr.',
					'Mrs.' 	=> 'Mrs.',
					'Ms.' 	=> 'Ms.',
					'Dr.' 	=> 'Dr.'
				);
				
				echo form_dropdown('title', $options, set_value('title'));
				?>
			</td>
		</tr>
		<tr>
			<td>First name:</td>
			<td><input type="text" name="first_name" value="<?php echo set_value('first_name');?>" /></td>
		</tr>
		<tr>
			<td>Last name:</td>
			<td><input type="text" name="last_name" value="<?php echo set_value('last_name');?>" /></td>
		</tr>
		<tr>
			<td>Company name:</td>
			<td><input type="text" name="company_name" value="<?php echo set_value('company_name');?>" /></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password" value="<?php echo set_value('password');?>" /></td>
		</tr>
		<tr>
			<td>Confirm password:</td>
			<td><input type="password" name="confirm_password" value="<?php echo set_value('confirm_password');?>" /></td>
		</tr>
		<tr>
			<td>Email address:</td>
			<td><input type="text" name="email" value="<?php echo set_value('email');?>" /></td>
		</tr>
		<tr>
			<td>Phone number:</td>
			<td><input type="text" name="phone" value="<?php echo set_value('phone');?>" /></td>
		</tr>
	</table>
	
	<input type="submit" value="Sign Up" />
<?php echo form_close();?>