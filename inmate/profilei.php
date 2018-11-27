
<?php include_once('includes/headeri.php'); ?>
<?php 
if(isset($_POST['subprof'])){


  unset($_POST['subprof']);

  $result=updateTable('register',$_POST , ' reg_id =  ' .$_SESSION[ SYSTEM_NAME.'userid0'] , $db );

  if ($result) {
    $message[0] = 1;
    $message[1] = "success";

  } else {
    $message[0] = 4;
    $message[1] =  "Sorry, there was an error.";
  }






}




$details = selectFromTable( '*',  'register', ' reg_id =  ' . $_SESSION[ SYSTEM_NAME.'userid0']   , $db);
if ( isset( $details[0])){
  $details = $details[0];
} 
?>

<?php  echo show_error($message); ?>

<form action="" method="post">
 <table style="width:100%">
   <tr><td>Register Number</td><td><input type="text" style="
   margin-bottom: 20px;" name="admn_no" readonly required  value="<?php echo isit('admn_no', $details); ?>"></td></tr> 
   <tr><td>Category</td><td><select name="category" style="
   margin-bottom: 20px";>
   <option selected disabled>Select Category</option>
   <option value="General" <?php if (isit('category', $details) == "General") { echo "  selected "; } ?>>General</option>
   <option value="SC"  <?php if (isit('category', $details) == "SC") { echo "  selected "; } ?>>SC</option>
   <option value="ST"  <?php if (isit('category', $details) == "ST") { echo "  selected "; } ?>>ST</option>
   <option value="OEC"  <?php if (isit('category', $details) == "OEC") { echo "  selected "; } ?>>OEC</option>
   <option value="OBC"  <?php if (isit('category', $details) == "OBC") { echo "  selected "; } ?>>OBC</option>
 </select></td></tr>
 <tr><td>Allotment Number</td><td><input type="text" style="
 margin-bottom: 20px;" name="allot_no" required  value="<?php echo isit('allot_no', $details); ?>" style="
 margin-bottom: 20px;" name="uname"></td></tr>
 <br>
 
 <tr><td>Address</td><td><textarea name="address" rows="4" cols="50"><?php echo isit('address', $details); ?></textarea></td></tr> 
 <tr><td>E-mail</td><td><input type="text" style="
 margin-bottom: 20px;" name="email" value="<?php echo isit('email', $details); ?>"></td></tr> 

 <tr><td>Mobile</td><td><input type="number" style="
 margin-bottom: 20px;"name="phone" value="<?php echo isit('phone', $details); ?>"></td></tr> 
     <!-- <tr><td>E-mail</td><td><input type="mail"style="
   margin-bottom: 20px;"name="mail"></td></tr> 
   
   <tr><td>Password</td><td><input type="password" name="psd"></td></tr>
     <tr><td></td><td>
     -->
     <div style="height: 2rem;"></div>
     
   </td></tr>
   <tr><td><button name="subprof" type="submit">Submit</button></td><td><button type="button" class="mt-5">Cancel</button></td></tr>                  
 </table>
</form>





















<?php include_once('includes/footeri.php'); ?>