
<?php include_once('includes/header.php'); ?>

<h3>Feedbacks</h3>

<?php 

if (isset($_POST['upateme'])) {
	$id = $_POST['id'];
	unset($_POST['upateme']);
	unset($_POST['id']);

	$result = updateTable('feedback', $_POST, '  feedback_id =  ' . $id , $db);




}


?>

<?php 
$details = selectFromTable('*', ' feedback ', '1' , $db);  ?>


<?php if($details ): ?>
	<table class="table table-responsive">
		<thead>
			<tr>
				<th>feedback</th> 
				<th>repaly</th>  
			</tr>
		</thead>
		<body>

			<?php foreach ($details as $key => $value): ?>
				<tr> 
					<td><?php echo isit('feedback', $value); ?></td> 


					<td>



						<form accept="" method="post" onsubmit="return confirm('do you really want to continue this process ?');">
							<textarea name="reply" class="form-contorl"><?php echo isit('reply', $value); ?></textarea>
							<input type="hidden" name="id" value="<?php echo   isit('feedback_id', $value, 0); ?>"> 
							<button class="btn btn-sm btn-danger" name="upateme" value="1">update</button>

						</form>




					</td>

				</tr>
			<?php endforeach; ?>
		</body>
	</table>
<?php endif; ?>













<?php include_once('includes/footer.php'); ?>