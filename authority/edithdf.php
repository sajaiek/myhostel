<?php

/**
 * @Author: indran
 * @Date:   2018-11-26 22:17:44
 * @Last Modified by:   indran
 * @Last Modified time: 2018-11-27 06:34:18
 */
include_once('includes/headera.php'); ?>


<?php
$id = "";

if (isset($_GET['id'])) { 
  $id = $_GET['id']; 
}else {
  setLocation('authority/viewhdf.php');
}





$hostel_id = $_SESSION[ SYSTEM_NAME.'hostel'];
$fiile_path = 'files/hdf'; 
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
    'hdf_id' => $id, 
    'bill_no' => $_POST['bill_no'], 
    'items' => $_POST['items'], 
    'file_path' => $fiile_path, 
    'file_name' =>  $file , 
    'amount' => $_POST['amount']
  );

  $resdf = selectFromTable('*', 'hdf', "  hostel_id = '$hostel_id'  AND year = '".$_POST['year']."'   ", $db);

  if (  ! $resdf) {

    $message[0] = 3;
    $message[1] = " can't find ";

  } else {

    $result = insertIntoTable( 'hdf_bill', $params  , $db);



//  ,

    $params = array(
      'balance' => $_POST['total'] - $_POST['amount']
    );

    $result = updateTable( 'hdf', $params , ' hdf_id = ' . $id , $db);


    if ($result) {
      $message[0] = 1;
      $message[1] = "success";





    } else {
      $message[0] = 4;
      $message[1] = " error ";
    }

  }




}




$details = selectFromTable('*', 'hdf', ' hdf_id = ' . $id , $db);

if (isset($details[0])) {
  $details = $details[0];
}


?>


<form action="" method="post" enctype="multipart/form-data" data-parsley-validate>
  <?php  echo show_error($message); ?>

  <input type="hidden" name="total" value="<?php echo $details['total']; ?>">
  <input type="hidden" name="year" value="<?php echo $details['year']; ?>">
  <table style="width:100%">
    <td class=text-center><h5>UPLOAD HDF BILL</h5></td> 

    <tr><td>Year:</td><td>
      <p><?php echo $details['year']; ?></p></tr>  
      <tr><td>Total:</td><td>
        <p><?php echo $details['total']; ?></p></tr>  
        <tr><td>balance:</td><td>
          <p><?php echo $details['balance']; ?></p></tr>  

     <!-- <tr><td>E-mail</td><td><input type="mail"style="
    margin-bottom: 20px;name="mail"></td></tr> 
   
   <tr><td>Password</td><td><input type="password" name="psd"></td></tr>
     <tr><td></td><td>
     
     <div style="height: 2rem;"></div>
     
   </td></tr> -->

 </table>

 <center>

   <table>



     <tr>
      <td>bill no</td>
      <td><input type="text" name="bill_no" required></td>
    </tr>

    <tr><td><br/></td></tr>
    <tr>
      <td>  amount</td>
      <td><input type="number" name="amount" required></td>
    </tr>
    <tr><td><br/></td></tr>

    <tr>
      <td>items</td>
      <td><textarea type="text" name="items" required></textarea></td>
    </tr>
    <tr><td><br/></td></tr>

    <tr>
      <td> Bill :</td>
      <td><input type="file" style="
      margin-bottom: 20px;" name="file" id="file" accept="application/pdf,application/vnd.ms-excel" required></td>

    </tr> 




  </table>



  <table>

    <tr><td><button type="submit" name="hdf" class="btn ">Upload</button></td><td> </td></tr>                  


  </table>

</center>




<center style="margin-top: 1rem;">
  <h4>View bills</h4>
  <table class="table">

    <thead>
      <tr>
        <th>bill no</th>
        <th>amount</th>
        <th>items</th>
        <th>Bill</th> 
      </tr>
    </thead>
    <?php
    $deta = selectFromTable('*', 'hdf_bill', 'hdf_id = ' .$id, $db);
    ?>
    <tbody>

      <?php foreach($deta AS $value): ?>


        <tr> 
          <td><?php echo $value['bill_no']; ?></td>
          <td><?php echo $value['amount']; ?></td>
          <td><?php echo $value['items']; ?></td>
          <td>
           <td><a href="../<?php echo isit('file_path', $value); ?>/<?php echo isit('file_name', $value); ?>" class="btn btn-sm btn-success" target="_blank"> view</a></td> 
         </td>

       </tr> 



     <?php endforeach; ?>


   </tbody>


 </table>

</center>







</form>






<?php include_once('includes/footera.php'); ?>