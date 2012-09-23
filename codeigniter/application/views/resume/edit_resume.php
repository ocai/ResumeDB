<h2>Edit Resume</h2>

<?php echo validation_errors();?>

<?php echo form_open(current_url());?>
	<p>Interests (max: 500 characters):</p>
	<textarea rows="2" cols="91" name="interests"><?php echo $interests; ?></textarea>

	<p>Skills (max: 500 characters):</p>
	<textarea rows="2" cols="91" name="skills"><?php echo $skills; ?></textarea>

	<p>Resume (max: 3000 characters):</p>
	<textarea rows="20" cols="91" name="resume"><?php echo $resume; ?></textarea>

	<div class="center">
		<input type="submit" name="submitOK" value="Save Changes" style="height:30px; width:100px;" />
		<input type="submit" name="submitCancel" value="Cancel" style="height:30px; width:100px;" />
	</div>
<?php echo form_close(); ?>