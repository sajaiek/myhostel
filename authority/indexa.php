
        <?php include_once('includes/headera.php'); ?>
     
     
<?php 

$message = array();

if( isset($_GET['id']) &&  isset($_GET['active'])){
        $status = 0;
        if($_GET['active'] == 1)
        $status = 1;


        $query = "UPDATE `register` SET `status` = '$status' WHERE `register`.`reg_no` = ".$_GET['id'].";";

if(  $db->execute_query($query)   ){

        $message[0] = 1;
        $message[1] = "success";

} else {

        $message[0] = 4;
        $message[1] = "error";

}


}


?>


<div class="row">
        <div class="col-12">
        <?php if( ! empty($message) ): ?>

<div class="alert <?php

switch( $message[0]) {

        case 1 :
        echo "alert-success";
        break;
        
        case 4 :
        echo "alert-danger";
        break;
        
}


?>">

<p><?php echo $message[1]; ?></p> 


</div>

<?php endif;?>
        
        
        </div>
</div>



     
 <table class="table table-hover">
 <tbody>
         <tr>
                 <th>Adm_NO</th>
                 <th>Name</th>
                 <th >Phone</th>
                 <th >Class</th>
                 <th >Batch</th>
                 <th >Action</th>
         </tr>
         </tr>
 </tbody>
 <tbody>

     <?php
     
     $query = "SELECT * FROM `register` WHERE reg_no != 10 ";

     $result = $db->display($query);
      
 
     
     ?>


     <?php  if( $result ): ?>
     <?php foreach ($result as $key => $value): ?>
         <tr>
                 <td><?php echo $value['reg_no']; ?></td>
                 <td><?php echo $value['name']; ?></td>
                 <td><?php echo $value['phone']; ?></td>
                 <td><?php echo $value['class']; ?></td>
                 <td><?php echo $value['batch']; ?></td>
                 <td>
                 


                 <?php if( $value['status'] == 1 ) {
?>
<a href="index.php?id=<?php echo $value['reg_no']; ?>&active=0" class="btn btn-warning btn-sm">DEACTIVATE</a>
                 

<?php
                 } else {
?>
<a href="index.php?id=<?php echo $value['reg_no']; ?>&active=1" class="btn btn-info btn-sm">ACTIVATE</a>
                 

<?php

                 } ?>
                 
                 </td>
         </tr>
<?php endforeach;?>
<?php endif; ?>


         
 </tbody>
 </table>
     
     
     

     
     
     
             



              


        <?php include_once('includes/footera.php'); ?>