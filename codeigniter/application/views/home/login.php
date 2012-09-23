<h2>Log In</h2>

<?php
if($message != '') {
	echo "<p>$message</p>";
}

if($this->session->flashdata('message')) {
	echo "<p>" . $this->session->flashdata('message') . "</p>";
}

echo validation_errors();	//this automatically generates paragraph tags
?>

<?php echo form_open('home/login', array('name' => 'login_form')); ?>
	<table>
		<tr>
			<td valign="top">I'm a:</td>
			<td>
				<label><input type="radio" name="user" value="student" onclick="updateLabel()" <?php echo set_radio('user', 'student', true); ?> />Student</label><br>
				<label><input type="radio" name="user" value="company" onclick="updateLabel()" <?php echo set_radio('user', 'company'); ?> />Recruiter</label>
			</td>
		</tr>
		<tr>
			<td id="lblUser">NetID:</td>
			<td><input type="text" name="username" value="<?php echo set_value('username'); ?>" /></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password" value="<?php echo set_value('password'); ?>" /></td>
		</tr>
	</table>

	<input type="submit" value="Log In" />
<?php echo form_close(); ?>