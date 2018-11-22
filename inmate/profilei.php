
        <?php include_once('includes/headeri.php'); ?>
        <?php 
        if(isset($_POST['subprof'])){

          var_dump($_SESSION);



$params =array(
  'name' => $_POST[''] , 
'password' => $_POST[''] , 
'category' => $_POST[''] , 
'address' => $_POST[''] , 
'allot_no' => $_POST[''] , 
'status' => $_POST[''] , 
'date' => $_POST[''] , 
'phone' => $_POST[''] , 
'class' => $_POST[''] , 
'batch' => $_POST[''] , 
'email' => $_POST[''] , 
'hostel_name' => $_POST[''] , 
'gender' => $_POST['gender'] 
);


$result=insertInToTable('register',$params , $db );







        }






        
        ?>
 <form action="" method="post">
     <table style="width:100%">
     <tr><td>Register Number</td><td><input type="text" style="
    margin-bottom: 20px;" name="regnumber" required></td></tr> 
     <tr><td>Category</td><td><select name="category" style="
    margin-bottom: 20px";>
     <option selected disabled>Select Category</option>
  <option value="General">General</option>
  <option value="SC">SC</option>
  <option value="ST">ST</option>
  <option value="OEC">OEC</option>
  <option value="OBC">OBC</option>
</select></td></tr>
<tr><td>Allotment Number</td><td><input type="text" style="
    margin-bottom: 20px;" name="allotmentno"></td></tr> 
     <tr><td>Username</td><td><input type="text" style="
   margin-bottom: 20px;" name="uname"></td></tr>
     <br>
     <tr><td>Password</td><td><input type="text"style="
   margin-bottom: 20px;" name="psd"></td></tr>  
     <tr><td>Re-Password</td><td><input type="repsd" style="
   margin-bottom: 20px;" name="psd1"></td></tr>
     <tr><td>Address</td><td><textarea name="address" rows="4" cols="50"></textarea></td></tr> 
     <tr><td>E-mail</td><td><input type="text" style="
    margin-bottom: 20px;" name="email"></td></tr> 
      
     <tr><td>Mobile</td><td><input type="text" style="
   margin-bottom: 20px;"name="mob"></td></tr> 
     <!-- <tr><td>E-mail</td><td><input type="mail"style="
   margin-bottom: 20px;"name="mail"></td></tr> 
   
   <tr><td>Password</td><td><input type="password" name="psd"></td></tr>
     <tr><td></td><td>
      -->
     <div style="height: 2rem;"></div>
     
     </td></tr>
     <tr><td><button name="subprof" type="submit">Submit</button></td><td><button type="button" class="mt-5">Cancel</button></td></tr>                  
     </table>
    </form>
    
     
     
      
     
     
     
     
     
     
     
     
      
     
             



              


        <?php include_once('includes/footeri.php'); ?>