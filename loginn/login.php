<?php
include_once('root/connection.php');
$db=new Database();
$error='';
session_start();


// if( isset( $_SESSION['userid'] ) ) {
//   if( $_SESSION['type'] == 'admin' ) {
//     header('Location: ' . PATH . '/admin');
//   }         
//   if( $_SESSION['type'] == 'customer' ) {
//     header('Location: ' . PATH . '/customer' );
//   }         
//   exit();
// }

$message = "";


if(isset($_POST['login'])){


 

	$username = $_POST['username'];
	$password = $_POST['password'];
	$type = $_POST['type'];


if( $type  = "ANDMIN" ) {



	$stmnt='select * from admin where username = :username and password = :password';
	$params=array( 
	 ':username'  =>  $username,
	 ':password'  =>  $password
   );
	if($db->display($stmnt,$params)){
	  
	 $_SESSION['userid']=$username;
	 $_SESSION['type']='admin';
	 header('Location:../admin/index.php');
	 exit();
   }else{
	 $message= 'Incorrect username or password';
   }



} else if( $type == "AUTHORITY" ) {


	


	$stmnt='select * from register where email = :username and password = :password';
	$params=array( 
	 ':username'  =>  $username,
	 ':password'  =>  $password
   );
	if($db->display($stmnt,$params)){
	  
	 $_SESSION['userid']=$username;
	 $_SESSION['type']='AUTHORITY';
	//  header('Location: dashbord.php');
	 exit();
   }else{
	 $message= 'Incorrect username or password';
   }





} else if( $type == "INMATE" ) {


	


	$stmnt='select * from register where email = :username and password = :password type="INMATE"';
	$params=array( 
	 ':username'  =>  $username,
	 ':password'  =>  $password
   );
	if($db->display($stmnt,$params)){
	  
	 $_SESSION['userid']=$username;
	 $_SESSION['type']='INMATE';
	//  header('Location: dashbord.php');
	 exit();
   }else{
	 $message= 'Incorrect username or password';
   }





} else {
	$message = " Select a valid user type";
}


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
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
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

			<!-- 		<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div> -->

					<div class="container-login100-form-btn">
						
						
						<div class="dropdown my-login-drop mb-2" style="min-width: 45%;">
  <a class="btn login100-form-btn dropdown-head dropdown-toggle" href="#" role="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   SELECT USER
  </a>


<input type="hidden" name="type" value="select" id="type" >
  <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="#">ADMIN</a>
	  <a class="dropdown-item" href="#">AUTHORITY</a>
    <a class="dropdown-item" href="#">INMATE</a>
  </div>
</div>
						
						
					</div>


<div style="margin: 1rem 0;">


<?php  if($message != "" ): ?>
					<div class='alert alert-warning'>
					<p><?php echo $message; ?></p>
					</div>
<?php endif; ?>



</div>

					<div class="container-login100-form-btn">
						<button type="submit" name="login"  class="login100-form-btn">
							Login
						</button>
					</div>



					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
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

$(document).on('click', '.my-login-drop a.dropdown-item', function(){
	$('.my-login-drop .dropdown-head').text($(this).text().trim());
	$('#type').val($(this).text().trim());
});


		});
	</script>

</body>
</html>