<?php

/**
 * @Author: indran
 * @Date:   2018-11-26 22:17:44
 * @Last Modified by:   indran
 * @Last Modified time: 2018-11-27 00:23:37
 */
include_once('includes/header.php'); ?>


<?php
$id = "";

if (isset($_GET['id'])) { 
	$id = $_GET['id']; 
}else {
	setLocation('admin/viewmess.php');
}





// $hostel_id = $_SESSION[ SYSTEM_NAME.'hostel'];
$fiile_path = 'files/mess'; 
$file1 = "";
$file2 = "";


if (isset($_POST['mess'])) {


	$file1 =  date("DMdYGi") .basename($_FILES["file1"]["name"]);

	$target_file = '../' . $fiile_path . '/' . $file1 ;


	if (move_uploaded_file($_FILES["file1"]["tmp_name"], $target_file)) { 

	} else {
		$message[0] = 4;
		$message[1] =  "Sorry, there was an error uploading your file.";
	}


	$file2 =  date("DMdYGi") .basename($_FILES["file2"]["name"]);

	$target_file = '../' . $fiile_path . '/' . $file2 ;



	$params = array(
		'hostel_id' => $hostel_id,
		'month' => $_POST['month'],
		'year' => $_POST['year'],
		'fiile_path' => $fiile_path,
		'file1_name' => $file1,
		'file2_name' => $file2 
	);

	$resdf = selectFromTable('*', 'mess', "  hostel_id = '$hostel_id' AND month='".$_POST['month']."' AND year = '".$_POST['year']."'   ", $db);

	if (  ! $resdf) {

		$message[0] = 3;
		$message[1] = " already exists ";

	} else {

		$result = updateTable( 'mess', $params , ' mess_id = '. $id , $db);
		if ($result) {
			$message[0] = 1;
			$message[1] = "success";



			if (move_uploaded_file($_FILES["file2"]["tmp_name"], $target_file)) { 

			} else {
				$message[0] = 4;
				$message[1] =  "Sorry, there was an error uploading your file.";
			}




		} else {
			$message[0] = 4;
			$message[1] = " error ";
		}

	}




}




$details = selectFromTable('*', '  `bill` b LEFT JOIN register r ON r.reg_id = b.reg_id ', ' b.mess_id = ' . $id , $db);

// if (isset($details[0])) {
// 	$details = $details[0];
// }


?>



<?php  if($details ):?>
	<table class="table " style="margin-top: 3rem;">
		<thead> 
			<?php  foreach($details AS $value ): ?>


				<tr>
					<td><?php  echo isit('name', $value); ?></td>
					<td><?php  echo isit('email', $value); ?></td> 
					<td> 
						<input type="number" readonly required name="bill[<?php  echo isit('reg_id', $value); ?>]" value="<?php  echo isit('amount', $value); ?>">
					</td> 

				</tr>

			<?php endforeach; ?>
		</thead>

	</table>

<?php endif; ?>





<?php include_once('includes/footer.php'); ?>