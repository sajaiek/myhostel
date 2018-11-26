 


</div>
</div>


<footer class="footer">
  <div class="container-fluid">
    <nav class="pull-left">
      <ul>
        <li>
          <a href="#">
            Home
          </a>
        </li>
        <li>
          <a href="#">
            Company
          </a>
        </li>
        <li>
          <a href="#">
            Portfolio
          </a>
        </li>
        <li>
          <a href="#">
           Blog
         </a>
       </li>
     </ul>
   </nav>
   <p class="copyright pull-right">
    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://localhost/mini_project">Creative Tim</a>, made with love for a better web
  </p>
</div>
</footer>

</div>
</div>


</body>

<!--   Core JS Files   -->
<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
<!-- <script src="../assets/js/jquery-ui.js" type="text/javascript"></script> -->

<script src="../assets/js/propper.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<!-- <script src="../assets/js/chartist.min.js"></script> -->

<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->




<script src="../assets/js/moment.min.js"></script>   

<script src="../assets/js/datatables.min.js"></script>  
<script src="../assets/js/bootstrap-datetimepicker.min.js"></script>  

<script src="../assets/js/parsley.min.js"></script>
<script src="../assets/js/select2.full.min.js"></script>


<script src="../assets/js/lobibox.min.js"></script>  
<script src="../assets/js/jquery.timeago.min.js"></script>  




<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>


<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

<script type="text/javascript">
 $(document).ready(function(){

   demo.initChartist();

   $.notify({
     icon: 'pe-7s-gift',
     message: "Welcome  <b>SAJAI</b> -"

   },{
    type: 'info',
    timer: 4000
  });


   $('.select2').select2();
   $('.dataTable').DataTable();
   $("time.timeago").timeago(); 

   $("[data-parsley-validate]").parsley({
    errorClass: 'has-danger',
    successClass: 'has-success',
    classHandler: function(ParsleyField) {
      return ParsleyField.$element.parents('.form-group');
    },
    errorsContainer: function(ParsleyField) {
      return ParsleyField.$element.parents('.form-group');
    },
    errorsWrapper: '<span class="invalid-feedback d-block">',
    errorTemplate: '<div></div>',
    trigger: 'change'
  });

 });
</script>

</html>
