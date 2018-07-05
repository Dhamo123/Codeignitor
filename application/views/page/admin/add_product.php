<section class="content-header">
      <h1>
        Add Product
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>iOFRDYNBzGpVgPFgkwXWeKo/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>iOFRDYNBzGpVgPFgkwXWeKo/manage_product"><i class="fa fa-dashboard"></i> Manage Product</a></li>        
        <li class="active">Add Product</li>
        
      </ol>
</section>
 
 
<div class="box box-primary">
<div class="box-header with-border">
  <?php	
	 $this->load->view('page/admin/message');	
	?>	
</div><!-- /.box-header -->
<!-- form start -->
<form role="form" method="post" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>iOFRDYNBzGpVgPFgkwXWeKo/add_product">
  <div class="box-body">
	  <div class="form-group">
                  <label for="exampleInputEmail1">Category*</label>
				<select class="form-control custom-control" name="category" required>
				<option value="">Category</option>
				<?php
				foreach($get_category as $key => $val)
				{
				?>
				  <option value="<?php echo $val['id']?>"><?php echo $val['category_title']?></option>
				<?php }?>
				</select>
    </div>
	<div class="form-group">
	  <label for="exampleInputEmail1">Product Name*</label>
	  <input type="text" class="form-control" id="category_title" name="product_name" placeholder="Product Name" required> 
	</div>
	<div class="form-group">
	<label for="exampleInputEmail1">Description</label>
	<textarea id="editor1" name="description" rows="10" cols="80" style="visibility: hidden; display: none;">	
					
		</textarea>
	</div>
	<div class="form-group">
	  <label for="exampleInputEmail1">Product Image</label>
	  <input type="file" class="form-control custom-control" id="photo" name="photo"  > 
	</div>
	<div class="form-group">
	  <label for="exampleInputEmail1">Start Date</label>
	  <input type="text" class="form-control custom-control pull-right" id="datepicker1" name="start_date"> 
	</div>
	<div class="form-group">
	  <label for="exampleInputEmail1">End Date</label>
	  <input type="text" class="form-control custom-control" id="datepicker2" name="end_date"> 
	</div>
	<div class="form-group">
	  <label for="exampleInputEmail1">Product Price</label>
	  <input type="text" class="form-control custom-control"  name="product_price" placeholder="Product Price" > 
	</div>
	<div class="form-group">
	  <label for="exampleInputEmail1">Selling Price</label>
	  <input type="text" class="form-control custom-control"  name="selling_price" placeholder="Selling Price" > 
	</div>
	
	<div class="form-group">
	  <label for="exampleInputEmail1">Discount Price</label>
	  <input type="text" class="form-control custom-control"  name="discount_price" placeholder="Discount Price" > 
	</div>
	<div class="form-group">
	  <label for="exampleInputEmail1">Status</label>
	  <select class="form-control custom-control" name="status" >
	  <option value="Yes">Yes</option>
	  <option value="No">No</option>
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
<script>

</script>