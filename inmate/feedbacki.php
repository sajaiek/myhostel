
<?php include_once('includes/headeri.php'); ?>

<h3>Feedbacks</h3>

<?php 

if (isset($_POST['upateme'])) {

	$params = array(
		'feedback' => $_POST['feedback'],
		'inmate_id' => 	$_SESSION[ SYSTEM_NAME.'userid0']


	);
	$result = insertInToTable('feedback', $params,   $db);




}


?>




<form accept="" method="post" >
	Feedback
	<textarea  style="width: 100%; height: 100px; " name="feedback" class="form-contorl"></textarea>  
	<button class="btn btn-sm btn-danger" name="upateme" value="1">Add</button>

</form>












<?php include_once('includes/footeri.php'); ?>