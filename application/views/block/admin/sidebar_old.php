<?php
$current_method = $this->router->fetch_method();
?>

 <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
			
             <li  <?php if($current_method=='dashboard'){?> class="active treeview" <?php }?>>
              <a href="<?php echo base_url(); ?>admin/dashboard">
                <i class="fa icon-home"></i>
                <span>Dashboard</span>
                
              </a>
             
            </li>
           
            
            <li <?php if($current_method=='add_menu' || $current_method=='manage_menu' || $current_method=='edit_menu'){?> class="active treeview" <?php }?>>
              <a href="<?php echo base_url(); ?>admin/manage_menu">
                <i class="fa icon-picture"></i>
                <span>Manage Menu</span>
              </a>
            </li>
             <li <?php if($current_method=='add_cms' || $current_method=='manage_cms' || $current_method=='edit_cms'){?> class="active treeview" <?php }?>>
              <a href="<?php echo base_url(); ?>admin/manage_cms">
                <i class="fa icon-equalizer"></i>
					<span>Manage About Us</span>
              </a>
            </li>
             <li <?php if($current_method=='add_slider' || $current_method=='manage_slider' || $current_method=='edit_slider'){?> class="active treeview" <?php }?>>
              <a href="<?php echo base_url(); ?>admin/manage_slider">
                <i class="fa icon-picture"></i>
                <span>Manage home page slider</span>
              </a>
            </li>
            
          <li <?php if($current_method=='add_forms' || $current_method=='manage_forms' || $current_method=='edit_forms'){?> class="active treeview" <?php }?>>
              <a href="<?php echo base_url(); ?>admin/manage_forms">
                <i class="fa fa-edit"></i>
                <span>Manage Forms</span>
              </a>
            </li>
           <li <?php if($current_method=='add_event' || $current_method=='manage_event' || $current_method=='edit_event'){?> class="active treeview" <?php }?>>
              <a href="<?php echo base_url(); ?>admin/manage_event">
                <i class="fa fa-files-o"></i>
                <span>Manage Event</span>
              </a>
            </li>
           <li <?php if($current_method=='add_examination' || $current_method=='manage_examination' || $current_method=='edit_examination'){?> class="active treeview" <?php }?>>
              <a href="<?php echo base_url(); ?>admin/manage_examination">
                <i class="fa fa-files-o"></i>
                <span>Manage Examination</span>
              </a>
            </li>
            <li <?php if($current_method=='add_useful_links' || $current_method=='manage_useful_links' || $current_method=='edit_useful_links'){?> class="active treeview" <?php }?>>
              <a href="<?php echo base_url(); ?>admin/manage_useful_links">
                <i class="fa fa-files-o"></i>
                <span>Manage Useful Links</span>
              </a>
            </li>
             <li <?php if($current_method=='add_diploma' || $current_method=='manage_diploma' || $current_method=='edit_diploma'){?> class="active treeview" <?php }?>>
              <a href="<?php echo base_url(); ?>admin/manage_diploma">
                <i class="fa fa-files-o"></i>
                <span>Manage Diploma</span>
              </a>
            </li>
            <li <?php if($current_method=='changepassword'){?> class="active treeview" <?php }?>>
              <a href="<?php echo base_url(); ?>admin/changepassword">
                <i class="glyphicon glyphicon-cog"></i>
                <span>Change Password</span>
              </a>
            </li>
            
            
      </aside>
