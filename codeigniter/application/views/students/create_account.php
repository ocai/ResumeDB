<h2>Student Registration</h2>

<?php echo validation_errors();?>

<?php echo form_open(current_url());?>
	<table>
		<tr>
			<td>First name:</td>
			<td><input type="text" name="first_name" value="<?php echo set_value('first_name');?>" /></td>
		</tr>
		<tr>
			<td>Last name:</td>
			<td><input type="text" name="last_name" value="<?php echo set_value('last_name');?>" /></td>
		</tr>
		<tr>
			<td>NetID:</td>
			<td><input type="text" name="netID" value="<?php echo set_value('netID');?>" /></td>
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
			<td>E-mail address:</td>
			<td><input type="text" name="email" value="<?php echo set_value('email');?>" /></td>
		</tr>
		<tr>
			<td>Phone number:</td>
			<td><input type="text" name="phone" value="<?php echo set_value('phone');?>" /></td>
		</tr>
		<tr>
			<td>Year entered:</td>
			<td><input type="text" name="year" value="<?php echo set_value('year');?>" /> YYYY</td>
		</tr>
		<tr>
			<td>Major:</td>
			<td>
				<?php
				$options = array(
					'Computer Engineering' => 'Computer Engineering',
					'Electrical Engineering' => 'Electrical Engineering'
				);
				
				echo form_dropdown('major', $options, set_value('major'));
				?>
			</td>
		</tr>
	</table>
	
	<input type="submit" value="Sign Up" />
<?php echo form_close();?>