
<?php include_once('includes/headeri.php'); ?>




<?php 
$details = selectFromTable('*', ' notice ', ' is_authority = 0 ' , $db);  ?>


<?php if($details ): ?>
	<table class="table table-responsive">
		<thead>
			<tr>
				<th>to</th> 
				<th>description</th> 
				<th>Action</th> 
			</tr>
		</thead>
		<body>

			<?php foreach ($details as $key => $value): ?>
				<tr>
					<td><?php  if(isit('is_authority', $value) == 0) echo "all"; else echo "authority"; ?></td> 
					<td><?php echo isit('description', $value); ?></td> 


					<td><a class="btn" href="../<?php echo isit('file_path', $value); ?>/<?php echo isit('file_name', $value); ?>" target="_blank">view notice</a></td>

				</tr>
			<?php endforeach; ?>
		</body>
	</table>
<?php endif; ?>




<?php include_once('includes/footeri.php'); ?>