<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>i-verve infoweb pvt ltd</title>
     <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url();?>assets/dist/img/icon.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/simple-line-icons.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	
   <style>
   ul.tsc_pagination {
    margin: 4px 0;
    padding: 0px;
    height: 100%;
    overflow: hidden;
    font: 12px 'Tahoma';
    list-style-type: none;
}
ul.tsc_pagination li a {
    color: #0A7EC5;
    border-color: #8DC5E6;
    background: #F8FCFF;
}
ul.tsc_pagination li {
    float: left;
    margin: 0px;
    padding: 0px;
    margin-left: 5px;
}
ul.tsc_pagination li a {
    color: black;
    display: block;
    text-decoration: none;
    padding: 7px 10px 7px 10px;
}
</style>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
  
  

    <div class="wrapper">
	<?php $this->load->view('block/admin/header');?>
     <!-- Left side column. contains the logo and sidebar -->
      <?php $this->load->view('block/admin/sidebar');?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       
       <?php echo $content_for_layout; ?>
       </div><!-- /.content-wrapper -->
     <?php $this->load->view('block/admin/footer');?>
     
     <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    
    
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <!--<script src="<?php echo base_url(); ?>assets/plugins/morris/morris.min.js"></script>-->
    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url(); ?>assets/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/bootstrap-datepicker.min.js"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!--<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>-->
    <!--<script src="<?php echo base_url(); ?>assets/plugins/morris/morris.min.js"></script>-->
      <!--<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>-->
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
    <script>
      $(function () {
		  //$.noConflict();
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });	
      });      
	  
	  $(document).ready(function() {
    var max_fields      = 5; //maximum input boxes allowed
    var wrapper         = $("#attribute_wrapper"); //Fields wrapper
    var add_button      = $("#add_att"); //Add button ID
    var wrapper_img         = $("#attribute_wrapper_img"); //Fields wrapper
    var add_button_img      = $("#add_att_img"); //Add button ID
   
   var wrapper_blog         = $("#attribute_wrapper_blog"); //Fields wrapper
    var add_button_blog    = $("#add_att_blog"); //Add button ID
    var wrapper_img_blog         = $("#attribute_wrapper_img_blog"); //Fields wrapper
    var add_button_img_blog      = $("#add_att_img_blog"); //Add button ID
   
    var x = 1; //initlal text box count
    
    
    
    $(add_button_img).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper_img).append('<div class="row"><br><a href="#" class="remove_field_img">Remove</a><div class="col-md-3"><input type="file" placeholder="Attribute Name" name="product_img[]" accept=".jpg," id="" class="form-control"></div></div>'); //add input box
        }
    });
	
	$(add_button_img_blog).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper_img_blog).append('<div class="row"><br><a href="#" class="remove_field_img_blog">Remove</a><div class="col-md-3"><label>Blog Image</label><input type="file" placeholder="Attribute Name" name="blog_img[]" accept=".jpg," id="" class="form-control"><label>Description</label><textarea id="editor1" name="description[]" rows="5" cols="80" ></textarea></div></div>'); //add input box
        }
    });
   
    $(wrapper_img).on("click",".remove_field_img", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
	$(wrapper_img_blog).on("click",".remove_field_img_blog", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
    
});
    </script>
      

    <script src="<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>

	 <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
        
        
      });
      $('#datepicker1').datepicker({
      autoclose: true
    })
      $('#datepicker2').datepicker({
      autoclose: true
    })
    </script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
     
    <!-- Bootstrap 3.3.5 -->
  

    <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
	
      <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.css">


  </body>
</html>
