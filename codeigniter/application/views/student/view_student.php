<h2>Viewing Student: <?php echo $first_name . ' ' . $last_name; ?></h2>

<table width="100%">
	<tr class="alt">
		<th>NetID:</th>
		<td><?php echo $netID; ?></td>
	</tr>
	<tr>
		<th>Year entered:</th>
		<td><?php echo $year; ?></td>
	</tr>
	<tr class="alt">
		<th>Major:</th>
		<td><?php echo $major; ?></td>
	</tr>
	<tr>
		<th>Email address:</th>
		<td><?php echo safe_mailto($email, $email); ?></td>
	</tr>
	<tr class="alt">
		<th>Phone number:</th>
		<td><?php echo $phone; ?></td>
	</tr>
</table>


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

<table width="100%">
	<tr>
		<td class="pagination left" style="width: 33%;">
			<?php if($previous_netID != '') {
				echo anchor("student/view/$previous_netID", '&#171; Previous Student');
			}
			?>
		</td>
		<td class="pagination center" style="width: 34%;">
			<?php echo anchor("students/view/$query_id/$sort_by/$sort_order/$offset", 'Back to Table'); ?>
		</td>
		<td class="pagination right" style="width: 33%;">
			<?php if($next_netID != '') {
				echo anchor("student/view/$next_netID", 'Next Student &#187;');
			}
			?>
		</td>
	</tr>
</table>