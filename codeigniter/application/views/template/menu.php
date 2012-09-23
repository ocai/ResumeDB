<ul>
	<?php if($this->session->userdata('is_logged_in')): ?>
		<?php if($this->session->userdata('netID')): ?>
			<li><?php echo anchor('account', 'Home'); ?></li>
			<li><?php echo anchor('resume', 'Submit Resume'); ?></li>	
			<li><?php echo anchor('account/view', 'My Account'); ?></li>
			<li><?php echo anchor('account/logout', 'Log Out'); ?></li>
		<?php else: ?>
			<li><?php echo anchor('account', 'Home'); ?></li>
			<li><?php echo anchor('students', 'View Students'); ?></li>
			<li><?php echo anchor('account/view', 'My Account'); ?></li>
			<li><?php echo anchor('account/logout', 'Log Out'); ?></li>
		<?php endif; ?>
	<?php else: ?>
		<li><?php echo anchor('home/login', 'Log In'); ?></li>
		<li><?php echo anchor('students/register', 'Students'); ?></li>
		<li><?php echo anchor('companies', 'Companies'); ?></li>
	<?php endif; ?>
</ul>