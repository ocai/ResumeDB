<h2>View Students</h2>

<?php echo form_open('students/search'); ?>
	<table width="100%">
		<tr>
			<td style="width: 8%;">Filter:</td>
			<td colspan="2">
				<input type="text" name="filter_input" placeholder="Type + Enter to Filter" value="<?php echo $this->input->get('filter_input'); ?>" />
				
				<?php
					$filter_options = array(
						'year'  => 'Year entered',
						'major' => 'Major'
					);
						
					echo form_dropdown('filter_type', $filter_options, $this->input->get('filter_type'), 'style="width: 105px;"');
				?>
			</td>
		</tr>
		<tr>
			<td>Search:</td>
			<td>
				<input type="text" name="search_input" placeholder="Type + Enter to Search" value="<?php echo $this->input->get('search_input'); ?>" />
				
				<?php
					$search_options = array(
						'interests' => 'Interests',
						'skills' 	=> 'Skills',
						'resume' 	=> 'Resume'
					);
						
					echo form_dropdown('search_type', $search_options, $this->input->get('search_type'), 'style="width: 105px;"');
				?>
				
				<input type="submit" value="Update Table" />
			</td>
			<td class="right">
				Found <?php echo $num_students; ?> student(s)
			</td>
		</tr>
	</table>
<?php echo form_close(); ?>

<table class="table_students">
	<tr>
		<th>#</th>
		
		<?php foreach($fields as $field_name => $field_display): ?>
			<th <?php if($sort_by == $field_name) echo "class=\"sort_$sort_order\""; ?>>
				<?php echo anchor("students/view/$query_id/$field_name/" . (($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc') . (($offset == 0) ? '' : '/' . $offset), $field_display, "title=\"Sort by $field_display\""); ?>
			</th>
		<?php endforeach; ?>
	</tr>
	
	<?php 
	$counter = 0;
	foreach($students as $student):
	?>
		<tr <?php if($counter % 2 == 0) echo 'class="alt"'; ?>>
			<td><?php echo $counter + $offset + 1; ?></td>
			
			<?php foreach($fields as $field_name => $field_display): ?>
				<td>
					<?php
					if($field_name == 'netID') {
						echo anchor("student/view/$student->netID", $student->netID);
					} else {
						echo $student->$field_name; 
					}
					?>
				</td>
			<?php endforeach; ?>
		</tr>
	<?php
	$counter++;
	endforeach;
	?>
</table>

<?php if($pagination != ''): ?>
	<p class="pagination right">
		Pages: <?php echo $pagination; ?>
	</p>
<?php endif; ?>