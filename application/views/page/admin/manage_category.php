<section class="content-header">
      <h1>
        Manage Category
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>iOFRDYNBzGpVgPFgkwXWeKo/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>        
        <li class="active">Manage Category</li>
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
         <h4 class="msg1"> <button class="pull-right btn btn-sm btn-primary" onclick="window.location.href='<?php echo base_url(); ?>iOFRDYNBzGpVgPFgkwXWeKo/add_category'"><i class="fa fa-plus"></i> Add Category</button><div class="clearfix"></div></h4>
         <div class="clearfix"></div>
         <div class="row">
            <div class="col-sm-12">
				
               <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
				   
                  <thead>
                     <tr role="row">
                        
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 226px;">Category</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 226px;">Status</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 226px;">Icon</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 199px;">Action</th>
                       
                     </tr>
                  </thead>
                  <tbody>
					  <?php 
						foreach($get_category as $data ) { ?>
                     <tr role="row" class="odd">
                        
                        <td><?php echo $data['category_title'] ?></td>
                        
                         <td><?php echo $data['status'] ;?></td> 
                         
						
						 
				<?php   if($data['photo']!='')
						{ ?>
							<td><img src="<?php echo base_url().'category/'.$data['photo'] ;?>" width="100" height="100"></td>   
				  <?php }
						else
						{ ?>
							 <td><img src="<?php echo base_url() ;?>/category/default.jpg" width="100" height="100"/> </td>
				  <?php }?>         
                                                
                        <td>
							<a href="<?php echo base_url();?>iOFRDYNBzGpVgPFgkwXWeKo/edit_category/<?php echo $data['id'] ?>"><i class="fa fa-edit" title="Edit" style="cursor:pointer; margin:0px 10px;" ></i></a>
							<a href="#"><i title="Remove" onclick="category_delete(<?php echo $data['id'] ?>);" style="cursor:pointer; margin:0px 10px;" class="fa fa-trash-o"></i></a>
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

        </section><!-- /.content -->
      
<script type="text/javascript">
	function category_delete(ids)
    {
		var url = '<?php echo base_url();?>iOFRDYNBzGpVgPFgkwXWeKo/category_delete/'+ids;
		  swal({
			  title: "Are you sure want to delete this category?",
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
				swal( "Successfully delete category!", "success");
				window.location.replace(url);
			  } else {
			   //swal("Cancelado", "Su cliente está a salvo! :)", "error");
			  }
			});
	}
      </script>
