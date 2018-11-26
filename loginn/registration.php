<?php
include_once('../global.php');
include_once('../root/connection.php');
include_once('../root/functions.php');




auth_use();
$db=new Database();

$message = "";


if(isset($_POST['submit'])){

	$admn_no = $_POST['admn_no'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$password = $_POST['psd'];
	$repass = $_POST['repsd'];
	$class = $_POST['class'];
	$email = $_POST['mail'];
    $gender=$_POST['gender'];
	$batch = $_POST['batch'];
	//$batch = $_POST['batch'];
	$hostel_id = $_POST['hostel_id'];

	// print_r($_POST);


	$stmnt="insert into register(admn_no,name,phone,password,class,batch,hostel_id,email,gender) values('$admn_no','$name',$phone,'$password','$class',$batch,'$hostel_id', '$email','$gender')";





	if($db->execute_query($stmnt)){

		$message='success';

	}else{

		$message = 'Failed';  
	}



}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>


	<base href="<?php echo DIRECTORY.'loginn/' ; ?>">
	<title><?php  echo DISPLAY_NAME; ?></title>


	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Registration 
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="admn_no" placeholder="ADMISSION NUMBER">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="name" placeholder="NAME">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
					<input type="radio" name="gender" value="male" checked> Male<br>
  <input type="radio" name="gender" value="female"> Female<br>
  <input type="radio" name="gender" value="other"> Other  
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="phone" placeholder="PHONE NUMBER">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="mail" placeholder="E-mail">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="password" name="psd" placeholder="PASSWORD">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="password" name="repsd" placeholder="RE-ENTER PASSWORD">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<select class="input100" name="class">
							<option value="">SELECT CLASS</option>
							<option value="MCA">MCA</option>
							<option value="B.tech">B.tech</option>
							<option value="B.arch">B.arch</option>
							<option value="M.tech">M.tech</option>
						</select>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<select class="input100" name=batch>
							<option value="volvo">SELECT BATCH</option>
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
						</select>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<select class="input100" name='hostel_id'>
						<?php $details = selectFromTable( '*', 'hostel', "1" , $db); ?>
						<option selected="selected" disabled="disabled">Select Hostel</option>
						<?php foreach ($details as $key => $value): ?>
							<option value="<?php  echo isit( 'hostel_id', $value); ?>"><?php  echo isit( 'name', $value); ?></option>
							<?php endforeach; ?>
							
						</select>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					
						</select>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<?php  if($message != "" ): ?>
						<div class='alert alert-warning'>
							<p><?php echo $message; ?></p>
						</div>
					<?php endif; ?>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name=submit>
							SUBMIT
						</button>
						<BR>
						<BR>
						<BR>

					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name=reset>
							RESET
						</button>
					</div>
					
				</div>
				
				>

			<!-- 		<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div> -->

					<div class="container-login100-form-btn">
						
						
						<div class="dropdown my-login-drop mb-2" style="min-width: 45%;">
							<div class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink">
								<a class="dropdown-item" href="#">S1MCA</a>
								<a class="dropdown-item" href="#">S3MCA</a>
								<a class="dropdown-item" href="#">S4MCA</a>
							</div>
						</div>
						
						
					</div>
					<div class="container-login100-form-btn"> </div>

					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){

			$(document).on('click', '.my-login-drop a.dropdown-item', function(e){
				e.preventDefault();
				$('.my-login-drop .dropdown-head').text($(this).text().trim());
			});


		});
	</script>

</body>
</html>