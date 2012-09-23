<h2>My Resume <?php echo anchor('resume/edit', '[Edit]'); ?></h2>

<?php
if($message != '') {
	echo "<p>$message</p>";
}

if($this->session->flashdata('message')) {
	echo "<p>" . $this->session->flashdata('message') . "</p>";
}
?>

<?php if($interests != '' || $skills != '' || $resume != ''): ?>
	<p>
		Interests:<br>
		<span class="resume"><?php echo nl2br($interests); ?></span>
	</p>

	<p>
		Skills:<br>
		<span class="resume"><?php echo nl2br($skills); ?></span>
	</p>

	<p>
		Resume:<br>
		<span class="resume"><?php echo nl2br($resume); ?></span>
	</p>
<?php endif; ?>