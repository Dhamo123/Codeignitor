<section class="content-header">
      <h1>
        Edit Category
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>iOFRDYNBzGpVgPFgkwXWeKo/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>iOFRDYNBzGpVgPFgkwXWeKo/manage_category"><i class="fa fa-dashboard"></i> Manage Category</a></li>        
        <li class="active">Edit Category</li>
        
      </ol>
</section>
 
 
<div class="box box-primary">
<div class="box-header with-border">
  <?php	
	 $this->load->view('page/admin/message');	
	?>	
</div><!-- /.box-header -->
<!-- form start -->
<form role="form" method="post" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>iOFRDYNBzGpVgPFgkwXWeKo/edit_category/<?php echo $data->id ; ?>">
  <div class="box-body">
	  
	<div class="form-group">
	  <label for="exampleInputEmail1">Category Title*</label>
	  <input type="text" class="form-control"  name="category_title" value="<?php echo $data->category_title ; ?>"  >
	  <input type="hidden" class="form-control"  name="old_title" value="<?php echo $data->category_title ; ?>"  >
	  
	</div>
	<div class="form-group">
	  <label for="exampleInputEmail1">Icon</label>
	  <input type="file" class="form-control custom-control" id="photo" name="photo"  > 
	  <input type="hidden" class="form-control"  name="cover_image_hidden" value="<?php echo $data->photo ; ?>"  >
	  
	  <?php   if($data->photo!='')
						{ ?>
							<img src="<?php echo base_url().'category/'.$data->photo ;?>" width="100" height="150"/>   
				  <?php }?>
	</div>

  <!-- /.box-body -->		
	
	
	<div class="form-group">
	<label for="exampleInputEmail1">Description</label>
	<textarea id="editor1" name="description" rows="10" cols="80" style="visibility: hidden; display: none;">	
			<?php echo $data->description ?>		
		</textarea>
	</div>
	<div class="form-group">
	  <label for="exampleInputEmail1">Status</label>
	  <select class="form-control custom-control" name="status" >
	  <option value="Yes" <?php if($data->status=='Yes'){?> selected <?php }?>>Yes</option>
	  <option value="No" <?php if($data->status=='No'){?> selected <?php }?>>No</option>
	  
	  </select>
	</div>
	
	</div>
  <div class="box-footer">
	<button type="submit" class="btn btn-default">Submit</button> 
  </div>
</form>
</div><!-- /.box -->
