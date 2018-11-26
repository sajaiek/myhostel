<?php

/**
 * @Author: indran
 * @Date:   2018-11-26 13:11:17
 * @Last Modified by:   indran
 * @Last Modified time: 2018-11-26 14:17:06
 */
include_once('includes/header.php'); ?>


<?php

if (isset($_POST['make_delete'])) { 

	$id = isit('id', $_POST, 0 );   

	$istrue = $db->execute_query("  DELETE FROM hostel WHERE hostel_id = " . $id);

	if($istrue){

		$message [0] = 1;
		$message [1] = ' updated ';  

	}  else {

		$message [0] = 4;
		$message [1] = ' update error ';  
	}

}

?>
<?php



?>


<div class="row bg-white mt-3" style="background: white; padding: 3rem;">
	<div class="col-sm-12 col-md-10 offset-md-2">



		<?php  echo show_error($message); ?>


		<?php $details = selectFromTable( '*', 'hostel', "1" , $db); ?>
		<?php  if($details): ?>
			
			<table class="table table-hover "  >
				<thead>
					<tr>
						<th>Name</th>
						<th>Capacity</th>
						<th>Mobile</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($details as $key => $value): ?>

						<?php ?>

						<tr>



							<td><?php  echo isit( 'name', $value); ?></td>
							<td><?php  echo isit( 'capacity', $value); ?></td>
							<td><?php  echo isit( 'phone', $value); ?></td> 

							<td >
								<form accept="" method="post" onsubmit="return confirm('do you really want to continue this process ?');">
									<input type="hidden" name="id" value="<?php echo   isit('hostel_id', $value, 0); ?>"> 
									<button class="btn btn-sm btn-danger" name="make_delete" value="1">delete</button>

								</form>


							</td>
							<td><a href="hosteledit.php?id=<?php  echo isit( 'hostel_id', $value); ?>" class="btn btn-sm btn-success">edit </a></td>




						</tr>


					<?php endforeach; ?>

				</tbody>

			</table>

		<?php endif; ?>
	</div>
</div>









<?php include_once('includes/footer.php'); ?>