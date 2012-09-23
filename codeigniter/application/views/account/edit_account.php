<h2>Edit Account Settings</h2>

<?php echo validation_errors(); ?>

<?php echo form_open(current_url()); ?>
	<table>
		<?php if($this->session->userdata('netID')): ?>
			<tr>
				<td>First name:</td>
				<td><input type="text" name="first_name" value="<?php echo (set_value('first_name') == '') ? $first_name : set_value('first_name'); ?>" /></td>
			</tr>
			<tr>
				<td>Last name:</td>
				<td><input type="text" name="last_name" value="<?php echo (set_value('last_name') == '') ? $last_name : set_value('last_name'); ?>" /></td>
			</tr>
			<tr>
				<td>NetID (cannot change):</td>
				<td><?php echo $this->session->userdata('netID'); ?></td>
			</tr>
			<tr>
				<td>E-mail Address:</td>
				<td><input type="text" name="email" value="<?php echo (set_value('email') == '') ? $email : set_value('email'); ?>" /></td>
			</tr>
			<tr>
				<td>Phone Number:</td>
				<td><input type="text" name="phone" value="<?php echo (set_value('phone') == '') ? $phone : set_value('phone'); ?>" /></td>
			</tr>
			<tr>
				<td>Year entered:</td>
				<td><input type="text" name="year" value="<?php echo (set_value('year') == '') ? $year : set_value('year'); ?>" /></td>
			</tr>
			<tr>
				<td>Major:</td>
				<td>
					<?php
					$options = array(
						'Computer Engineering' => 'Computer Engineering',
						'Electrical Engineering' => 'Electrical Engineering'
					);
					
					echo form_dropdown('major', $options, (set_value('major') == '') ? $major : set_value('major'));
					?>
				</td>
			</tr>
		<?php else: ?>
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
					
					echo form_dropdown('title', $options, (set_value('title') == '') ? $title : set_value('title'));
					?>
				</td>
			</tr>
			<tr>
				<td>First name:</td>
				<td><input type="text" name="first_name" value="<?php echo (set_value('first_name') == '') ? $first_name : set_value('first_name'); ?>" /></td>
			</tr>
			<tr>
				<td>Last name:</td>
				<td><input type="text" name="last_name" value="<?php echo (set_value('last_name') == '') ? $last_name : set_value('last_name'); ?>" /></td>
			</tr>
			<tr>
				<td>Company name (cannot change):</td>
				<td><?php echo $company_name; ?></td>
			</tr>
			<tr>
				<td>Username (cannot change):</td>
				<td><?php echo $this->session->userdata('username'); ?></td>
			</tr>
			<tr>
				<td>E-mail Address:</td>
				<td><input type="text" name="email" value="<?php echo (set_value('email') == '') ? $email : set_value('email'); ?>" /></td>
			</tr>
			<tr>
				<td>Phone Number:</td>
				<td><input type="text" name="phone" value="<?php echo (set_value('phone') == '') ? $phone : set_value('phone'); ?>" /></td>
			</tr>
		<?php endif; ?>
	</table>
	
	<input type="submit" name="submitOK" value="Save Changes" />
	<input type="submit" name="submitCancel" value="Cancel" />
<?php echo form_close(); ?>