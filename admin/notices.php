
<?php include_once('includes/header.php'); ?>


<?php










$hostel_id = $_SESSION[ SYSTEM_NAME.'hostel'];
$fiile_path = 'files/notice'; 
$file = ""; 

if (isset($_POST['hdf'])) {


	$file =  date("DMdYGi") .basename($_FILES["file"]["name"]);

	$target_file = '../' . $fiile_path . '/' . $file ;


	if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) { 

	} else {
		$message[0] = 4;
		$message[1] =  "Sorry, there was an error uploading your file.";
	}


//   'balance' => $_POST['total'] - $_POST['amount'],

	$params = array( 
		'is_authority' => $_POST['is_authority'], 
		'description' => $_POST['description'], 
		'file_path' => $fiile_path, 
		'file_name' =>  $file 
	);


	$result = insertIntoTable( 'notice', $params  , $db);



//  ,



	if ($result) {
		$message[0] = 1;
		$message[1] = "success";





	} else {
		$message[0] = 4;
		$message[1] = " error ";
	}





}





// if (isset($details[0])) {
// 	$details = $details[0];
// }







?>


<form action="" method="post" enctype="multipart/form-data" data-parsley-validate>
	<?php  echo show_error($message); ?>
	<table style="width:100%">
		<tr>
			<td class=text-center><h5>HDF REGISTER ADDITION</h5></td>

		</tr>
		<tr><td>to :</td><td>

			<select  name ="is_authority" required> 
				<option value="0" selected>All</option>
				<option value="1">uthority</option> 

			</select></td>
		</tr>  
		<td>
			description
		</td>
		<td>
			<textarea name="description" class="form-contorl"></textarea>
		</td>
		<tr>
			<td>file</td>
			<td><input type="file" style="
			margin-bottom: 20px;" name="file" id="file" accept="application/pdf,application/vnd.ms-excel" required></td>

		</tr> 



	</table>




	<table class="table">


		<tr><td><button type="submit" name="hdf" class="btn ">Upload</button></td><td><button type="clear" class="mt-5">Clear</button></td></tr>                  


	</table>
</form>




<?php 
$details = selectFromTable('*', ' notice ', '1' , $db);  ?>


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




<?php include_once('includes/footer.php'); ?>