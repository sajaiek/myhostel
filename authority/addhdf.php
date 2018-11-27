
<?php include_once('includes/headera.php'); ?>


<?php

$hostel_id = $_SESSION[ SYSTEM_NAME.'hostel'];


if (isset($_POST['hdf'])) { 
  $params = array(
    'hostel_id' => $hostel_id, 
    'year' => $_POST['year'] ,
    'total' => $_POST['total'] ,
    'balance' => $_POST['total'] 
  );

  $resdf = selectFromTable('*', 'hdf', "  hostel_id = '$hostel_id' AND year = '".$_POST['year']."'   ", $db);

  if (  $resdf) {

    $message[0] = 3;
    $message[1] = " already exists ";

  } else {

    $result = insertIntoTable( 'hdf', $params  , $db, true);
    if ($result) {
      $message[0] = 1;
      $message[1] = "success"; 


    } else {
      $message[0] = 4;
      $message[1] = " error ";
    }


  }


}


?>


<form action="" method="post" enctype="multipart/form-data" data-parsley-validate>
  <?php  echo show_error($message); ?>
  <table style="width:100%">
   <tr>
    <td class=text-center><h5>HDF REGISTER ADDITION</h5></td>

  </tr>
  <tr><td>Year:</td><td>


    <?php   $date = (int) Date('Y'); ?>
    <select  name ="year" required>
     <option value="" disabled selected>SELECT Year</option>
     <option value="<?php echo $date -4;  ?>"><?php echo $date - 4;  ?></option>
     <option value="<?php echo $date -3;  ?>"><?php echo $date - 3;  ?></option>
     <option value="<?php echo $date -2;  ?>"><?php echo $date - 2;  ?></option>
     <option value="<?php echo $date -1;  ?>"><?php echo $date -1;  ?></option>
     <option selected value="<?php echo $date ;  ?>"><?php echo $date ;  ?></option>

   </select></td></tr>  

   <tr><td>total</td><td><input type="number" s name="total" id="total"  required></td></tr> 



 </table>




 <table class="table">


  <tr><td><button type="submit" name="hdf" class="btn ">Upload</button></td><td><button type="clear" class="mt-5">Clear</button></td></tr>                  


</table>
</form>






<?php include_once('includes/footera.php'); ?>