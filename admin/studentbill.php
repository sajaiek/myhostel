
<?php include_once('includes/header.php'); ?>


<?php 

if (isset($_POST['make_reject'])) {



  $action = 0;

  $remark = isit('remark', $_POST, 0 ); 
  $id = isit('id', $_POST, 0 ); 

  $params = array(
    'status' => -1,
    'remark' => $remark
  ); 

  $istrue = updateTable( 'bill', $params, ' bill_id = ' . $id , $db);

  if($istrue){

    $message [0] = 1;
    $message [1] = ' updated ';  

  }  else {

    $message [0] = 4;
    $message [1] = ' update error ';  
  }



}

if (isset($_POST['make_arppove'])) {


  $action = 0;

  $id = isit('id', $_POST, 0 ); 


  $params = array(
    'status' => 1 
  ); 

  $istrue = updateTable( 'bill', $params, ' bill_id = ' . $id , $db);

  if($istrue){

    $message [0] = 1;
    $message [1] = ' updated ';  

  }  else {

    $message [0] = 4;
    $message [1] = ' update error ';  
  }



}

?>




<?php $details = selectFromTable( '*, b.amount AS samount , b.status AS sstatus', '   `mess` m LEFT JOIN bill  b ON m.mess_id = b.mess_id LEFT JOIN register r ON b.reg_id = r.reg_id ', ' b.status = 1  ORDER BY m.month, m.year' ,$db); ?>

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
        <th>action</th>  
      </tr>
    </thead>
    <body>

      <?php foreach ($details as $key => $value): ?>
        <tr>
          <td><?php echo isit('name', $value); ?></td>
          <td><?php echo date('F', mktime(0, 0, 0, isit('month', $value), 10)); ?></td>
          <td><?php echo isit('year', $value); ?></td>
          <td><?php echo isit('samount', $value); ?></td>
          <td><?php echo isit('bill', $value ); ?></td>
          <td> <?php echo  isit('transno', $value ) ; ?></td>





          <td >
            <?php if(   isit('status', $value) == 0 ||  isit('status', $value) == -1 ): ?>

            <form accept="" method="post">
              <input type="hidden" name="id" value="<?php echo   isit('bill_id', $value, 0); ?>">

              <button class="btn btn-sm btn-danger" name="make_arppove" value="1">approve</button> 

            </form>

          <?php endif; ?>
        </td>
        <td>

          <?php  if(   isit('status', $value) == 0 ||  isit('status', $value) == 1 ):  ?>
          <form accept="" method="post">
            <input type="hidden" name="id" value="<?php echo   isit('bill_id', $value, 0); ?>"> 

            <button class="btn btn-sm btn-info showFirst" id="" type="submit" name="make_reject" value="1">reject</button>
            <textarea class="form-contorl showNow" name="remark" ></textarea>

            <button class="btn btn-sm btn-success showNow hiddenFirst" id="" name="make_reject" value="1">reject</button>

          </form>


        <?php endif; ?>


      </td>

    </tr>
  <?php endforeach; ?>
</body>
</table>


<?php endif; ?>




<?php include_once('includes/footer.php'); ?>

<script type="text/javascript">
  $(document).ready(function($) {

    $('.showFirst').css('display', 'block');
    $('.showNow').css('display', 'none');
    $(document).on('click', '.showFirst', function(event) {
      event.preventDefault();
      $(this).closest('form').find('.showNow').css('display', 'block');
      $(this).css('display', 'none');



    });



    
  });
</script>