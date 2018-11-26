<?php

/**
 * @Author: indran
 * @Date:   2018-11-26 13:11:27
 * @Last Modified by:   indran
 * @Last Modified time: 2018-11-26 13:49:49
 */
include_once('includes/header.php'); ?>

<?php


if (isset($_POST['add'])) {

	unset($_POST['add']); 

	$exist = selectFromTable( '*', 'hostel', " name = '" . $_POST['name'] . "' " ,$db);
	if (	$exist) {


		$message[0] = 3;
		$message[1] = " already exists ";


	}else {
		$result = insertIntoTable( 'hostel', $_POST  , $db);

		if ($result) {
			$message[0] = 1;
			$message[1] = " success ";
		} else {
			$message[0] = 4;
			$message[1] = " error ";

		}
	}
	



}



?>


<div class="row bg-white mt-3">
	<div class="col-sm-12 col-md-8 offset-md-2">



		<?php  echo show_error($message); ?>
		<form class="form" action="" method="post" data-parsley-validate>



			<div class="form-group row">
				<label class="form-label col-md-3 text-capitalize"> Name </label>
				<div class="col-md-9">
					<input type="text" required name="name" class="form-control">
				</div> 
			</div>



			<div class="form-group row">
				<label class="form-label col-md-3 text-capitalize"> capacity </label>
				<div class="col-md-9">
					<input type="number" required name="capacity" class="form-control">
				</div> 
			</div>



			<div class="form-group row">
				<label class="form-label col-md-3 text-capitalize"> phone </label>
				<div class="col-md-9">
					<input type="number" minlength="10" maxlength="10" required name="phone" class="form-control">
				</div> 
			</div>



			<div class="form-group row">
				<label class="form-label col-md-3">  </label>
				<div class="col-md-9">
					<button name="add" class="btn btn-sm btn-success">add</button>
				</div> 
			</div>





		</form>
	</div>
</div>









<?php include_once('includes/footer.php'); ?>