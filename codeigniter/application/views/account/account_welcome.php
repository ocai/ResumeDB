<h2>Welcome to ResumeDB, <?php echo $name;?></h2>

<?php
if($this->session->flashdata('message')) {
	echo "<p>" . $this->session->flashdata('message') . "</p>";
}
?>

<h3>Get started</h3>
<p>Some instructions here.</p>