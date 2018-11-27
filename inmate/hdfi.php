
<?php include_once('includes/headeri.php'); ?>






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

<?php $details = selectFromTable( '*', '  `hdf` m LEFT JOIN hostel h ON m.hostel_id = h.hostel_id ', ' 1  '  ,$db); ?>


<?php if($details ): ?>
  <table class="table table-responsive">
    <thead>
      <tr>
        <th>Nmae</th> 
        <th>Year</th>
        <th>total</th>
        <th>balance</th> 
      </tr>
    </thead>
    <body>

      <?php foreach ($details as $key => $value): ?>
        <tr>
          <td><?php echo isit('name', $value); ?></td> 
          <td><?php echo isit('year', $value); ?></td>
          <td><?php echo isit('total', $value); ?></td>
          <td><?php echo isit('balance', $value); ?></td>



        </tr>
        <tr>







          <td colspan="2">




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
                $deta = selectFromTable('*', 'hdf_bill', 'hdf_id = ' .isit('hdf_id', $value), $db);
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






         </td>
       </tr>
     <?php endforeach; ?>
   </body>
 </table>
<?php endif; ?>








<?php include_once('includes/footeri.php'); ?>


