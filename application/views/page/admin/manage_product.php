<section class="content-header">
      <h1>
        Manage Product
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>iOFRDYNBzGpVgPFgkwXWeKo/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>        
        <li class="active">Manage Product</li>
      </ol>
</section>

<!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
         <div class="box">
	<?php	
	 $this->load->view('page/admin/message');	
	?>	

   <!-- /.box-header -->
   <div class="box-body">
      <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
         <h4 class="msg1">
        <!--  <div class="form-group">
                 
          <select class="form-control custom-control" name="filter" id="filter" onchange="export1(this.value)">
                <option value="All_Product">All Product</option>
                <option value="By_Category">By Category</option>
                <option value="Date">Date</option>
          </select>
        </div>
        <div class="form-group" style="display:none" id="start_date">
          <label for="exampleInputEmail1">Start Date</label>
          <input type="text" class="form-control custom-control pull-right"  id="datepicker1" name="start_date" autocomplete="off" > 
        </div>
        <div class="form-group" style="display:none" id="end_date">
          <label for="exampleInputEmail1" >End Date</label>
          <input type="text" class="form-control custom-control pull-right"  id="datepicker1" name="end_date" autocomplete="off"> 
        </div> -->
  
      <button class="btn btn-sm btn-primary pull-right" onclick="window.location.href='<?php echo base_url(); ?>iOFRDYNBzGpVgPFgkwXWeKo/add_product'"><i class="fa fa-plus"></i> Add Product</button><div class="clearfix"></div></h4>
         <div class="clearfix"></div>
         <div class="row">
            <div class="col-sm-12">
				
               <table id="" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
				   
                  <thead>
                     <tr role="row">
                        
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 226px;">Product Name</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 226px;">Product Price</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 226px;">Image</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 199px;">Action</th>
                       
                     </tr>
                  </thead>
                  <tbody>
					  <?php 
						foreach($get_product as $data ) { ?>
                     <tr role="row" class="odd">
                        
                       
						<td><?php echo $data['product_name'] ;?></td> 
						 <td><?php echo 'Rs: '.$data['product_price'] ;?></td> 
				<?php   if($data['photo']!='')
						{ ?>
							<td><img src="<?php echo base_url().'product/'.$data['photo'] ;?>" width="100" height="100"/></td>   
				  <?php }
						else
						{ ?>
							 <td><img src="<?php echo base_url().'assets/images/img/PDF-Small.jpg' ;?>" width="100" height="100"/> </td>
				  <?php }?>         
                                                
                        <td>
							<a href="<?php echo base_url();?>iOFRDYNBzGpVgPFgkwXWeKo/edit_product/<?php echo $data['id'] ?>"><i class="fa fa-edit" title="Edit" style="cursor:pointer; margin:0px 10px;" ></i></a>
							<a href="#"><i title="Remove" onclick="product_delete(<?php echo $data['id'] ?>);" style="cursor:pointer; margin:0px 10px;" class="fa fa-trash-o"></i></a>
                        </td>
                        
                     </tr>
                    <?php }?>
                  </tbody>
                  <tfoot>
                     <tr>
                        
                     </tr>
                  </tfoot>
               </table>
            </div>
         </div>
         </div>
   </div>
   <!-- /.box-body -->
</div>

<div id="pagination">
                    <ul class="tsc_pagination">
                        
                        <!-- Show pagination links -->
                        <?php foreach ($links as $link) {
                            echo "<li>". $link."</li>";
                         } ?>
                </div>
        </section><!-- /.content -->
      
<script type="text/javascript">
function export1(data){
//alert(data)
  if(data=='Date'){
    ("#start_date").style.css("")
  }
  
  
}
function export2(){
  //alert('dd');
   var selectBox = document.getElementById("filter");
   var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    //alert(selectedValue);
   //alert(selectBox)
  var data='filter='+selectedValue ;
  var url = '<?php echo base_url();?>iOFRDYNBzGpVgPFgkwXWeKo/export/';
  $.ajax({
        url: url,
        data: data,
        type: 'post',
        success: function(data) {
           
        }             
    });
  
}
	function product_delete(ids)
    {
		var url = '<?php echo base_url();?>iOFRDYNBzGpVgPFgkwXWeKo/product_delete/'+ids;
		  swal({
			  title: "Are you sure want to delete this product?",
			  //text: "No podrá recuperar el cliente una vez sea eliminado!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: '#DD6B55',
			  confirmButtonText: 'Yes',
			  cancelButtonText: "No",
			  confirmButtonClass: "btn-danger",
			  closeOnConfirm: false,
			  //closeOnCancel: false
			},
			function(isConfirm) {
			  if (isConfirm) {
				swal( "Successfully delete product!", "success");
				window.location.replace(url);
			  } else {
			   //swal("Cancelado", "Su cliente está a salvo! :)", "error");
			  }
			});
	}
      </script>
