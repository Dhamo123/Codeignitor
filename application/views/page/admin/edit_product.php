<section class="content-header">
      <h1>
        Edit Category
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>iOFRDYNBzGpVgPFgkwXWeKo/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>iOFRDYNBzGpVgPFgkwXWeKo/manage_product"><i class="fa fa-dashboard"></i> Manage Product</a></li>        
        <li class="active">Edit Product</li>
        
      </ol>
</section>
 
 
<div class="box box-primary">
<div class="box-header with-border">
  <?php	
	 $this->load->view('page/admin/message');	
	?>	
</div><!-- /.box-header -->
<!-- form start -->
<form role="form" method="post" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>iOFRDYNBzGpVgPFgkwXWeKo/edit_product/<?php echo $data->id ?>">
  <div class="box-body">
	  <div class="form-group">
                  <label for="exampleInputEmail1">Category*</label>
				<select class="form-control custom-control" name="category" required>
				<option value="">Category</option>
				<?php
				foreach($get_category as $key => $val)
				{
				?>
				<option value="<?php echo $val['id']?>" <?php if($data->category==$val['id']){?> selected <?php }?>>
				<?php echo $val['category_title']?></option>
				<?php }?>
				</select>
    </div>
	<div class="form-group">
	  <label for="exampleInputEmail1">Product Name*</label>
	  <input type="text" class="form-control" value="<?php echo $data->product_name ?>" required name="product_name" placeholder="Product Name" required> 
	  <input type="hidden" value="<?php echo $data->product_name ?>" name="old_title">
	</div>
	<div class="form-group">
	<label for="exampleInputEmail1">Description</label>
	<textarea id="editor1" name="description" rows="10" cols="80" style="visibility: hidden; display: none;">	
			<?php echo $data->description ?>		
		</textarea>
	</div>
	<div class="form-group">
	  <label for="exampleInputEmail1">Product Image</label>
	  <input type="file" class="form-control custom-control"  id="photo" name="photo"  >
	  <input type="hidden" value="<?php echo $data->photo ?>" name="cover_image_hidden">
	  <div>
		<img style="height:160px;width:160px;" src="<?php echo base_url()."product/".$data->photo ?>">          
	</div>	  
	</div>
	<div class="form-group">
	  <label for="exampleInputEmail1">Start Date</label>
	  <?php 
	  if($data->start_date!='' && !empty($data->start_date)){
				$start_date=date('m-d-Y', strtotime( $data->start_date));
		}else{
			$start_date="";
		}
		if($data->end_date!='' && !empty($data->end_date)){
			$end_date=date('m-d-Y', strtotime( $data->end_date));
		}else{
			$end_date="";
		}
	  ?>
	  <input type="text" class="form-control custom-control pull-right" value="<?php echo $start_date ?>" id="datepicker1" name="start_date"> 
	</div>
	<div class="form-group">
	  <label for="exampleInputEmail1">End Date</label>
	  <input type="text" class="form-control custom-control" id="datepicker2" value="<?php echo $end_date ?>"  name="end_date"> 
	</div>
	<div class="form-group">
	  <label for="exampleInputEmail1">Product Price</label>
	  <input type="text" class="form-control custom-control"  name="product_price" value="<?php echo $data->product_price ?>"  placeholder="Product Price" > 
	</div>
	<div class="form-group">
	  <label for="exampleInputEmail1">Selling Price</label>
	  <input type="text" class="form-control custom-control"  name="selling_price" value="<?php echo $data->selling_price ?>"  placeholder="Selling Price" > 
	</div>
	
	<div class="form-group">
	  <label for="exampleInputEmail1">Discount Price</label>
	  <input type="text" class="form-control custom-control"  name="discount_price" value="<?php echo $data->discount_price ?>"  placeholder="Discount Price" > 
	</div>
	
	
	
	<div class="form-group">
	  <label for="exampleInputEmail1">Status</label>
	  <select class="form-control custom-control" name="status" >
	  <option value="Yes" <?php if($data->available=='Yes'){?> selected <?php }?>>Yes</option>
	  <option value="No" <?php if($data->available=='No'){?> selected <?php }?>>No</option>
	  
	  </select>
	</div>
<!-- /.box-body -->		
	
	
	
	</div>
  <div class="box-footer">
	<button type="submit" class="btn btn-default">Submit</button> 
  </div>
  </div>
</form>


</div><!-- /.box -->
<script type="text/javascript">
	function pro_img_delete(img_id)
    {
				  swal({
			  title: "Are you sure want to delete this image?",
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
				  var url="<?php echo base_url();?>iOFRDYNBzGpVgPFgkwXWeKo/delete_pro_img/"+img_id ;
			$.ajax({
					type: 'POST',
					url: url,
					data: { ids: img_id },
					success:function(data)
					{
						$("#img_id"+img_id).html('');
					}
			});
				//swal( "Successfully delete image!", "success");
				window.location.replace("<?php echo base_url();?>index.php/iOFRDYNBzGpVgPFgkwXWeKo/edit_product/<?php echo $data->id ?>");
			  } else {
			   //swal("Cancelado", "Su cliente está a salvo! :)", "error");
			  }
			});
		
	}
	
</script>