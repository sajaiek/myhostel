<?php include_once('includes/headeri.php'); ?>
<table style="width:100%">
  <td class=text-center><h5>VIEW MY MESS </h5></td>
</table>







<?php $details = selectFromTable( '*, b.amount AS samount , b.status AS sstatus', '   `mess` m LEFT JOIN bill  b ON m.mess_id = b.mess_id LEFT JOIN register r ON b.reg_id = r.reg_id ', '  r.reg_id = '. $_SESSION[ SYSTEM_NAME.'userid0'] . " ORDER BY m.month, m.year" ,$db); ?>

<?php 


?>
<?php if($details ): ?>
  <table class="table table-responsive">
    <thead>
      <tr>
        <th>Nmae</th>
        <th>Month</th>
        <th>Year</th>
        <th>Amount</th> 
        <th></th>
      </tr>
    </thead>
    <body>

      <?php foreach ($details as $key => $value): ?>
        <tr>
          <td><?php echo isit('name', $value); ?></td>
          <td><?php echo date('F', mktime(0, 0, 0, isit('month', $value), 10)); ?></td>
          <td><?php echo isit('year', $value); ?></td>
          <td><?php echo isit('samount', $value); ?></td>


          <td>
            <?php if( isit('sstatus', $value) == 0 ): ?>  

              <a href="editmess.php?action=0&id=<?php echo isit('bill_id', $value); ?>" class="btn btn-sm btn-waring"  > pay</a>
              <?php else: ?>
                <a href="editmess.php?action=1&id=<?php echo isit('bill_id', $value); ?>" class="btn btn-sm btn-success"  > view</a>
              <?php endif; ?>
            </td> 
          </tr>
        <?php endforeach; ?>
      </body>
    </table>
  <?php endif; ?>







  <?php include_once('includes/footeri.php'); ?>      

