<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class IOFRDYNBzGpVgPFgkwXWeKologin extends CI_Controller {	
   
	function __construct() {
		
		 parent::__construct();
		$this->load->library('layout');          // Load layout library     
		$this->load->helper('url');
		$this->load->model('user','',TRUE);
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	public function index()	
	{
		$this->load->view('page/admin/login',$data);
	}
	public function dologin()	{  
		
		$this->form_validation->set_rules('userid', 'userid', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
		$data = array(
				'password' => md5($this->input->post('password')),
				'userid' => $this->input->post('userid')
			);
			//echo "<pre>";print_r($data);exit;
			$ret=$this->user->login($data);
			
			if($ret)
			{	
				$data = array(
				'password' => md5($this->input->post('password')),
				'userid' => $ret[0]['id']
			);
			$this->session->set_userdata('logged_in', $data);
				redirect('iOFRDYNBzGpVgPFgkwXWeKo/dashboard');
			}
			else
			{
				$this->session->set_flashdata('msg', array('message' => 'Your Username Or password is wrong..!','class' => 'alert alert-danger alert-dismissible','icon'=>'fa-ban'));
				redirect('iOFRDYNBzGpVgPFgkwXWeKologin');
			}
		
	}
	
	
	
}
?>
