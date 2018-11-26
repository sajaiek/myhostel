<?php

/**
 * @Author: indran
 * @Date:   2018-11-26 14:03:52
 * @Last Modified by:   indran
 * @Last Modified time: 2018-11-26 14:10:33
 */

include_once('includes/header.php'); ?>

<?php

$id = 0;

if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	setLocation('hostelview.php');
}




if (isset($_POST['add'])) {

	unset($_POST['add']); 

	$exist = selectFromTable( '*', 'hostel', " name = '" . $_POST['name'] . "' " ,$db);
	if (	$exist) {


		$result = updateTable( 'hostel', $_POST , " hostel_id =  " . $id , $db);

		if ($result) {
			$message[0] = 1;
			$message[1] = " success ";
		} else {
			$message[0] = 4;
			$message[1] = " error ";

		}

	}else {


		$message[0] = 3;
		$message[1] = " can not find ";

	}
	



}



?>




<?php $details = selectFromTable( '*', 'hostel', " hostel_id = " .  $id  , $db); 


if (isset($details[0])) {
	$details = $details[0];
} 
?>
<div class="row bg-white mt-3">
	<div class="col-sm-12 col-md-8 offset-md-2">



		<?php  echo show_error($message); ?>
		<form class="form" action="" method="post" data-parsley-validate>



			<div class="form-group row">
				<label class="form-label col-md-3 text-capitalize"> Name </label>
				<div class="col-md-9">
					<input type="text" required name="name" class="form-control" value="<?php echo isit( 'name' , $details); ?>">
				</div> 
			</div>



			<div class="form-group row">
				<label class="form-label col-md-3 text-capitalize"> capacity </label>
				<div class="col-md-9">
					<input type="number" required name="capacity" class="form-control" value="<?php echo isit( 'capacity' , $details); ?>">
				</div> 
			</div>



			<div class="form-group row">
				<label class="form-label col-md-3 text-capitalize"> phone </label>
				<div class="col-md-9">
					<input type="number" minlength="10" maxlength="10" required name="phone" class="form-control" value="<?php echo isit( 'phone' , $details); ?>">
				</div> 
			</div>



			<div class="form-group row">
				<label class="form-label col-md-3">  </label>
				<div class="col-md-9">
					<button name="add" class="btn btn-sm btn-success">update</button>
				</div> 
			</div>





		</form>
	</div>
</div>









<?php include_once('includes/footer.php'); ?>