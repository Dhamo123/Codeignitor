<section class="content-header">
      <h1>
        Add Category
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>iOFRDYNBzGpVgPFgkwXWeKo/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>iOFRDYNBzGpVgPFgkwXWeKo/manage_category"><i class="fa fa-dashboard"></i> Manage Category</a></li>        
        <li class="active">Add Category</li>
        
      </ol>
</section>
 
 
<div class="box box-primary">
<div class="box-header with-border">
  <?php	
	 $this->load->view('page/admin/message');	
	?>	
</div><!-- /.box-header -->
<!-- form start -->
<form role="form" method="post" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>iOFRDYNBzGpVgPFgkwXWeKo/add_category">
  <div class="box-body">
	  
	<div class="form-group">
    <label for="exampleInputEmail1">Category Title*</label>
    <input type="text" class="form-control" id="category_title" name="category_title" placeholder="Category Title" required> 
  </div>
	<div class="form-group">
	  <label for="exampleInputEmail1">Icon</label>
	  <input type="file" class="form-control custom-control" id="photo" name="photo"  > 
	</div>
	<div class="form-group">
  <label for="exampleInputEmail1">Description</label>
  <textarea id="editor1" name="description" rows="10" cols="80" style="visibility: hidden; display: none;"> 
          
    </textarea>
  </div>
	<div class="form-group">
    <label for="exampleInputEmail1">Status</label>
    <select class="form-control custom-control" name="status" >
    <option value="Yes">Yes</option>
    <option value="No">No</option>
    
    </select>
  </div>
	
	
	</div>
  <div class="box-footer">
	<button type="submit" class="btn btn-default">Submit</button> 
  </div>
  </div>
</form>
</div><!-- /.box -->
