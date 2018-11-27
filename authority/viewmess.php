
<?php include_once('includes/headera.php'); ?>






<!-- 
<table style="width:100%">

 <tr><td><select>
   <option value="">SELECT MONTH</option>
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
 </select></td><td><select>
   <option value="">SELECT YEAR</option>
   <option value="2017">2017</option>
   <option value="2018">2018</option>
   <option value="2019">2019</option>

   </select></td><td><button type="button" style="
   margin-bottom: 20px;
   ">View</button></td></tr>

 </table>
-->

<?php $details = selectFromTable( '*', '  `mess` m LEFT JOIN hostel h ON m.hostel_id = h.hostel_id ', ' 1  '  ,$db); ?>


<?php if($details ): ?>
  <table class="table table-responsive">
    <thead>
      <tr>
        <th>Nmae</th>
        <th>Month</th>
        <th>Year</th>
        <th>file1</th>
        <th>file2</th>
        <th></th>
      </tr>
    </thead>
    <body>

      <?php foreach ($details as $key => $value): ?>
        <tr>
          <td><?php echo isit('name', $value); ?></td>
          <td><?php echo date('F', mktime(0, 0, 0, isit('month', $value), 10)); ?></td>
          <td><?php echo isit('year', $value); ?></td>
          <td><a href="../<?php echo isit('fiile_path', $value); ?>/<?php echo isit('file1_name', $value); ?>" class="btn btn-sm btn-success" target="_blank"> view</a></td>  
          <td><a href="../<?php echo isit('fiile_path', $value); ?>/<?php echo isit('file2_name', $value); ?>" class="btn btn-sm btn-success" target="_blank"> view</a></td>  

          <td>
            <?php if( isit('status', $value) == -1): ?>
              <small><?php echo isit('remark', $value); ?></small>
              <br/>

              <a href="editmess.php?id=<?php echo isit('mess_id', $value); ?>" class="btn btn-sm btn-waring"  > edit</a>
            <?php endif; ?>
          </td> 
        </tr>
      <?php endforeach; ?>
    </body>
  </table>
<?php endif; ?>





<?php include_once('includes/footera.php'); ?>


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