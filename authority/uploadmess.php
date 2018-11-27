
<?php include_once('includes/headera.php'); ?>


<?php

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

  if (  $resdf) {

    $message[0] = 3;
    $message[1] = " already exists ";

  } else {

    $result = insertIntoTable( 'mess', $params  , $db, true);
    if ($result) {
      $message[0] = 1;
      $message[1] = "success";


      $eachoo = $_POST['bill'];

      foreach ($eachoo as $key => $valueIn) {
        $paramsD = array(
          'reg_id' => $key,
          'mess_id' => $result,
          'amount' => $valueIn
        );
        $results = insertIntoTable( 'bill', $paramsD  , $db);
      }




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


?>


<form action="" method="post" enctype="multipart/form-data" data-parsley-validate>
  <?php  echo show_error($message); ?>
  <table style="width:100%">
    <td class=text-center><h5>UPLOAD MESS BILL</h5></td>

    <tr><td>Month:</td><td><select name ="month" required>
      <option  selected disabled>SELECT Month</option>
      <option value="1">January</option>
      <option value="2">February</option>
      <option value="3">March</option>
      <option value="4">April</option>
      <option value="5">May</option>
      <option value="6">June</option>
      <option value="7">July</option>
      <option value="8">August</option>
      <option value="9">September</option>
      <option value="10">October</option>
      <option value="11">November</option>
      <option value="12">December</option>
    </select ></td></tr>
    <br>
    <tr><td>Year:</td><td><td>


      <?php   $date = (int) Date('Y'); ?>
      <select  name ="year" required>
       <option value="" disabled selected>SELECT Year</option>
       <option value="<?php echo $date -4;  ?>"><?php echo $date - 4;  ?></option>
       <option value="<?php echo $date -3;  ?>"><?php echo $date - 3;  ?></option>
       <option value="<?php echo $date -2;  ?>"><?php echo $date - 2;  ?></option>
       <option value="<?php echo $date -1;  ?>"><?php echo $date -1;  ?></option>
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
   <!-- <tr><td><button type="submit" name="mess" class="btn ">Upload</button></td><td><button type="clear" class="mt-5">Clear</button></td></tr>                   -->

 </table>



 <table class="table " style="margin-top: 3rem;">
  <thead>
    <?php  $detaaa = selectFromTable('*', 'register', ' hostel_id = "'.$_SESSION[ SYSTEM_NAME.'hostel'].'" ',  $db); ?>
    <?php  foreach($detaaa AS $value ): ?>


      <tr>
        <td><?php  echo isit('name', $value); ?></td>
        <td><?php  echo isit('email', $value); ?></td> 
        <td> 
          <input type="number" required name="bill[<?php  echo isit('reg_id', $value); ?>]">
        </td> 

      </tr>

    <?php endforeach; ?>
  </thead>

</table>



<table class="table">


  <tr><td><button type="submit" name="mess" class="btn ">Upload</button></td><td><button type="clear" class="mt-5">Clear</button></td></tr>                  


</table>
</form>






<?php include_once('includes/footera.php'); ?>