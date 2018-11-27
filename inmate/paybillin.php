<?php include_once('includes/headeri.php'); ?>

<?php 
if(isset($_POST['pay'])){

  var_dump($_SESSION);



  $params =array(
   'bill' => $_POST[''] ,
   'month' => $_POST[''] ,
   'year' => $_POST[''] ,
   'payment' => $_POST[''] ,
   'amount' => $_POST[''] ,
   'transno' => $_POST[''] ,

 );
  $result=insertInToTable('bill',$params , $db );

}


?>


<form action="" method="post">
 
 <table style="width:100%">
  <td class=text-center><h5>PAY MY MESS </h5></td>
  <tr><td>Bill ID</td><td><input type="text" name="billid" style="
  margin-bottom: 20px;"></td></tr> 
  <tr><td>Month:</td><td><select name="month" style="
  margin-bottom: 20px";>
  <option selected disabled>Select Month</option>
  <option value="January">January</option>
  <option value="February">February</option>
  <option value="March">March</option>
  <option value="April">April</option>
  <option value="May">May</option>
  <option value="June">June</option>
  <option value="July">July</option>
  <option value="August">August</option>
  <option value="September">September</option>
  <option value="October">October</option>
  <option value="November">November</option>
  <option value="December">December</option>
</select ></td></tr>
<br>
<tr><td>Year:</td><td><td><select name="year" style="
margin-bottom: 20px";>
<option selected disabled>Select Year</option>
<option value="2017">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>

</select></td></tr>  
<tr><td>Amount</td><td><input type="text" name="amount"></td></tr>
<tr><td>Payment Type:</td><td><td><select name="payment" style="
margin-bottom: 20px">
<option selected disabled>SELECT Type</option>
<option value="dcard">Debit Card</option>
<option value="UPI">UPI</option>
<option value="Ibank">Internet Banking</option>
<option value="ccard">Credit Card</option>
<option value="counter">Counter </option>
<tr><td>Transaction Number</td><td><input type="text" name="transno"></td></tr>

<tr><td><button name="pay" type="submit">Pay</button></td><td><button type="button" class="mt-5">Clear</button></td></tr>                  
</table>

</form>



<?php include_once('includes/footeri.php'); ?>