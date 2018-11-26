
        <?php include_once('includes/header.php'); ?>
     
     
<?php 

if(isset($_POST['hostel_id'])){
        if( $_POST['hostel_id'] == 0) {
setLocation($_SERVER["REQUEST_URI"]);
        }

}

$message = array();





if ( isset($_POST['aciveme'])){

        $active = $_POST['aciveme'];

        $regid = $_POST['reg_id'];
        $hostel = $_POST['hostel'];
        

        $query = "UPDATE `register` SET `is_authority` = 0 WHERE `register`.`hostel_id` = '$hostel';";

        $fgfgf= $db->execute_query($query)  ;


        $query = "UPDATE `register` SET `is_authority` = $active WHERE `register`.`reg_id` = '$regid';";

if(  $db->execute_query($query)   ){

        $message[0] = 1;
        $message[1] = "success";

} else {

        $message[0] = 4;
        $message[1] = "error";

}
        

}












if( isset($_GET['id']) &&  isset($_GET['active'])){
        $status = 0;
        if($_GET['active'] == 1)
        $status = 1;


        $query = "UPDATE `register` SET `status` = '$status' WHERE `register`.`admn_no` = ".$_GET['id'].";";

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


<div class="row">
        <div class="col-md-10 offset-md-2">
                <form action="" method="post">
                        select Hostel
                <div class="wrap-input100 validate-input my-4" data-validate = "Enter username">
						<select style="padding:10px; margin:10px 0;" class="form-contorl" name='hostel_id' required onchange="this.form.submit();">
						<?php $details = selectFromTable( '*', 'hostel', "1" , $db); ?>
						<option selected="selected"  value="0">All</option>
                                                <?php foreach ($details as $key => $value): ?>
                                                
                                                <?php  
                                                
                                                $ffgfgfg = "";

                                                if( isset($_POST['hostel_id'])) {
if( $_POST['hostel_id'] == isit( 'hostel_id', $value)){
        
        $ffgfgfg = "  selected ";

}
                                                }
                                                
                                                
                                                ?>


							<option  <?php echo $ffgfgfg; ?> value="<?php  echo isit( 'hostel_id', $value); ?>"><?php  echo isit( 'name', $value); ?></option>
							<?php endforeach; ?>
							
						</select>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
                </form>
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
                 <th>E-mail</th>
                 <th >Action</th>
                 <th >auth</th>
         </tr>
         </tr>
 </tbody>
 <tbody>

     <?php
     
     $query = "SELECT * FROM `register` WHERE admn_no != 10 ";
     if( isset($_POST['hostel_id'])){

        $query = "SELECT * FROM `register` WHERE admn_no != 10  AND hostel_id = " . $_POST['hostel_id'];
}


     $result = $db->display($query);
      
 
     
     ?>


     <?php  if( $result ): ?>
     <?php foreach ($result as $key => $value): ?>
         <tr>
                 <td><?php echo $value['admn_no']; ?></td>
                 <td><?php echo $value['name']; ?></td>
                 <td><?php echo $value['phone']; ?></td>
                 <td><?php echo $value['class']; ?></td>
                 <td><?php echo $value['batch']; ?></td>
                 <td><?php echo $value['email']; ?></td>
                 <td class="d-flex flex-row"> 


                 <?php if( $value['status'] == 1 ) {
?>
<a href="index.php?id=<?php echo $value['admn_no']; ?>&active=0" class="btn btn-warning btn-sm">DEACTIVATE</a>
                 

<?php
                 } else {
?>
<a href="index.php?id=<?php echo $value['admn_no']; ?>&active=1" class="btn btn-info btn-sm">ACTIVATE</a>
                 

<?php

                 } ?>
</td>

<td>

                 <?php if( $value['status'] == 1 ) {if( isset($_POST['hostel_id'])): ?>
                 

                 <form action="" method="post" class="" style="margin: 10px 0;">
                         <input type="hidden" name ="reg_id" value="<?php echo isit('reg_id', $value); ?>">
                         <input type="hidden" name="hostel" value="<?php echo isit('hostel_id', $value); ?>">


                                          <?php if( $value['is_authority'] == 1 ) {
?>
<button class="btn btn-sm btn-danger" name="aciveme" value="0" > remove </button>
<?php
                 } else {
?>
<button class="btn btn-sm btn-success" name="aciveme" value="1" > active </button>

<?php

                 } ?>
                         
                 </form>

                 <?php endif;} ?>
                 
                 </td>
         </tr>
<?php endforeach;?>
<?php endif; ?>


         
 </tbody>
 </table>       
     
     
     

     
     
     
             



              


        <?php include_once('includes/footer.php'); ?>