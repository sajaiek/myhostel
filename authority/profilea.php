
        <?php include_once('includes/headera.php'); ?>
        <?php 
        if(isset($_POST['subprof'])){

          var_dump($_SESSION);
          $params =array(

            'uname' => $_POST[''] ,
            'psd1' => $_POST[''] ,
            'mob' => $_POST[''] , 
            'mail' => $_POST[''] ,
          );
          $result=insertInToTable('register',$params , $db );


         }
         ?>


<form action="" method="post">
     <table style="width:100%">
     
     <tr><td>Username</td><td><input type="text" style="
    margin-bottom: 20px; name="uname"></td></tr>
     <br>
     <tr><td>Current-Password</td><td><input type="password"style="
    margin-bottom: 20px; name="psd"></td></tr>  
     <tr><td>New-Password</td><td><input type="password" style="
    margin-bottom: 20px; name="psd1"></td></tr> 
     <tr><td>Mobile</td><td><input type="text" style="
    margin-bottom: 20px;name="mob"></td></tr> 
     <tr><td>E-mail</td><td><input type="mail"style="
    margin-bottom: 20px;name="mail"></td></tr> 
   
   <!-- // <tr><td>Password</td><td><input type="password" name="psd"></td></tr>
   //   <tr><td></td><td>
      -->
     <div style="height: 2rem;"></div>
     
     </td></tr>
     <tr><td><button name="subprof" type="submit">Submit</button></td><td><button type="button" class="mt-5">Cancel</button></td></tr>                  
     </table>
     </form>
    
     
     
      
     
     
     
     
     
     
     
     
      
     
             



              


        <?php include_once('includes/footera.php'); ?>