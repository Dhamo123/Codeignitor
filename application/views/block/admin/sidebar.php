<?php
$current_method = $this->router->fetch_method();
?>

 <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
			
             <li  <?php if($current_method=='dashboard'){?> class="active treeview" <?php }?>>
              <a href="<?php echo base_url(); ?>iOFRDYNBzGpVgPFgkwXWeKo/dashboard">
                <i class="fa icon-home"></i>
                <span>Dashboard</span>
                
              </a>
             
            </li>
			
			<li <?php if($current_method=='add_category' || $current_method=='manage_category' || $current_method=='edit_examination'){?> class="active treeview" <?php }?>>
              <a href="<?php echo base_url(); ?>iOFRDYNBzGpVgPFgkwXWeKo/manage_category">
                <i class="fa fa-picture-o fa-5x"></i>
					<span>Manage Category</span>
              </a>
            </li>
           
		   <li <?php if($current_method=='add_product' || $current_method=='manage_product' || $current_method=='edit_product'){?> class="active treeview" <?php }?>>
              <a href="<?php echo base_url(); ?>iOFRDYNBzGpVgPFgkwXWeKo/manage_product">
                <i class="fa fa-bar-chart-o fa-5x"></i>
                <span>Manage Product</span>
              </a>
            </li>
            
			
            
            
      </aside>
