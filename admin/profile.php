
        <?php include_once('includes/header.php'); ?>
        <?php 
        if(isset($_POST['subprof'])){

          var_dump($_SESSION);



$params =array(
  'uname' => $_POST[''] ,  
'npsd' => $_POST[''] ,
); 
$result=insertInToTable('admin',$params , $db );
        }
        ?>
<form action="" method="post">
     <table style="width:100%">
     
     <tr><td>Username</td><td><input type="text" name="uname" style="
    margin-bottom: 20px;"></td></tr>
     <br>
     <tr><td>Current Password</td><td><input type="password" name="psd" style="
    margin-bottom: 20px;"></td></tr> 
     <tr><td>New Password</td><td><input type="password" name="npsd" style="
    margin-bottom: 20px;"></td></tr>  
       
     <tr><td><button name="subprof" type="submit" style="
    margin-bottom: 20px;">Submit</button></td><td><td><button type="button" class="mt-5">Cancel</button></td></tr></tr>    
     </table>
     </form>
     
 
     
     
     
      
     
             



              


        <?php include_once('includes/footer.php'); ?>