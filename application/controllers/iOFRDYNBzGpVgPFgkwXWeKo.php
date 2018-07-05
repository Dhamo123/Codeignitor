<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class IOFRDYNBzGpVgPFgkwXWeKo extends CI_Controller {	
   
	function __construct() {

		 parent::__construct();
		$this->load->library('layout');          // Load layout library     
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('cookie');
		
		$this->load->model('category','',TRUE);
		
		$this->load->model('product','',TRUE);
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->library('form_validation');
		
		$category_data = $this->category->category_dashboard();
		$this->category_db = $category_data;
		
		$product_data = $this->product->product_dashboard();
		$this->product_db = $product_data;
		
		//echo '<pre>';print_r(count($cms_data));exit;
		if (!$this->session->userdata('logged_in')) {

			//return false;
			redirect('iOFRDYNBzGpVgPFgkwXWeKologin/index');

			//$this->load->view('page/admin/login',$data);
			}

	}
	
	public function dashboard()	{

		if (!$this->session->userdata('logged_in')) {			
			//return false;
			redirect('iOFRDYNBzGpVgPFgkwXWeKo/index');
			//$this->load->view('page/admin/login',$data);
		}
		
		$this->layout->title('rii - Home');
		$this->layout->description('rii - Home');   
		$this->layout->layout_view = 'layout/admin.php';
		$this->layout->view('page/admin/dashboard', $data);
	}
	

	
	public function index($data)	{   

		if ($this->session->userdata('logged_in')) {
			
			//return false;
			redirect('iOFRDYNBzGpVgPFgkwXWeKo/dashboard');
			//$this->load->view('page/admin/login',$data);
			}else{
			$this->load->view('page/admin/login', $data);
		}
	}
	

	public function logout()	{   		
		$this->session->unset_userdata('logged_in');
		
		redirect('iOFRDYNBzGpVgPFgkwXWeKologin/index');
	}
	
	
	
    
	public function add_category()	{   
		
		if(!empty($this->input->post())){
			 $this->form_validation->set_rules('category_title', 'category_title', 'required');
			 if ($this->form_validation->run() == FALSE) { 
         	$this->session->set_flashdata('msg', array('message' => validation_errors(),'class' => 'alert alert-danger  alert-dismissible','icon'=>'fa-check'));
			redirect('iOFRDYNBzGpVgPFgkwXWeKo/add_category'); 
         } 
         $category_duplicate_check = $this->category->category_duplicate_check($this->input->post('category_title'));
		if(!empty($category_duplicate_check->category_title)){
			$this->session->set_flashdata('msg', array('message' => 'Category Title Duplicate...!','class' => 'alert alert-danger alert-dismissible','icon'=>'fa-ban'));
        	redirect('iOFRDYNBzGpVgPFgkwXWeKo/add_category');
		}
			
			$this->load->helper(array('form', 'url'));
			$config['upload_path'] = './category/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name']="";
			if($_FILES["photo"]['name']){
				$config['file_name'] = time().$_FILES["photo"]['name'];
			}
			
			// $config['max_size']	= '100';
			// $config['max_width']  = '1024';
			// $config['max_height']  = '768';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('photo') && !empty($_FILES["photo"]['name']))
	        {
	            $status = 'error';
	            $msg = $this->upload->display_errors('', '');
	            $this->session->set_flashdata('msg', array('message' => 'Please upload only "gif|jpg|png" file ..!','class' => 'alert alert-danger alert-dismissible','icon'=>'fa-ban'));
	        	redirect('iOFRDYNBzGpVgPFgkwXWeKo/add_category');
	        }
	       
			
			$data = array(
				'category_title' => $this->input->post('category_title'),
				'photo'=> $config['file_name'],
				'status'=> $this->input->post('status'),
				'description'=> $this->input->post('description'),
				'created_date'=> date('Y-m-d'),

			);

			$this->category->category_insert($data);
			$this->session->set_flashdata('msg', array('message' => 'Category inserted successfully','class' => 'alert alert-success alert-dismissible','icon'=>'fa-check'));
			redirect('iOFRDYNBzGpVgPFgkwXWeKo/manage_category');
		}
		$data['get_category'] = $this->category->get_category($data);
		//echo '<pre>';print_r($data);exit;
		$this->layout->title('rii - add_category');
		$this->layout->description('rii - add_category');   
		$this->layout->layout_view = 'layout/admin.php';
		$this->layout->view('page/admin/add_category', $data);
	}
	
	public function edit_category($id)	{   
		
		if(!empty($this->input->post())){

			 $this->form_validation->set_rules('category_title', 'category_title', 'required');
			 if ($this->form_validation->run() == FALSE) { 
         		$this->session->set_flashdata('msg', array('message' => validation_errors(),'class' => 'alert alert-danger  alert-dismissible','icon'=>'fa-ban'));
				redirect("iOFRDYNBzGpVgPFgkwXWeKo/edit_category/".$id); 
        	 }

			if($this->input->post('category_title')!=$this->input->post('old_title'))
			{ 
				//$slug = strtolower($this->input->post('title'));
				$category_duplicate_check = $this->category->category_duplicate_check($this->input->post('category_title'));
				if(!empty($category_duplicate_check->category_title)){
					$this->session->set_flashdata('msg', array('message' => 'Category Title Duplicate...!','class' => 'alert alert-danger alert-dismissible','icon'=>'fa-ban'));
		        	redirect("iOFRDYNBzGpVgPFgkwXWeKo/edit_category/".$id); 
		        	
				}
			}
			$config['file_name'] ="";
			if($_FILES['photo']['name']!="")
			{
				
					$this->load->helper(array('form', 'url'));
					$config['upload_path'] = './category/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['file_name'] = time().$_FILES["photo"]['name'];
					
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('photo') && !empty($_FILES["photo"]['name']))
			        {
			            $status = 'error';
			            $msg = $this->upload->display_errors('', '');
			            $this->session->set_flashdata('msg', array('message' => 'Please upload only "gif|jpg|png" file ..!','class' => 'alert alert-danger alert-dismissible','icon'=>'fa-ban'));
			        	redirect('iOFRDYNBzGpVgPFgkwXWeKo/edit_category/'.$id);
			        }
			        unlink('category/'.$this->input->post('cover_image_hidden'));
					$cover_image_name = $config['file_name'];
					             
				
			}
			else
			{
				$cover_image_name = $this->input->post('cover_image_hidden');
			}
			$data = array(
				'category_title' => $this->input->post('category_title'),
				'photo'=> $cover_image_name,
				'status'=> $this->input->post('status'),
				'description'=> $this->input->post('description'),
				'updated_date'=> date('Y-m-d'),

			);
			//echo '<pre>';print_r($data);exit;
			$id = $this->category->update_category($data,$id);
			$this->session->set_flashdata('msg', array('message' => 'Category Page Updated successfully','class' => 'alert alert-success alert-dismissible','icon'=>'fa-check'));
			redirect('iOFRDYNBzGpVgPFgkwXWeKo/manage_category');
		}
		$data['get_category'] = $this->category->get_category($data);
		$this->layout->title('rii - Edit category');
		$this->layout->description('rii - category');   
		$this->layout->layout_view = 'layout/admin.php';

		$data['data']= $this->category->get_category_data($id);				
		$this->layout->view('page/admin/edit_category', $data);
	}
	public function category_delete($id){
		$data['data']= $this->category->get_category_unlink_file($id);
		unlink("category/".$data['data'][0]['photo']);
		$data['data']= $this->category->category_delete($id);
		$this->session->set_flashdata('msg', array('message' => 'Category deleted  successfully','class' => 'alert alert-success alert-dismissible','icon'=>'fa-check'));
		redirect('iOFRDYNBzGpVgPFgkwXWeKo/manage_category');
	}
	public function manage_category()	{   
		
		
		$data['get_category'] = $this->category->all_category($data);
		
		//echo '<pre>';print_r($data);;exit;
		$this->layout->title('rii - manage_category');
		$this->layout->description('rii - manage_category');   
		$this->layout->layout_view = 'layout/admin.php';
		$this->layout->view('page/admin/manage_category', $data);
	}
	
	public function add_product()	{   
		
		if(!empty($this->input->post())){
			 $this->form_validation->set_rules('product_name', 'product name', 'required');
			 $this->form_validation->set_rules('category', 'category', 'required');
			 if ($this->form_validation->run() == FALSE) { 
	         	$this->session->set_flashdata('msg', array('message' => validation_errors(),'class' => 'alert alert-danger  alert-dismissible','icon'=>'fa-ban'));
				redirect('iOFRDYNBzGpVgPFgkwXWeKo/add_product');
			}
			$product_duplicate_check = $this->product->product_duplicate_check($this->input->post('product_name'),$this->input->post('category'));
			if(!empty($product_duplicate_check->product_name)){
				$this->session->set_flashdata('msg', array('message' => 'Prodcut Duplicate...!','class' => 'alert alert-danger alert-dismissible','icon'=>'fa-ban'));
	        	redirect('iOFRDYNBzGpVgPFgkwXWeKo/add_product');
			}	
			$this->load->helper(array('form', 'url'));
			$config['upload_path'] = './product/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name']="";
			if($_FILES["photo"]['name']){
				$config['file_name'] = time().$_FILES["photo"]['name'];
			}
			
			// $config['max_size']	= '100';
			// $config['max_width']  = '1024';
			// $config['max_height']  = '768';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('photo') && !empty($_FILES["photo"]['name']))
	        {
	            $status = 'error';
	            $msg = $this->upload->display_errors('', '');
	            $this->session->set_flashdata('msg', array('message' => 'Please upload only "gif|jpg|png" file ..!','class' => 'alert alert-danger alert-dismissible','icon'=>'fa-ban'));
	        	redirect('iOFRDYNBzGpVgPFgkwXWeKo/add_product');
	        }	
			if($this->input->post('start_date')!='' && !empty($this->input->post('start_date'))){
				$start_date=date('Y-m-d', strtotime( $this->input->post('start_date')));
			}else{
				$start_date="";
			}
			if($this->input->post('end_date')!='' && !empty($this->input->post('end_date'))){
				$end_date=date('Y-m-d', strtotime( $this->input->post('end_date')));
			}else{
				$end_date="";
			}
			$data = array(
				'category'=> $this->input->post('category'),
				'product_name' => $this->input->post('product_name'),
				'description'=> $this->input->post('description'),
				'photo'=> $config['file_name'],
				'start_date'=> $start_date,
				'end_date'=> $end_date,
				'product_price'=> $this->input->post('product_price'),
				'selling_price'=> $this->input->post('selling_price'),
				'status'=> $this->input->post('status'),
				'discount_price'=> $this->input->post('discount_price'),
				'created_date'=> date("Y-m-d"),
			);
			//echo '<pre>';print_r($data);exit;
			$this->product->product_insert($data);
			$this->session->set_flashdata('msg', array('message' => 'Product inserted successfully','class' => 'alert alert-success alert-dismissible','icon'=>'fa-check'));
			redirect('iOFRDYNBzGpVgPFgkwXWeKo/manage_product');
		}

		$data['get_category'] = $this->product->category();

		
		//echo '<pre>';print_r($data);exit;
		$this->layout->title('rii - add_product');
		$this->layout->description('rii - add_product');   
		$this->layout->layout_view = 'layout/admin.php';
		$this->layout->view('page/admin/add_product', $data);
	}
	
	public function manage_product()	{   
		
		$config = array();
		$config["base_url"] = base_url() . "iOFRDYNBzGpVgPFgkwXWeKo/manage_product";
		$total_row = $this->product->record_count();
		$config["total_rows"] = $total_row;
		$config["per_page"] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $total_row;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$this->pagination->initialize($config);
		if($this->uri->segment(3)){
		$page = ($this->uri->segment(3)) ;
		}
		else{
		$page = 1;
		}
		//echo $page;exit;
		$data['get_product'] = $this->product->cat_product($config["per_page"],$page);
		$str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );
		//echo '<pre>';print_r($data);;exit;
		$this->layout->title('rii - manage_product');
		$this->layout->description('rii - manage_product');   
		$this->layout->layout_view = 'layout/admin.php';
		$this->layout->view('page/admin/manage_product', $data);
	}
	public function edit_product($id)	{   
		
		if(!empty($this->input->post())){

			 $this->form_validation->set_rules('product_name', 'Product name', 'required');
			 $this->form_validation->set_rules('category', 'Category', 'required');
			 if ($this->form_validation->run() == FALSE) { 
	         	$this->session->set_flashdata('msg', array('message' => validation_errors(),'class' => 'alert alert-danger  alert-dismissible','icon'=>'fa-ban'));
				redirect('iOFRDYNBzGpVgPFgkwXWeKo/add_product');
			}
			if($this->input->post('product_name')!=$this->input->post('old_title'))
			{ 
				//$slug = strtolower($this->input->post('title'));
				$product_duplicate_check = $this->product->product_duplicate_check($this->input->post('product_name'),$this->input->post('category'));
				if(!empty($product_duplicate_check->product_name)){
					$this->session->set_flashdata('msg', array('message' => 'Prodcut Duplicate...!','class' => 'alert alert-danger alert-dismissible','icon'=>'fa-ban'));
		        	redirect('iOFRDYNBzGpVgPFgkwXWeKo/add_product');
				}
			}
			$config['file_name'] ="";
			if($_FILES['photo']['name']!="")
			{
				
					$this->load->helper(array('form', 'url'));
					$config['upload_path'] = './product/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['file_name'] = time().$_FILES["photo"]['name'];
					
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('photo') && !empty($_FILES["photo"]['name']))
			        {
			            $status = 'error';
			            $msg = $this->upload->display_errors('', '');
			            $this->session->set_flashdata('msg', array('message' => 'Please upload only "gif|jpg|png" file ..!','class' => 'alert alert-danger alert-dismissible','icon'=>'fa-ban'));
			        	redirect('iOFRDYNBzGpVgPFgkwXWeKo/edit_product/'.$id);
			        }
			        unlink('product/'.$this->input->post('cover_image_hidden'));
					$cover_image_name = $config['file_name'];
					             
				
			}
			else
			{
				$cover_image_name = $this->input->post('cover_image_hidden');
			}
			
			//echo '<pre>';print_r($cat_subcat['category_name']);exit;
			if($this->input->post('start_date')!='' && !empty($this->input->post('start_date'))){
				$start_date=date('Y-m-d', strtotime( $this->input->post('start_date')));
			}else{
				$start_date="";
			}
			if($this->input->post('end_date')!='' && !empty($this->input->post('end_date'))){
				$end_date=date('Y-m-d', strtotime( $this->input->post('end_date')));
			}else{
				$end_date="";
			}
			$data = array(
				'category'=> $this->input->post('category'),
				'product_name' => $this->input->post('product_name'),
				'description'=> $this->input->post('description'),
				'photo'=> $cover_image_name,
				'start_date'=> $start_date,
				'end_date'=> $end_date,
				'product_price'=> $this->input->post('product_price'),
				'selling_price'=> $this->input->post('selling_price'),
				'status'=> $this->input->post('status'),
				'discount_price'=> $this->input->post('discount_price'),
				'modified_date'=> date("Y-m-d"),
			);
			
			//echo '<pre>';print_r($data);exit;
			$this->product->update_product($data,$id);
			
			
			$this->session->set_flashdata('msg', array('message' => 'Product Updated successfully','class' => 'alert alert-success alert-dismissible','icon'=>'fa-check'));
			redirect('iOFRDYNBzGpVgPFgkwXWeKo/manage_product');
		}
		$data['get_category'] = $this->product->category($id);
		//echo 'hi';exit;
		
		$this->layout->title('rii - Edit product');
		$this->layout->description('rii - product');   
		$this->layout->layout_view = 'layout/admin.php';

		$data['data']= $this->product->get_product_data($id);				
		$this->layout->view('page/admin/edit_product', $data);
	}
	public function product_delete($id){
		$data['data']= $this->product->get_product_unlink_file($id);
		unlink("product/".$data['data'][0]['photo']);
		$data['data']= $this->product->product_delete($id);
		unlink("product_extra_img/".$data['data'][0]['photo']);
		unlink("product_extra_img/thumb_".$data['data'][0]['photo']);
		$this->session->set_flashdata('msg', array('message' => 'Product deleted  successfully','class' => 'alert alert-success alert-dismissible','icon'=>'fa-check'));
		redirect('iOFRDYNBzGpVgPFgkwXWeKo/manage_product');
	}
	
	public function delete_pro_img($id){   
		
		$ids=$this->product->sel_img_delete($id);
		$data=$this->product->extra_img_delete($id);
		unlink("product_extra_img/".$ids[0]['photo']);
		unlink("product_extra_img/thumb_".$ids[0]['photo']);
		
	}
	public function export(){
		$this->load->helper('download');

		$filename = "Export_product.csv";
		
   		header('Content-type: application/csv');
    	header('Content-Disposition: attachment; filename='.$filename);  
    	header("Pragma: no-cache");
    	header("Expires: 0");
		$fp = fopen('php://output', 'w');

		if($_POST['filter']=='All_Product'){
			$header[0] = "Product Name";
		    $header[1] = "Description";
		    $header[2] = "Start Date";
		    $header[3] = "End Date";
		    $header[4] = "Product Price";
		    $header[5] = "Selling Price";
		    $header[6] = "Discount Price";
		    $header[7] = "Company State";
		    $header[8] = "Status";
		    $header[8] = "Created Date";
		    $header[9] = "Modified Date";
		   	fputcsv($fp, $header);

			$data=$this->product->All_Product_export();
			foreach ($data  as $row) {
				$data[0] = $row['product_name'];
		        $data[1] = $row['description'];
		        $data[2] = $row['start_date'];
		        $data[3] = $row['end_date'];
		        $data[4] = $row['product_price'];
		        $data[5] = $row['selling_price'];
		        $data[6] = $row['discount_price'];
		        $data[7] = $row['status'];
		        $data[8] = $row['created_date'];
		        $data[9] = $row['modified_date'];
		        fputcsv($fp, $data);
			}
			fclose($fp);
			exit;
		}
		if($_POST['filter']=='By_Category'){
			
		}   
		
		
		
	}
	
	
	
}
?>
