<h2>My Account</h2>

<?php
if($this->session->flashdata('message')) {
	echo "<p>" . $this->session->flashdata('message') . "</p>";
}
?>

<h3>Account Settings <?php echo anchor('account/edit', '[Edit]'); ?></h3>

<table width="100%">
	<?php if($this->session->userdata('netID')): ?>
		<tr class="alt">
			<th>First name:</th>
			<td><?php echo $first_name; ?></td>
		</tr>
		<tr>
			<th>Last name:</th>
			<td><?php echo $last_name; ?></td>
		</tr>
		<tr class="alt">
			<th>NetID:</th>
			<td><?php echo $this->session->userdata('netID'); ?></td>
		</tr>
		<tr>
			<th>Email address:</th>
			<td><?php echo $email; ?></td>
		</tr>
		<tr class="alt">
			<th>Phone number:</th>
			<td><?php echo $phone; ?></td>
		</tr>
		<tr>
			<th>Year entered:</th>
			<td><?php echo $year; ?></td>
		</tr>
		<tr class="alt">
			<th>Major:</th>
			<td><?php echo $major; ?></td>
		</tr>
	<?php else: ?>
		<tr class="alt">
			<th>Title:</th>
			<td><?php echo $title; ?></td>
		</tr>
		<tr>
			<th>First name:</th>
			<td><?php echo $first_name; ?></td>
		</tr>
		<tr class="alt">
			<th>Last name:</th>
			<td><?php echo $last_name; ?></td>
		</tr>
		<tr>
			<th>Company name:</th>
			<td><?php echo $company_name; ?></td>
		</tr>
		<tr class="alt">
			<th>Username:</th>
			<td><?php echo $this->session->userdata('username'); ?></td>
		</tr>
		<tr>
			<th>Email address:</th>
			<td><?php echo $email; ?></td>
		</tr>
		<tr class="alt">
			<th>Phone number:</th>
			<td><?php echo $phone; ?></td>
		</tr>	
	<?php endif; ?>
</table>

<h3>Other Actions</h3>

<p>
	<?php
	echo anchor('account/edit_password', 'Change password');
	
	if($this->session->userdata('netID')) {
		echo "<br>" . anchor('account/delete', 'Delete account');
	}
	?>
</p>