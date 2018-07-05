 <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
       

      
      <!-- Info boxes -->
      <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
             
            
					<div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-blue">
                            <div class="panel-body">
                                <i class="fa fa-picture-o fa-5x"></i>
                                <h3><?php echo count($this->category_db) ?></h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                               <a class="small-box-footer" href="<?php echo base_url(); ?>iOFRDYNBzGpVgPFgkwXWeKo/manage_category"> Manage Category</a>

                            </div>
                        </div>
                    </div>
					<div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-green">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3><?php echo count($this->product_db) ?></h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                               <a class="small-box-footer" href="<?php echo base_url(); ?>iOFRDYNBzGpVgPFgkwXWeKo/manage_product"> Manage Product</a>

                            </div>
                        </div>
                    </div>
					
             
			 
            
			 
		</div><!-- /.row -->
		  <div class="row">
		  
          </div><!-- /.row -->
		 
		 
		 
          <!-- Main row -->
          
          
         
        </section>

    
