<?php

/**
 * @Author: indran
 * @Date:   2018-11-26 22:17:44
 * @Last Modified by:   indran
 * @Last Modified time: 2018-11-26 22:35:05
 */
include_once('includes/headera.php'); ?>


<?php
$id = "";

if (isset($_GET['id'])) { 
	$id = $_GET['id']; 
}else {
	setLocation('authority/viewmess.php');
}





$hostel_id = $_SESSION[ SYSTEM_NAME.'hostel'];
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




$details = selectFromTable('*', 'mess', ' mess_id = ' . $id , $db);

if (isset($details[0])) {
	$details = $details[0];
}


?>


<form action="" method="post" enctype="multipart/form-data" data-parsley-validate>
	<?php  echo show_error($message); ?>
	<table style="width:100%">
		<td class=text-center><h5>UPLOAD MESS BILL</h5></td> 
		<tr><td>Month:</td><td><select name ="month" required>
			<option  selected disabled>SELECT Month</option>
			<option value="1"   <?php  if( $details['month'] == '1' ) {echo ' selected ';}   ?>>January</option>
			<option value="2"  <?php  if( $details['month'] == '2' ) {echo ' selected ';}   ?>>February</option>
			<option value="3"  <?php  if( $details['month'] == '3' ) {echo ' selected ';}   ?>>March</option>
			<option value="4"  <?php  if( $details['month'] == '4' ) {echo ' selected ';}   ?>>April</option>
			<option value="5"  <?php  if( $details['month'] == '5' ) {echo ' selected ';}   ?>>May</option>
			<option value="6"  <?php  if( $details['month'] == '6' ) {echo ' selected ';}   ?>>June</option>
			<option value="7"  <?php  if( $details['month'] == '7' ) {echo ' selected ';}   ?>>July</option>
			<option value="8"  <?php  if( $details['month'] == '8' ) {echo ' selected ';}   ?>>August</option>
			<option value="9"  <?php  if( $details['month'] == '9' ) {echo ' selected ';}   ?>>September</option>
			<option value="10"  <?php  if( $details['month'] == '10' ) {echo ' selected ';}   ?>>October</option>
			<option value="11"  <?php  if( $details['month'] == '11' ) {echo ' selected ';}   ?>>November</option>
			<option value="12"  <?php  if( $details['month'] == '12' ) {echo ' selected ';}   ?>>December</option>
		</select ></td></tr>
		<br>
		<tr><td>Year:</td><td><td>


			<?php   $date = (int) Date('Y'); ?>
			<select  name ="year" required>
				<option value="" disabled selected>SELECT Year</option>
				<option value="<?php echo $date -4;  ?>"  <?php  if( $details['year'] ==  $date -4) {echo ' selected ';}   ?>><?php echo $date - 4;  ?></option>
				<option value="<?php echo $date -3;  ?>"  <?php  if( $details['year'] ==  $date -3 ) {echo ' selected ';}   ?>><?php echo $date - 3;  ?></option>
				<option value="<?php echo $date -2;  ?>"  <?php  if( $details['year'] ==  $date -2 ) {echo ' selected ';}   ?>><?php echo $date - 2;  ?></option>
				<option value="<?php echo $date -1;  ?>"  <?php  if( $details['year'] ==  $date -1 ) {echo ' selected ';}   ?>><?php echo $date -1;  ?></option>
				<option selected value="<?php echo $date ;  ?>"><?php echo $date ;  ?></option>

			</select></td></tr>  
			<tr><td>Mess Bill Calculation:</td><td><input type="file" style="
			margin-bottom: 20px;" name="file1" id="file1" accept="application/pdf,application/vnd.ms-excel" required></td></td></tr> 
			<tr><td>Mess Bill:</td><td><input type="file" style="
			margin-bottom: 20px;"name="file2" accept="application/pdf,application/vnd.ms-excel" required></td></tr> 
     <!-- <tr><td>E-mail</td><td><input type="mail"style="
    margin-bottom: 20px;name="mail"></td></tr> 
   
   <tr><td>Password</td><td><input type="password" name="psd"></td></tr>
     <tr><td></td><td>
     
     <div style="height: 2rem;"></div>
     
 </td></tr> -->
 <tr><td><button type="submit" name="mess" class="btn ">Upload</button></td><td><button type="clear" class="mt-5">Clear</button></td></tr>                  
</form>
</table>











<?php include_once('includes/footera.php'); ?>