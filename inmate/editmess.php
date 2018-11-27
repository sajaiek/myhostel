<?php include_once('includes/headeri.php'); 




$id = "";

if (isset($_GET['id'])) { 
	$id = $_GET['id']; 
}else {
	setLocation('authority/viewbillin.php');
}

$action = "";

if (isset($_GET['action'])) { 
	$action = $_GET['action']; 
}else {
	setLocation('authority/viewbillin.php');
}



if (isset($_POST['update'])) {




	unset($_POST['update']);



	$result = updateTable( 'bill', $_POST , '  bill_id = '. $id . ' AND  reg_id = '. $_SESSION[ SYSTEM_NAME.'userid0'] , $db);
	if ($result) {
		$message[0] = 1;
		$message[1] = "success";



	} else {
		$message[0] = 4;
		$message[1] = " error ";
	}

}

$details = selectFromTable( '*, b.amount AS samount , b.status AS sstatus', '   `mess` m LEFT JOIN bill  b ON m.mess_id = b.mess_id LEFT JOIN register r ON b.reg_id = r.reg_id ', '  b.bill_id = '. $id . " ORDER BY m.month, m.year" ,$db); 


if ($details[0]['sstatus'] == 0) {
	# code...

	?>
	<table style="width:100%">
		<td class=text-center><h5>PAY MY MESS </h5></td>
	</table>




	<?php  echo show_error($message); ?>



	<?php $details = selectFromTable( '*, b.amount AS samount , b.status AS sstatus', '   `mess` m LEFT JOIN bill  b ON m.mess_id = b.mess_id LEFT JOIN register r ON b.reg_id = r.reg_id ', '  b.bill_id = '. $id . " ORDER BY m.month, m.year" ,$db); ?>

	<?php 


	?>
	<?php if($details ): ?>
		<table class="table table-border">
			<thead>
				<tr>
					<th>Nmae</th>
					<th>Month</th>
					<th>Year</th>
					<th>Amount</th>  
				</tr>
			</thead>
			<body>

				<?php foreach ($details as $key => $value): ?>
					<tr>
						<td><?php echo isit('name', $value); ?></td>
						<td><?php echo date('F', mktime(0, 0, 0, isit('month', $value), 10)); ?></td>
						<td><?php echo isit('year', $value); ?></td>
						<td><?php echo isit('samount', $value); ?></td>


					</tr>
				<?php endforeach; ?>
			</body>
		</table>


		<form method="post" action="">
			<input type="hidden" name="status" value="1">


			<center>
				<table>
					<tr>
						<td>pay type</td>
						<td><select name="paytype" style="
						margin-bottom: 20px" required>
						<option selected disabled>SELECT Type</option>
						<option value="dcard"  <?php  if( isit('dcard', $value )  == ""){ echo 'selected';}  ?> >Debit Card</option>
						<option value="UPI"  <?php  if( isit('UPI', $value )  == ""){ echo 'selected';}  ?> >UPI</option>
						<option value="Ibank"  <?php  if( isit('Ibank', $value )  == ""){ echo 'selected';}  ?> >Internet Banking</option>
						<option value="ccard"  <?php  if( isit('ccard', $value )  == ""){ echo 'selected';}  ?> >Credit Card</option>
						<option value="counter"  <?php  if( isit('counter', $value )  == ""){ echo 'selected';}  ?> >Counter </option>
					</select>
				</td>
			</tr>


			<tr><td>Transaction Number</td><td><input type="text" name="transno" required  value="<?php echo isit('transno', $value ); ?>"></td></tr>


		</table>

		<button class="btn btn-success"  name="update" style="margin-top: 3rem;">pay</button>
	</center>


</form>
<?php endif; ?>




<?php
} else {


	?>




	<table style="width:100%">
		<td class=text-center><h5>PAY MY MESS </h5></td>
	</table>




	<?php  echo show_error($message); ?>



	<?php $details = selectFromTable( '*, b.amount AS samount , b.status AS sstatus', '   `mess` m LEFT JOIN bill  b ON m.mess_id = b.mess_id LEFT JOIN register r ON b.reg_id = r.reg_id ', '  b.bill_id = '. $id . " ORDER BY m.month, m.year" ,$db); ?>

	<?php 


	?>
	<?php if($details ): ?>
		<table class="table table-border">
			<thead>
				<tr>
					<th>Nmae</th>
					<th>Month</th>
					<th>Year</th>
					<th>Amount</th>  
					<th>pay type</th>  
					<th>Transaction Number</th>  
				</tr>
			</thead>
			<body>

				<?php foreach ($details as $key => $value): ?>
					<tr>
						<td><?php echo isit('name', $value); ?></td>
						<td><?php echo date('F', mktime(0, 0, 0, isit('month', $value), 10)); ?></td>
						<td><?php echo isit('year', $value); ?></td>
						<td><?php echo isit('samount', $value); ?></td>
						<td><?php echo isit('paytype', $value ); ?></td>
						<td> <?php echo  isit('transno', $value ) ; ?></td>


					</tr>
				<?php endforeach; ?>
			</body>
		</table>

		

	</form>


<?php endif; ?>



<?php

}



?>


<?php include_once('includes/footeri.php'); ?>      

